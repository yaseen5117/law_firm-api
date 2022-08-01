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
use DateInterval;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PDF;
use Symfony\Component\Process\Process;

use function GuzzleHttp\Promise\all;

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
            $query = Invoice::with('invoice_meta', 'client', 'invoice_expenses', 'status', 'attachment')->select("invoices.*");
            if (!empty($request->invoice_no)) {
                $query->where('invoice_no', 'like', '%' . $request->invoice_no . '%');
            }
            $query
                ->join('users', 'users.id', '=', 'invoices.invoiceable_id');
            if (!empty($request->client_name)) {

                $query->where('name', 'like', '%' . $request->client_name . '%');
            }
            if (!empty($request->invoice_status_id)) {

                $query->where('invoices.invoice_status_id', $request->invoice_status_id);
            }
            if ($request->start_to_end_date && array_key_exists(0, $request->start_to_end_date) && array_key_exists(1, $request->start_to_end_date)) {
                $request->merge([
                    'start_date' => date("Y-m-d", strtotime($request->start_to_end_date[0])) . ' 00:00:00',

                    'end_date' => date("Y-m-d", strtotime($request->start_to_end_date[1])) . ' 23:59:59',
                ]);

                if ($request->date_type == "created_at") {
                    $filter_col_name = "created_at";
                } elseif ($request->date_type == "due_date") {
                    $filter_col_name = "due_date";
                } elseif ($request->date_type == "paid_date") {
                    $filter_col_name = "paid_date";
                } else {
                    $filter_col_name = "created_at";
                }

                $query->whereBetween('invoices.' . $filter_col_name, [$request->start_date, $request->end_date]);
            }
            $today_date =  Carbon::today();
            if ($request->is_archive == "true") {
                $query->where('invoices.invoice_status_id', 3)->whereDate('invoices.due_date', "<", $today_date); //3 is the status of invoice.
            } else {
                $query->whereDate('invoices.due_date', ">=", $today_date);
            }
            $invoices_total = $query->sum('amount');
            $paid_invoices_total = $query->sum('amount');
            $due_invoices_total = $invoices_total - $paid_invoices_total;


            if ($request->user()->hasRole('client')) {
                $query->where('invoiceable_id', $request->user()->id);
            }


            $query->groupBy('invoices.id')->orderby('invoices.id', 'desc');
            $invoices = $query->paginate(10);

            return response()->json(
                [
                    'invoices' => $invoices,
                    'invoices_stats' => [
                        'total' => $invoices_total,
                        'total_paid' => $paid_invoices_total,
                        'total_due' => $due_invoices_total,
                    ],
                    'message' => 'All invoices',
                    'code' => 200
                ]
            );
        } catch (\Exception $e) {
            return response([
                "error" => $e->getMessage()
            ], 500);
        }
    }

    public function invoicesStats()
    {
        try {

            $invoices_total = Invoice::sum('amount');
            $paid_invoices_total = Invoice::where('invoice_status_id', 3)->sum('paid_amount');
            $due_invoices_total = $invoices_total - $paid_invoices_total;

            return response()->json(
                [
                    'invoices_stats' => [
                        'total' => $invoices_total,
                        'total_paid' => $paid_invoices_total,
                        'total_due' => $due_invoices_total,
                    ],
                    'message' => 'All invoices stats',
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
        DB::beginTransaction();

        try {
            info("INVOICE STORE FUNCTION START");
            //replace due date in content 
            //$content = str_replace("{due_date}",$request->due_date,$request->invoice_meta['content']);            
            $request->invoice_meta['content'];
            if ($request->due_date) {
                $request->merge([
                    'due_date' => toDBDate($request->due_date), //\Carbon\Carbon::createFromFormat('d/m/Y', $request->due_date)->format('Y/m/d'),
                ]);
            }

            //'start_date' => \Carbon\Carbon::parse($request->due_date)->addSeconds(120)->format('M d, Y'), its format like (may 24, 2022)
            $request->merge([
                'invoiceable_type' => "App\Models\User"
            ]);

            $request->merge([
                'invoice_sender_id' => Auth::user()->id
            ]);

            $request->merge([
                'invoiceable_id' => $request->selectedClient['id']
            ]);

            $invoice = Invoice::updateOrCreate(
                ['id' => $request->id],
                $request->only('due_date', 'invoiceable_id', 'invoiceable_type', 'invoice_no', 'amount', 'apply_tax', 'tax_percentage', 'invoice_status_id')
            );
            //replace total amount in content 
            //$content = str_replace("{total_amount}",$invoice->total(),$content);

            info("INVOICE STORE FUNCTION: INVOICE SAVED.");

            if ($invoice) {
                $invoice_meta_data = $request->invoice_meta;
                //$invoice_meta_data['content'] = $content;
                $invoiceMeta = InvoiceMeta::updateOrCreate(
                    ['invoice_id' => $invoice->id],
                    $invoice_meta_data
                );

                if ($request->edit_client && $request->selectedClient) {
                    $selected_user_data = $request->selectedClient;
                    User::where('id', $request->invoiceable_id)->update([
                        'address' => @$selected_user_data['address'],
                        'company_name' => @$selected_user_data['company_name'],
                        'phone' => @$selected_user_data['phone'],
                    ]);
                }

                if (!empty($request->invoice_expenses)) {
                    foreach ($request->invoice_expenses as $invoice_expense) {
                        $invoice_expense['invoice_id'] = $invoice->id;
                        InvoiceExpense::updateOrCreate(['id' => @$invoice_expense['id']], $invoice_expense);
                    }
                }
            } else {
                return response([
                    "error" => "Something went wrong with the creation of invoice!",
                ], 500);
            }


            DB::commit();

            info("INVOICE STORE FUNCTION: EMAIL");

            //now invoice and its tables enteries completed, we can send email.
            if ($request->sendEmail) {
                //cc email
                try {
                    info("PREPARING INVOICE EMAIL VARIABLES");
                    $cc_emails = null;
                    if ($request->contact_person_emails && is_array($request->contact_person_emails)) {
                        $cc_emails = $request->contact_person_emails;
                    } else if ($request->contact_person_emails) {
                        $cc_emails = explode(',', $request->contact_person_emails);
                    }

                    $userInvoiceData = Invoice::with('invoice_meta', 'client', 'client.contact_persons', 'invoice_expenses', 'status')->find($invoice->id);
                    info("PREPARING INVOICE EMAIL VARIABLES OF PDF");
                    $pdf = PDF::loadView('petition_pdf.law_and_policy_pdf', compact('userInvoiceData'));
                    info("PREPARING INVOICE EMAIL SERVICE CALL");
                    $emailService = new EmailService;
                    $d = $emailService->sendInvoiceEmail($invoice, $cc_emails, $pdf);
                } catch (\Exception $e) {
                    info("Error in invoice email function: " . $e->getMessage());
                }

                //return response($d, 403);
                $invoice->update(["invoice_status_id" => 2]); //2 is the invoice status id
            }

            info("INVOICE STORE FUNCTION END");
            return response()->json(
                [
                    'message' => 'Saved successfully',
                    'code' => 200
                ]
            );
        } catch (\Exception $e) {
            info("Error in invoice function: " . $e->getMessage());
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
            $invoice = Invoice::with('invoice_meta', 'client', 'client.contact_persons', 'invoice_expenses', 'status', 'attachment')->find($id);

            return response()->json(
                [
                    'invoice' => $invoice,
                    'today_date' => \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', Carbon::today())->format('d/m/Y'),
                    'message' => 'Invoice Details',
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
    public function destroy($invoiceId)
    {
        try {
            $invoice = Invoice::find($invoiceId);
            $invoice_meta = InvoiceMeta::where('invoice_id', $invoice->id);

            if ($invoice) {
                $invoice->delete();
                if ($invoice_meta) {
                    $invoice_meta->delete();
                }
                return response("Deleted Successfully", 200);
            } else {
                return response('Invoice Not Found', 404);
            }
        } catch (\Exception $e) {
            return response([
                "error" => $e->getMessage()
            ], 500);
        }
    }
    public function downloadInvoicePdf($invoiceId)
    {
        try {
            $userInvoiceData = Invoice::with('invoice_meta', 'client', 'client.contact_persons', 'invoice_expenses', 'status')->find($invoiceId);
            //return view('petition_pdf.law_and_policy_pdf', compact('userInvoiceData'));          
            if ($userInvoiceData) {
                $pdf = PDF::loadView('petition_pdf.law_and_policy_pdf', compact('userInvoiceData'));
                return $pdf->download('Invoice-' . $userInvoiceData->invoice_no . '.pdf');
            } else {
                return response('Invoice Data Not Found', 404);
            }
        } catch (\Exception $e) {
            return response([
                "error" => $e->getMessage()
            ], 500);
        }
    }
    public function deleteInvoiceExpense($invoice_expense_id)
    {
        try {
            $invoice_expense = InvoiceExpense::find($invoice_expense_id);
            if ($invoice_expense) {
                $invoice_expense->delete();
                return response("Invoice Expense Deleted Successfully", 200);
            } else {
                return response('Invoice Expense Data Not Found', 404);
            }
        } catch (\Exception $e) {
            return response([
                "error" => $e->getMessage()
            ], 500);
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
                "error" => $e->getMessage()
            ], 500);
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
                "error" => $e->getMessage()
            ], 500);
        }
    }

    public function markAsPaid(Request $request)
    {
        try {
            if ($request->paid_date) {
                $request->merge([
                    'paid_date' => toDBDate($request->paid_date), //\Carbon\Carbon::createFromFormat('d/m/Y', $request->paid_date)->format('Y/m/d'),
                ]);
            }

            $invoice = Invoice::whereId($request->id)->update([
                'invoice_status_id' => 3,
                'paid_date' => $request->paid_date,
                'notes' => $request->notes,
                'paid_amount' => $request->amount,
            ]);

            return response()->json(
                [
                    'invoice' => $invoice,
                    'paid_at' => $request->paid_date,
                    'message' => 'Mark Invoice as Paid',
                    'code' => 200
                ]
            );
        } catch (\Exception $e) {
            return response([
                "error" => $e->getMessage()
            ], 500);
        }
    }
}
