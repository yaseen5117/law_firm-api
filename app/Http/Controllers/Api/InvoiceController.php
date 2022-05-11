<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\InvoiceMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            if ($request->due_date) {
                $request->merge([
                    'due_date' => \Carbon\Carbon::createFromFormat('d/m/Y', $request->due_date)->format('Y/m/d'),
                ]);
            }
            $request->merge([
                'invoiceable_type' => "App\Models\Invoice"
            ]);

            $request->merge([
                'invoice_sender_id' => Auth::user()->id
            ]);
            $invoice = Invoice::updateOrCreate(
                ['invoiceable_id' => $request->id],
                $request->only('due_date', 'invoiceable_type', 'invoice_no', 'amount')
            );

            $invoiceMeta = InvoiceMeta::updateOrCreate(
                ['invoice_id' => $invoice->id],
                $request->only('subject', 'services', 'content')
            );

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
        //
    }
    public function downloadInvoicePdf()
    {
        try {             
            $pdf = PDF::loadView('petition_pdf.law_and_policy_pdf');             
            return $pdf->download('lawAndPolicyInvoice.pdf');
        } catch (\Exception $e) {
            return response([
                "error" => $e->getMessage()
            ], 500);
        }
    }
}
