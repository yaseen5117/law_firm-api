<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Attachment;
use App\Models\ContractCategory;
use App\Models\ContractsAndAgreement;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class ContractsAndAgreementController extends Controller
{

    public function __construct()
    {
        $this->middleware('role:admin|staff')->except(['index', 'contractCategory', 'show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = ContractsAndAgreement::query()->with('attachment', 'category');
        if (!empty($request->title)) {
            $query->where('title', 'like', '%' . $request->title . '%');
        }
        if (!empty($request->contract_category_id)) {
            $query->where('contract_category_id', $request->contract_category_id);
        }
        $contracts_and_agreemnets = $query->get();
        return response([
            'contracts_and_agreemnets' => $contracts_and_agreemnets,
            'message' => "All Contracts And Agreement"
        ]);
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
            $request->merge([
                'slug' => Str::slug($request->title)
            ]);
            $contract_and_agreement = ContractsAndAgreement::updateOrCreate(['id' => $request->id], $request->except('editMode', 'files'));
            //getting files from request
            $files = $request->file('files');
            if ($files) {
                foreach ($files as $key => $file) {
                    info("AttachmentController store Function: File mime_type: " . $file->getClientMimeType());
                    $name = time() . '_' . $file->getClientOriginalName();
                    $file_path = $file->storeAs('attachments/contracts-and-agreements/' . $contract_and_agreement->id . '/', $name, 'public');
                    $mime_type = $file->getClientMimeType();

                    $file_name = time() . '_' . $file->getClientOriginalName();
                    $title = $file_name;
                    $attachmentable_type = "App\Models\ContractsAndAgreement";
                    $attachmentable_id = $contract_and_agreement->id;
                    Attachment::updateOrCreate(
                        [
                            'attachmentable_id' => $attachmentable_id,
                            'attachmentable_type' => $attachmentable_type
                        ],
                        [
                            'file_name' => $file_name,
                            'title' => $title,
                            'attachmentable_type' => $attachmentable_type,
                            'attachmentable_id' => $attachmentable_id,
                            'mime_type' => $mime_type,
                        ]
                    );
                }
            }
            return response()->json(
                [
                    'message' => 'Court Saved Successfully',
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
            $contract_and_agreement = ContractsAndAgreement::with('attachment', 'category')->find($id);

            return response()->json(
                [
                    'contract_and_agreement' => $contract_and_agreement,
                    'message' => 'Contract And Agreement Single',
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
        try {
            $ContractsAndAgreement = ContractsAndAgreement::find($id);
            if ($ContractsAndAgreement) {
                $ContractsAndAgreement->delete();
                return response("Deleted Successfully", 200);
            } else {
                return response('Contracts Agreement Data Not Found', 404);
            }
        } catch (\Exception $e) {
            return response([
                "error" => $e->getMessage()
            ], 500);
        }
    }
    public function contractCategory()
    {
        try {
            $categories = ContractCategory::all();
            return response([
                'categories' => $categories,
                'message' => 'all contract categories',
                'code' => 200
            ]);
        } catch (\Exception $e) {
            return response([
                "error" => $e->getMessage()
            ], 500);
        }
    }
}
