<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Attachment;
use App\Models\Petition;
use App\Models\User;
use App\Models\PetitionPetitioner;
use App\Models\PetitionIndex;
use App\Models\PetitionLawyer;
use App\Models\PetitionOpponent;
use App\Models\PetitionReply;
use App\Models\PetitionReplyParent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestEmail;
use PDF;

use function GuzzleHttp\Promise\all;

class PetitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('role:admin')->except(['index','show','toggleArchivedStatus']);
    }
    public function index(Request $request)
    {        
        try {         
            //return $request->all();   
            $query = Petition::select("petitions.*")->withRelationsIndex();

            if ($request->archived == "true") {
                $query->where('archived', 1);
            } else {
                $query->where('archived', 0);
            }

            $query
                ->leftjoin('petition_petitioners', 'petitions.id', '=', 'petition_petitioners.petition_id')
                ->leftjoin('users', 'users.id', '=', 'petition_petitioners.petitioner_id');

            if (!empty($request->case_no)) {
                $query->where('case_no', 'like', '%' . $request->case_no . '%');
            }

            if (!empty($request->institution_date)) {
                $query->where('institution_date', $request->institution_date);
            }
            if (!empty($request->year)) {
                $query->where('year', 'like', '%' . $request->year . '%');
            }

            if (!empty($request->court_id)) {
                $query->where('court_id', $request->court_id);
            }
            if (!empty($request->petitioner_name)) {

                $query->where('name', 'like', '%' . $request->petitioner_name . '%');
            }

            if ($request->user()->hasRole('client')) {
                $query->where('petitioner_id', $request->user()->id);
            }

            //$query->orderBy('display_order');
            $petitions = [];
            if($request->force_all_records){                 
                if (!empty($request->query_from_calendar_page)) {
                    $query->where('case_no', 'like', '%' . $request->query_from_calendar_page . '%')->orWhere('name', 'like', '%' . $request->query_from_calendar_page . '%');
                }
                $petitions = $query->groupBy('petitions.id')->orderby('id','desc')->get();
            }else{                
                $petitions = $query->groupBy('petitions.id')->orderby('id','desc')->paginate(8);
            }            
            $events = [];
            foreach ($petitions as $petition) {
                $events[] = [
                    'title' =>  $petition->petition_standard_title,
                    'start' => $petition->institution_date,
                    'url' => 'http://localhost:8080/petitions/' . $petition->id
                ];
            }
            return response()->json(
                [
                    'petitions' => $petitions,
                    'events' => $events,
                    'message' => 'Petitions',
                    'archived' => $request->archived,
                    'code' => 200
                ]
            );
        } catch (\Exception $e) {
            return response([
                "error" => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {
            if ($request->institution_date) {
                $request->merge([
                    'institution_date' => \Carbon\Carbon::createFromFormat('d/m/Y', $request->institution_date)->format('Y/m/d'),
                ]);
            }
            $petition = Petition::updateOrCreate(['id' => $request->id], $request->except('new_petitioner', 'petitioners', 'opponents', 'petitioner_names', 'opponent_names', 'petitioners', 'court', 'lawyer_ids', 'lawyers', 'lawyer_ids_array', 'type'));


            if (is_array($request->petitioners) && count($request->petitioners) > 0) {
                foreach ($request->petitioners as $petitioner) {

                    if (isset($petitioner['user']['name']['label']) && !empty($petitioner['user']['name']['value'])) {
                        PetitionPetitioner::create([
                            'petition_id' => $petition->id,
                            'petitioner_id' => $petitioner['user']['name']['value'],
                        ]);
                    } else {
                        if (isset($petitioner['user']) && !empty(@$petitioner['user']['name'])) {
                            $slug = Str::of(($petitioner['user']['name']))->slug('-');
                            $randomString = $slug . "-" . rand(10000, 99999);
                            $userData['name'] = $petitioner['user']['name'];
                            $userData['password'] = bcrypt('test1234');
                            $userData['email'] = $randomString . "@lfms.com";
                            $userData['is_approved'] = 1;

                            if (isset($petitioner['user']['id'])) {

                                $user = User::where('id', $petitioner['user']['id'])->update($userData);
                            } else {
                                $user = User::create($userData);
                                $user->assignRole('client');
                                PetitionPetitioner::create([
                                    'petition_id' => $petition->id,
                                    'petitioner_id' => $user->id,
                                ]);
                            }
                        }
                    }
                }
            }


            if (is_array($request->opponents) && count($request->opponents) > 0) {
                foreach ($request->opponents as $opponent) {
                    if (isset($opponent['user']['name']['label']) && !empty($opponent['user']['name']['value'])) {
                        PetitionOpponent::create([
                            'petition_id' => $petition->id,
                            'opponent_id' => $opponent['user']['name']['value'],
                        ]);
                    } else {

                        if (isset($opponent['user']) && !empty(@$opponent['user']['name'])) {

                            $slug = Str::of(($opponent['user']['name']))->slug('-');
                            $randomString = $slug . "-" . rand(10000, 99999);

                            $oppData['name'] = $opponent['user']['name'];
                            $oppData['password'] = bcrypt('test1234');
                            $oppData['email'] = $randomString . "@lfms.com";
                            $oppData['is_approved'] = 1;

                            if (isset($opponent['user']['id'])) {

                                $user = User::where('id', $opponent['user']['id'])->update($oppData);
                            } else {
                                $user = User::create($oppData);
                                $user->assignRole('client');
                                PetitionOpponent::create([
                                    'petition_id' => $petition->id,
                                    'opponent_id' => $user->id,
                                ]);
                            }
                        }
                    }
                }
            }

            //Saving All Layers Of Petition
            if (is_array($request->lawyer_ids) && count($request->lawyer_ids) > 0) {
                PetitionLawyer::where('petition_id', $petition->id)->delete();
                foreach ($request->lawyer_ids as $lawyer_id) {
                    PetitionLawyer::create([
                        'petition_id' => $petition->id,
                        'lawyer_id' => $lawyer_id,
                    ]);
                }
            }
            //sending Test email
            // $data = ['message' => 'This is a test!'];
            // Mail::to("ghulamyaseenmalik206@gmail.com")			 
            // ->send(new TestEmail($data));

            return response()->json(
                [
                    'petition_id' => $petition->id,
                    'message' => 'Petition created successfully.',
                    'code' => 200
                ]
            );
        } catch (\Exception $e) {
            return response([
                "error" => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {

            $petition = Petition::withRelations()->where('id', $id)->first();
            $petition->lawyer_ids_array = $petition->lawyers()->pluck('lawyer_id');
            $petition_details = PetitionIndex::where('petition_id', $id)->get();


            return response()->json(
                [
                    'petition' => $petition,
                    'petition_details' => $petition_details,
                    'message' => 'petition_details',
                    'code' => 200
                ]
            );
        } catch (\Exception $e) {
            return response([
                "error" => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function toggleArchivedStatus(Request $request)
    {
        try {
            Petition::where('id', $request->petition_id)->update([
                'archived' => $request->archived
            ]);
            return response()->json(
                [
                    'message' => 'Petition updated',
                    'code' => 200
                ]
            );
        } catch (\Exception $e) {
            return response([
                "error" => $e->getMessage()
            ], 500);
        }
    }
    public function downloadPetitionPdf($petition_id)
    {
        try { 
            $petition = Petition::withRelations()->where('id', $petition_id)->first();            
            //return view('petition_pdf.petition_index_pdf', compact('petition'));             
            if($petition){
                $pdf = PDF::loadView('petition_pdf.petition_index_pdf', compact('petition'));            
                return $pdf->download($petition->petition_standard_title.".pdf");
            }else{
                return response('Petition Data Not Found',404);
            }
            
        } catch (\Exception $e) {
            return response([
                "error" => $e->getMessage()
            ], 500);
        }
    }
}
