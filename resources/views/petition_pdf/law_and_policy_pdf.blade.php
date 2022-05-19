<style>
    table.main {
        text-align: center;
        table-layout: fixed;
        border-collapse: collapse;
        border: none;
        width: 100%;
        margin-left: auto;
        margin-right: auto;
    }

    .cell-padding {
        padding: 10px;
    }

    td {
        border: none;         
    }

    .row-grey {
        background-color: #D3D3D3;
    }

    .row-yellow {
        background-color: #FFFF00;
    }

    .page-break {
        page-break-after: always;
    }

    .text-center {
        text-align: center;
    }

    .img-div-size {
        width: 400;
        min-height: 120;
        max-height: 200;
    }

    .img-size {
        max-width: 100%;
        height: 200;
        color: #FF0000;
    }

    .text-red {
        color: red;
    }
    .invoice-padding{
        padding: 15px 15px 15px 15px;
        border: 4px black solid;
    }
    .row-padding{
        padding-top: 20px; 
        padding-bottom: 20px;
    }
    .color-black{
        width: 50%;
        background-color: black;
        padding-top: 3px; 
        padding-bottom: 3px; 
    }
    .align-item-left{
        text-align: left;
    }
    .align-item-register_shutdown_function{
        text-align: right;
    }
</style>

<table class="main">    
<tr>
        <td colspan="6" class="cell-padding"></td>
        
    </tr>
    <tr>
        <td colspan="6"><h2>The Law and Policy Chambers</h2></td>
    </tr>
    <tr>
        <td colspan="3" class="cell-padding"></td>
        <td colspan="3" class="cell-padding"></td>
    </tr>
    <tr>
        <td class="align-item-left" colspan="3">Office No. 5, Saeed Plaza, Plot 71, </td>
        <td class="align-item-right" colspan="3">Phone: (+92301) 5011568</td>
    </tr>
    <tr>
        <td class="align-item-left" colspan="3">I & T Center, opposite</td>
        <td class="align-item-right" colspan="3">(+9251) 8431759</td>
    </tr>
    <tr>
        <td class="align-item-left" colspan="3">Islamabad High Court, Sector G-10/1
            Islamabad 44000, Pakistan</td>
        <td class="align-item-right" colspan="3">Email: umer.gilani@lawandpolicychambers.com</td>
    </tr>

    <tr>
        <td colspan="6" class="cell-padding"></td>
        
    </tr>
    <tr>
        <td colspan="6" class="color-black"></td>        
    </tr>
    <tr>
        <td colspan="6" class="cell-padding"></td>
        
    </tr>
    <tr>
        <td class="align-item-left"><b>Client ID:</b></td>
        <td class="align-item-left">{{@$userInvoiceData->client->name}}</td>
        <td class="align-item-left"><b>Invoice No:</b></td>
        <td class="align-item-left">{{@$userInvoiceData->invoice_no}}</td>
        <td class="align-item-left"><b>Date:</b></td>
        <td class="align-item-left">{{@$userInvoiceData->due_date}}</td>
    </tr>
    <tr>
        <td  class="align-item-left" colspan="1"><b>Company:</b></td>
        <td class="align-item-left" colspan="2">{{@$userInvoiceData->client->company_name}}</td>
        <td class="align-item-left" colspan="1"><b>Phone:</b></td>
        <td class="align-item-left" colspan="2">{{@$userInvoiceData->client->phone}}</td>
    </tr>
    <tr>
        <td class="align-item-left" colspan="1"><b>Attention:</b></td>
        <td class="align-item-left" colspan="2">Engr. Dr. Nasir Mehmood Khan, Registrar</td>
        <td class="align-item-left" colspan="1"><b>Fax:</b></td>
        <td class="align-item-left" colspan="2"></td>
    </tr>
    <tr>
        <td class="align-item-left" colspan="1"><b>CC:</b></td>
        <td class="align-item-left" colspan="2">
        @if(@$userInvoiceData->client->contact_persons) 
            @php 
                $count = 0;            
            @endphp 
            @foreach(@$userInvoiceData->client->contact_persons as $contact_person)            
            @if(!$count == 0)
            ,
            @endif
            {{@$contact_person->name}}
            @php
            $count++;
            @endphp
            @endforeach
        @endif
        </td>
        <td class="align-item-left" colspan="3"></td>

    </tr>
    <tr>
        <td class="align-item-left" colspan="1"><b>Address:</b></td>
        <td class="align-item-left" colspan="2">
        {{@$userInvoiceData->client->address}}</td>
        <td class="align-item-left" colspan="1"><b>E-mail:</b></td>
        <td class="align-item-left" colspan="2">{{@$userInvoiceData->client->email}}</td>
    </tr>
    <tr>
        <td colspan="3"></td>

        <td class="align-item-left" colspan="1"><b>Via:</b></td>
        <td class="align-item-left" colspan="2">Email Only</td>
    </tr>

