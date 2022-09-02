<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\CasePermissionService;
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
use App\Models\CaseLaw;
use App\Models\ExtraDocument;
use App\Models\Judgement;
use App\Models\OralArgument;
use App\Models\PetitionNaqalForm;
use App\Models\PetitionSynopsis;
use App\Models\PetitionTalbana;
use App\Models\PetitonOrderSheet;
use PDF;
use Auth;
use File;

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
        $this->middleware('role:admin')->except(['index', 'show', 'toggleArchivedStatus', 'downloadPetitionPdf', 'insertPendingTag', 'getPendingCase', 'downloadPendingCase']);
    }
    public function index(Request $request)
    {
        try {
            $query = Petition::select("petitions.*")->withRelationsIndex();

            if (
                empty($request->case_no) && empty($request->institution_date) &&
                empty($request->year) && empty($request->court_id) && !isset($request->pending_tag)
            ) {
                if ($request->archived == "true") {
                    $query->where('archived', 1);
                } else {
                    $query->where('archived', 0);
                }
            }

            $query
                ->leftjoin('petition_petitioners', 'petitions.id', '=', 'petition_petitioners.petition_id')
                ->leftjoin('users', 'users.id', '=', 'petition_petitioners.petitioner_id')
                ->leftjoin('petition_lawyers', 'petition_lawyers.petition_id', '=', 'petitions.id');

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
            if ($request->pending_tag == 'true') {
                $query->whereNotNull('pending_tag');
            }

            //getting logged in user
            $user = $request->user();
            if ($user->hasRole('lawyer')) {
                $query->where('lawyer_id', $user->id);
            }
            if ($user->hasRole('client')) {
                $query->where('petitioner_id', $request->user()->id);
            }

            //$query->orderBy('display_order');
            $petitions = [];
            if ($request->force_all_records) {
                if (!empty($request->query_from_calendar_page)) {
                    $query->where('case_no', 'like', '%' . $request->query_from_calendar_page . '%')->orWhere('name', 'like', '%' . $request->query_from_calendar_page . '%')->orWhere('title', 'like', '%' . $request->query_from_calendar_page . '%');
                }
                $petitions = $query->groupBy('petitions.id')->orderby('id', 'desc')->get();
            } else {
                $petitions = $query->groupBy('petitions.id')->orderby('id', 'desc')->paginate(8);
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
                    'user' => $user->email,
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
                    'institution_date' => toDBDate($request->institution_date), //\Carbon\Carbon::createFromFormat('d/m/Y', $request->institution_date)->format('Y/m/d'),
                ]);
            }
            $petition = Petition::updateOrCreate(['id' => $request->id], $request->except('new_petitioner', 'petitioners', 'opponents', 'petitioner_names', 'opponent_names', 'petitioners', 'court', 'lawyer_ids', 'lawyers', 'lawyer_ids_array', 'type'));
            PetitionPetitioner::where('petition_id', $petition->id)->delete();
            if (is_array($request->petitioners) && count($request->petitioners) > 0) {

                foreach ($request->petitioners as $petitioner) {

                    if (!empty($petitioner['user']) && !empty($petitioner['user']['name']) && is_array($petitioner['user']['name'])) {
                        PetitionPetitioner::create([
                            'petition_id' => $petition->id,
                            'petitioner_id' => $petitioner['user']['name']['id'],
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
                                PetitionPetitioner::create([
                                    'petition_id' => $petition->id,
                                    'petitioner_id' => $petitioner['user']['id'],
                                ]);
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
            PetitionOpponent::where('petition_id', $petition->id)->delete();
            if (is_array($request->opponents) && count($request->opponents) > 0) {

                foreach ($request->opponents as $opponent) {
                    if (!empty(@$opponent['user']) && !empty(@$opponent['user']['name']) && is_array($opponent['user']['name'])) {
                        PetitionOpponent::create([
                            'petition_id' => $petition->id,
                            'opponent_id' => $opponent['user']['name']['id'],
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
                                PetitionOpponent::create([
                                    'petition_id' => $petition->id,
                                    'opponent_id' => $opponent['user']['id'],
                                ]);
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
        } catch (Exception $e) {
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
    public function show(Request $request, $id)
    {
        try {
            $user = $request->user();
            if (!CasePermissionService::userHasCasePermission($id, $user)) {
                return response([
                    "error" => CasePermissionService::$unauthorizedMessage,
                    "message" => CasePermissionService::$unauthorizedMessage,
                ], CasePermissionService::$unauthorizedCode);
            }
            $petition = Petition::withRelations()->where('id', $id)->first();

            $petition->lawyer_ids_array = $petition->lawyers()->pluck('lawyer_id');
            $petition_details = PetitionIndex::with('petition', 'attachments')->where('petition_id', $id)->orderby('display_order')->get();




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
    public function destroy($petition_id)
    {
        try {
            $petition = Petition::find($petition_id);
            $public_path =  public_path();
            if ($petition) {
                //Removing PetitionIndex attachments From DB
                $petition_index_ids = $petition->petition_indexes()->pluck('id')->all();
                if ($petition_index_ids) {
                    Attachment::whereIn('attachmentable_id', $petition_index_ids)->where('attachmentable_type', "App\Models\PetitionIndex")->Delete();
                    PetitionIndex::whereIn('id', $petition_index_ids)->update(["deleted_at" => now()]);
                }
                //Removing Reply attachments From DB
                DB::table('petition_reply_parents')
                    ->where('petition_reply_parents.petition_id', '=', $petition_id)
                    ->join('petition_replies', 'petition_replies.petition_reply_parent_id', '=', 'petition_reply_parents.id')
                    ->join('attachments', 'attachments.attachmentable_id', '=', 'petition_replies.id')
                    ->where('attachments.attachmentable_type', '=', 'App\Models\PetitionReply')
                    ->update(
                        [
                            "petition_reply_parents.deleted_at" => now(),
                            "petition_replies.deleted_at" => now(),
                            "attachments.deleted_at" => now(),

                        ]
                    );
                //Removing OrderSheet attachments From DB
                $petition_ordersheet_ids = $petition->petition_ordersheets()->pluck('id')->all();
                if ($petition_ordersheet_ids) {
                    Attachment::whereIn('attachmentable_id', $petition_ordersheet_ids)->where('attachmentable_type', "App\Models\PetitonOrderSheet")->Delete();
                    PetitonOrderSheet::whereIn('id', $petition_ordersheet_ids)->update(["deleted_at" => now()]);
                }
                //Removing OralArgument attachments From DB
                $petition_oral_argument_ids = $petition->petition_oral_arguments()->pluck('id')->all();
                if ($petition_oral_argument_ids) {
                    Attachment::whereIn('attachmentable_id', $petition_oral_argument_ids)->where('attachmentable_type', "App\Models\OralArgument")->Delete();
                    OralArgument::whereIn('id', $petition_oral_argument_ids)->update(["deleted_at" => now()]);
                }
                //Removing PetitionNaqalForm attachments From DB
                $petition_naqal_form_ids = $petition->petition_naqal_forms()->pluck('id')->all();
                if ($petition_naqal_form_ids) {
                    Attachment::whereIn('attachmentable_id', $petition_naqal_form_ids)->where('attachmentable_type', "App\Models\PetitionNaqalForm")->Delete();
                    PetitionNaqalForm::whereIn('id', $petition_naqal_form_ids)->update(["deleted_at" => now()]);
                }
                //Removing PetitionTalbana attachments From DB
                $petition_talbana_ids = $petition->petition_talbanas()->pluck('id')->all();
                if ($petition_talbana_ids) {
                    Attachment::whereIn('attachmentable_id', $petition_talbana_ids)->where('attachmentable_type', "App\Models\PetitionTalbana")->Delete();
                    PetitionTalbana::whereIn('id', $petition_talbana_ids)->update(["deleted_at" => now()]);
                }
                //Removing CaseLaw attachments From DB
                $case_law_ids = $petition->case_laws()->pluck('id')->all();
                if ($case_law_ids) {
                    Attachment::whereIn('attachmentable_id', $case_law_ids)->where('attachmentable_type', "App\Models\CaseLaw")->Delete();
                    CaseLaw::whereIn('id', $case_law_ids)->update(["deleted_at" => now()]);
                }
                //Removing ExtraDocument attachments From DB
                $extra_document_ids = $petition->extra_documents()->pluck('id')->all();
                if ($extra_document_ids) {
                    Attachment::whereIn('attachmentable_id', $extra_document_ids)->where('attachmentable_type', "App\Models\ExtraDocument")->Delete();
                    ExtraDocument::whereIn('id', $extra_document_ids)->update(["deleted_at" => now()]);
                }
                //Removing PetitionSynopsis attachments From DB
                $petition_synopsis_ids = $petition->petition_synopsis()->pluck('id')->all();
                if ($petition_synopsis_ids) {
                    Attachment::whereIn('attachmentable_id', $petition_synopsis_ids)->where('attachmentable_type', "App\Models\PetitionSynopsis")->Delete();
                    PetitionSynopsis::whereIn('id', $petition_synopsis_ids)->update(["deleted_at" => now()]);
                }
                //Removing Judgement attachments From DB
                $petition_Judgement_ids = $petition->petition_Judgements()->pluck('id')->all();
                if ($petition_Judgement_ids) {
                    Attachment::whereIn('attachmentable_id', $petition_Judgement_ids)->where('attachmentable_type', "App\Models\Judgement")->Delete();
                    Judgement::whereIn('id', $petition_Judgement_ids)->update(["deleted_at" => now()]);
                }
                info("Deleting Petition $petition Folder");
                $file_path = $public_path . '/storage/attachments/petitions/' . $petition->id;
                if (File::exists($file_path)) {
                    File::deleteDirectory($file_path);
                }
                info("Complete Deleting process of Petition $petition Folder");
                $petition->delete();
                return response([
                    "petition" => $petition,
                    "message" => "Deleted All files Successfully."
                ], 200);
            } else {
                return response('Petition Not Found', 404);
            }
        } catch (\Exception $e) {
            return response([
                "error" => $e->getMessage()
            ], 500);
        }
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
            if ($petition) {
                info("Start Downloading Petition PDF");
                $pdf = PDF::loadView('petition_pdf.petition_index_pdf', compact('petition'));
                return $pdf->download($petition->petition_standard_title . ".pdf");
                info("Complete Downloading Petition PDF");
            } else {
                return response('Petition Data Not Found', 404);
            }
        } catch (\Exception $e) {
            return response([
                "error" => $e->getMessage()
            ], 500);
        }
    }
    public function insertPendingTag(Request $request)
    {
        try {
            Petition::where('id', $request->petition_id)->update(['pending_tag' => $request->pending_tag]);
            if ($request->pending_tag) {
                $message = "Tag Inserted Successfully";
            } else {
                $message = "Tag Removed Successfully";
            }
            return response($message, 200);
        } catch (\Exception $e) {
            return response([
                "error" => $e->getMessage()
            ], 500);
        }
    }
    public function getPendingCase(Request $request)
    {
        try {
            $pending_cases = Petition::with('court')->where('archived', 0)->whereNotNull('pending_tag')->orderBy('id', 'DESC')->get();
            return response(
                [
                    "pendingCases" => $pending_cases,
                    "url" => url("download_pending_cases_pdf"),
                ],
                200
            );
        } catch (\Exception $e) {
            return response([
                "error" => $e->getMessage()
            ], 500);
        }
    }
    public function downloadPendingCase(Request $request)
    {
        try {
            $pendingCases = Petition::with('court')->where('archived', 0)->whereNotNull('pending_tag')->get();
            //return view('petition_pdf.pending_cases_pdf', compact('pendingCases'));
            if ($pendingCases) {
                $pdf = PDF::loadView('petition_pdf.pending_cases_pdf', compact('pendingCases'));
                return $pdf->download("Pending Cases_" . rand(1, 2) . ".pdf");
            } else {
                return response('Pending Petitions Data Not Found', 404);
            }
        } catch (\Exception $e) {
            return response([
                "error" => $e->getMessage()
            ], 500);
        }
    }
}
