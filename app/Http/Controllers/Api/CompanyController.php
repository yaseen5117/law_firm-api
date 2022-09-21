<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $companies = Company::get();

            return response()->json(
                [
                    'companies' => $companies,
                    'message' => 'All Companies List'
                ],
                200
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
            $user = $request->user();
            if (empty($request->id)) {
                $request->merge([
                    'created_by' => $user->id,
                ]);
            } else {
                $request->merge([
                    'updated_by' => $user->id,
                ]);
            }
            Company::updateOrCreate(['id' => $request->id], $request->except('editMode'));

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
        try {
            $company = Company::find($id);

            return response()->json(
                [
                    'company' => $company,
                    'message' => 'Single Companies Data'
                ],
                200
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
        try {
            $company = Company::find($id);
            if ($company) {
                $company->delete();
            }
            return response()->json(
                [
                    'message' => 'COmpany Deleted SuccessFully'
                ],
                200
            );
        } catch (\Exception $e) {
            return response([
                "error" => $e->getMessage()
            ], 500);
        }
    }
}