</table><br>
<div style="width: 100%; margin-left: auto; margin-right: auto;">
    <div>
        <b>Subject:&emsp;<span>{{@$userInvoiceData->invoice_meta->subject}}</span></b>
    </div>
    <div><br>
        <b>Dear Sir:</b><br>
        <p>{{@$userInvoiceData->invoice_meta->content}}</p>
        <img width="100px" height="100px" class="" src="{{ asset('admin-template/img/sign.png')}}" alt="sign">
    </div>
</div>
<div class="page-break">
</div>
<br>
<table class="main">
    <tr class="">
        <td colspan="6"><h2>The Law and Policy Chambers</h2></td>
    </tr>
    <tr>
        <td colspan="3" class="cell-padding"></td>
        <td colspan="3" class="cell-padding"></td>
    </tr>
    <tr>
        <td class="align-item-left" colspan="3">Office No. 5, Saeed Plaza, Plot 71, I & T Center, Opposite </td>
        <td class="align-item-right" colspan="3">Phone: (+92301) 501-1568<br>
(+9251) 8431759</td>
    </tr>
    <tr>
        <td class="align-item-left" colspan="3">Islamabad High Court, Sector G-10/1
Islamabad 44000, Pakistan</td>
        <td class="align-item-right" colspan="3">Email: umer.gilani@lawandpolicychambers.com</td>
    </tr>
    <tr>
        <td colspan="6" class="cell-padding"></td>
 
    </tr>
    <tr>
        <td colspan="6" class="color-black"></td>        
    </tr>
    <tr>
        <td colspan="6" class="cell-padding"></td>
         
    </tr>
    <tr>
        <td colspan="6" class="invoice-padding"><h3>INVOICE</h3></td>        
    </tr>
    <tr>
        <td colspan="6" class="cell-padding"></td>        
    </tr>
    <tr>
        <td class="align-item-left"><b>Client ID:</b></td>
        <td class="align-item-left">{{@$userInvoiceData->client->name}}</td>
        <td class="align-item-left"><b>Invoice No:</b></td>
        <td class="align-item-left">{{@$userInvoiceData->invoice_no}}</td>
        <td class="align-item-left"><b>Date:</b></td>
        <td class="align-item-left">{{@$userInvoiceData->due_date}}</td>
    </tr>
    <tr>
        <td class="row-padding"><b></b></td>
        <td></td>
        <td><b></b></td>
        <td></td>
        <td><b></b></td>
        <td></td>
    </tr>
    <tr>
        <td class="row-padding align-item-left" colspan="3"><b>Professional Services</b></td>
        <td class="align-item-right" colspan="3"><b>Amount</b></td>
    </tr>
    <tr>
        <td class="align-item-left" colspan="3">{{@$userInvoiceData->invoice_meta->services}}</td>
        <td class="align-item-right" colspan="3">{{@$userInvoiceData->amount}}</td>
    </tr>
    <tr>
        <td class="align-item-left" colspan="3"><b>Withholding tax deduction @ 10% on professional services <br>
        (NTN: 61101-9809897-3</b></td>
        <td class="align-item-right" colspan="3">@if(@$userInvoiceData->apply_tax) {{@$userInvoiceData->amount*0.1}} @else  @endif</td>
    </tr>
    @if(@$userInvoiceData->invoice_expenses)
    <tr>         
        <td class="align-item-left" colspan="6" style="text-align: left;"><b>Expenses</b></td>
    </tr>
    <tr>  
    @foreach(@$userInvoiceData->invoice_expenses as $invoice_expense)       
    <tr>
        <td class="align-item-left" colspan="3">{{@$invoice_expense->expense}}</td>
        <td class="align-item-right" colspan="3">{{@$invoice_expense->amount}}</td>
    </tr>
    @endforeach
    @endif
    <tr>
        <td class="align-item-left" class="row-padding" colspan="3"><b>Total</b></td>
        <td colspan="3" class="align-item-right"><b>{{@$userInvoiceData->total()}}</b></td>
    </tr>
    <tr>
        <td class="row-padding" colspan="6"></td>
        
    </tr>
</table>