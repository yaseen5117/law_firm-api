<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Opinion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OpinionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {

            $query = Opinion::with('user');
            $user = $request->user();
            if ($user->hasRole('lawyer')) {
                $query->where('lawyer_id', $user->id);
            }

            if (!empty($request->client_id)) {
                $query->where('client_id', $request->client_id);
            }
            if (!empty($request->reference_no)) {
                $query->where('reference_no', 'like', '%' . $request->reference_no . '%');
            }
            if (!empty($request->subject)) {
                $query->where('subject', 'like', '%' . $request->subject . '%');
            }

            $opinions = $query->get();
            return response([
                'opinions' => $opinions,
                'message' => 'All Opinions',
                'status' => 200
            ]);
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
            if ($request->issuance_date) {
                $request->merge([
                    'issuance_date' => toDBDate($request->issuance_date), //\Carbon\Carbon::createFromFormat('d/m/Y', $request->issuance_date)->format('Y/m/d'),
                ]);
            }
            $user = $request->user();
            if ($user->hasRole('lawyer')) {
                $request->merge([
                    'lawyer_id' =>  $user->id,
                ]);
            }
            Opinion::updateOrCreate(['id' => $request->id], $request->except('editMode', 'user'));

            return response()->json(
                [
                    'message' => 'Saved successfully',
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
        //
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
        try {
            $record = Opinion::find($id);

            if ($record) {
                $record->delete();
                return response($record, 200);
            } else {
                return response('Data Not Found', 404);
            }
        } catch (\Exception $e) {
            return response([
                "error" => $e->getMessage()
            ], 500);
        }
    }
}
