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
        border-collapse: collapse;        
        width: 100%;
        margin-left: auto;
        margin-right: auto;
        margin-top: 15px;
        font-size: 12px;
    }
    .page-break {
        page-break-after: always;
    }   
    .td{
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
    }

    .color:nth-child(even) {
    background-color: #dddddd;
    }
</style>

<table class="main">       
    <tr>
        <td  colspan="4"><h2 style="margin-top: 30%;">{{@$petition->court->title}}</h2></td>
    </tr>
    <tr>
        <td colspan="4"><h4>{{@$petition->petition_standard_title}}</h4></td>
    </tr>
    <tr>
        <td colspan="4"><h3>{{ @$petition->petitioner_names }}</h3></td>
    </tr>
    <tr>
        <td colspan="4"><h5>VERSUS</h5></td>
    </tr>
    <tr>
        <td colspan="4"><h3>{{ @$petition->opponent_names }}</h3></td>
    </tr>
    <tr>
        <td colspan="4"><h4>{{ @$petition->title }}</h4></td>
    </tr>
 
</table> 
<div class="page-break">
</div>
<table class="content"> 
<thead>
    <tr>
        <th colspan="4" style="text-align: center;"><h2>Index</h2></th>
    </tr>
    <tr>
        <th class="td" >Description of Documents</th>
        <th class="td" >Date</th>
        <th class="td" >Annexure</th>
        <th class="td" >Page</th>     
    </tr>
  </thead>
  <tbody>   
      @if(@$petition->petition_indexes)
      @foreach(@$petition->petition_indexes as $petition_index)
    <tr class="color">
        <td class="td" style="padding-top: 15px;">{{ $petition_index->document_description }}</td>
        <td class="td">@if($petition_index->date){{ date('d/m/Y', strtotime($petition_index->date)) }}@endif</td>
        <td class="td">{{ $petition_index->annexure }}</td>
        <td class="td" style="width: 100px;">{{ $petition_index->page_info }}</td>
    </tr> 
    @endforeach
    @endif
    </tbody>
</table> 
 