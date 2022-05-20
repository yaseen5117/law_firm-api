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
    table.content {
        text-align: left;
        table-layout: fixed;
        border-collapse: collapse;        
        width: 100%;
        margin-left: auto;
        margin-right: auto;
        margin-top: 15px;
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
        <td  colspan="4"><h2 style="margin-top: 50px;">{{@$petition->court->title}}</h2></td>
    </tr>
    <tr>
        <td colspan="4"><h4>{{@$petition->petition_standard_title}}</h4></td>
    </tr>
    <tr>
        <td colspan="4"><h3>{{ @$petition->petitioner_names }}</h3></td>
    </tr>
    <tr>
        <td colspan="4"><h4>VERSUS</h4></td>
    </tr>
    <tr>
        <td colspan="4"><h3>{{ @$petition->opponent_names }}</h3></td>
    </tr>
    <tr>
        <td colspan="4"><h3>{{ @$petition->title }}</h3></td>
    </tr>
 
</table> 
<div class="page-break">
</div>
<table class="content"> 
<thead>
    <tr>
        <th>Description of Documents</th>
        <th>Date</th>
        <th>Annexure</th>
        <th>Page</th>     
    </tr>
  </thead>
  <tbody> 
      @if(@$petition->petition_indexes)
      @foreach(@$petition->petition_indexes as $petition_index)
    <tr>
        <td style="padding-top: 15px;">{{ $petition_index->document_description }}</td>
        <td>{{ $petition_index->date }}</td>
        <td>{{ $petition_index->annexure }}</td>
        <td>{{ $petition_index->page_info }}</td>
    </tr> 
    @endforeach
    @endif
    </tbody>
</table> 
 