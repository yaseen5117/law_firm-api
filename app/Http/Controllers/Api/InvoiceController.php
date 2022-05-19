<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\EmailService;
use App\Models\User;
use App\Models\Invoice;
use App\Models\InvoiceMeta;
use App\Models\InvoiceExpense;
use App\Models\InvoiceStatus;
use App\Models\InvoiceTemplate;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDF;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {         
        try {
            $query = Invoice::with('invoice_meta','client','invoice_expenses','status')->select("invoices.*");
            if (!empty($request->invoice_no)) {
                $query->where('invoice_no','like','%'.$request->invoice_no.'%');
            }
            $query                 
                ->join('users', 'users.id', '=', 'invoices.invoiceable_id');
            if (!empty($request->client_name)) {

                $query->where('name','like','%'.$request->client_name.'%');
            }     
            $today_date =  Carbon::today();
            if ($request->is_archive == "true") {
                $query->whereDate('invoices.due_date', "<", $today_date);
            }else{
                $query->whereDate('invoices.due_date', ">=", $today_date);
            }
            $invoices = $query->groupBy('invoices.id')->get();
            return response()->json(
                [
                    'invoices' => $invoices,
                    'message' => 'All invoices',
                    'code' => 200
                ]
            );
        }catch (\Exception $e) {
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
        DB::beginTransaction();
        try {

            //replace due date in content 
            //$content = str_replace("{due_date}",$request->due_date,$request->invoice_meta['content']);            
            $request->invoice_meta['content'];
            if ($request->due_date) {
                $request->merge([
                    'due_date' => \Carbon\Carbon::createFromFormat('d/m/Y', $request->due_date)->format('Y/m/d'),
                ]);
            }
            $request->merge([
                'invoiceable_type' => "App\Models\User"
            ]);

            $request->merge([
                'invoice_sender_id' => Auth::user()->id
            ]);            
             
            $invoice = Invoice::updateOrCreate(
                ['id' => $request->id],
                $request->only('due_date', 'invoiceable_id', 'invoiceable_type', 'invoice_no', 'amount','apply_tax','tax_percentage')
            );
            //replace total amount in content 
            //$content = str_replace("{total_amount}",$invoice->total(),$content);
            
             
            if($invoice){
                $invoice_meta_data = $request->invoice_meta;
                //$invoice_meta_data['content'] = $content;
                $invoiceMeta = InvoiceMeta::updateOrCreate(
                    ['invoice_id' => $invoice->id],
                    $invoice_meta_data
                );

                if ($request->edit_client && $request->selectedClient) {
                    $selected_user_data= $request->selectedClient;
                    User::where('id',$request->invoiceable_id)->update([
                        'address'=>@$selected_user_data['address'],
                        'company_name'=>@$selected_user_data['company_name'],
                        'phone'=>@$selected_user_data['phone'],
                    ]);
                }

                if (!empty($request->invoice_expenses)) {
                    foreach ($request->invoice_expenses as $invoice_expense) {
                        $invoice_expense['invoice_id'] = $invoice->id;
                        InvoiceExpense::updateOrCreate(['id'=>@$invoice_expense['id']] , $invoice_expense);
                    }
                }
            }
            else{
                return response([
                    "error" => "Something went wrong with the creation of invoice!",
                ], 500);
            }        

             
            DB::commit();

            //now invoice and its tables enteries completed, we can send email.
            if($request->sendEmail){
                $emailService = new EmailService;
                $emailService->sendInvoiceEmail($invoice);                 
                $invoice->update(["invoice_status_id" => 2]);//2 is the invoice status id
            }            

            return response()->json(
                [
                    'message' => 'Saved successfully',
                    'code' => 200
                ]
            );
        } catch (\Exception $e) {
            DB::rollback();
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
            $invoice = Invoice::with('invoice_meta','client','client.contact_persons','invoice_expenses','status')->find($id);
            return response()->json(
                [
                    'invoice' => $invoice,
                    'message' => 'Invoice Details',
                    'code' => 200
                ]
            );
        }catch (\Exception $e) {
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
    public function destroy($invoiceId)
    {
        try {             
            $invoice = Invoice::find($invoiceId); 
            $invoice_meta = InvoiceMeta::where('invoice_id', $invoice->id); 
                    
            if($invoice){
                $invoice->delete();
                if($invoice_meta){
                    $invoice_meta->delete();
                }
                return response("Deleted Successfully",200);
            }else{
                return response('Invoice Not Found',404);
            }
            
        } catch (\Exception $e) {
            return response([
                "error"=>$e->getMessage()
            ],500);
        }
    }
    public function downloadInvoicePdf($invoiceId)
    {         
        try { 
            $userInvoiceData = Invoice::with('invoice_meta','client','client.contact_persons','invoice_expenses','status')->find($invoiceId);
            //return view('petition_pdf.law_and_policy_pdf', compact('userInvoiceData'));          
            if($userInvoiceData){
                $pdf = PDF::loadView('petition_pdf.law_and_policy_pdf', compact('userInvoiceData'));            
                return $pdf->download('lawAndPolicyInvoice.pdf');
            }else{
                return response('Invoice Data Not Found',404);
            }
            
        } catch (\Exception $e) {
            return response([
                "error" => $e->getMessage()
            ], 500);
        }
    }
    public function deleteInvoiceExpense($invoice_expense_id){
        try {             
            $invoice_expense = InvoiceExpense::find($invoice_expense_id);              
            if($invoice_expense){
                $invoice_expense->delete();               
                return response("Invoice Expense Deleted Successfully",200);
            }else{
                return response('Invoice Expense Data Not Found',404);
            }            
        } catch (\Exception $e) {
            return response([
                "error"=>$e->getMessage()
            ],500);
        }
    }

    public function invoice_statuses()
    {
        try {
            $invoice_statuses = InvoiceStatus::all();
            return response()->json(
                [
                    'invoice_statuses' => $invoice_statuses,
                    'message' => 'All invoice_statuses',
                    'code' => 200
                ]
            );
        } catch (\Exception $e) {
            return response([
                "error"=>$e->getMessage()
            ],500);
        }
    }
    public function invoice_templates()
    {
        try {
            $invoice_templates = InvoiceTemplate::all();
            return response()->json(
                [
                    'invoice_templates' => $invoice_templates,
                    'message' => 'All invoice_templates',
                    'code' => 200
                ]
            );
        } catch (\Exception $e) {
            return response([
                "error"=>$e->getMessage()
            ],500);
        }
    }

    public function mark_paid(Request $request)
    {
        try {
            $invoice = Invoice::whereId($request->id)->update([
                'invoice_status_id'=>3,
                'paid_date'=>now(),
            ]);

            return response()->json(
                [
                    'invoice' => $invoice,
                    'paid_at' => date("Y-m-d"),
                    'message' => 'All invoice_templates',
                    'code' => 200
            ]);
        } catch (Exception $e) {
            return response([
                "error"=>$e->getMessage()
            ],500);
        }
    }
}
