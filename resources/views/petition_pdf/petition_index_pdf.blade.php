<style>
    table.main {
        text-align: center;
        table-layout: fixed;
        border-collapse: collapse;
        border: none;
        width: 100%;         
        margin: 50% auto 50% auto;
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

    .td {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    .color:nth-child(even) {
        background-color: #dddddd;
    }

    .line-height {
        font-size: 18px !important;
        line-height: 30px !important;
        font-weight: bold;
    }
</style>

<table class="main" cellspacing="0" cellpadding="0">
    <tr class="line-height">
        <td colspan="4">
            <h2>{{@$petition->court->title}}</h2>
        </td>
    </tr>
    <tr class="line-height">
        <td colspan="4">{{@$petition->petition_standard_title}}</td>
    </tr>
    <tr class="line-height">
        <td colspan="4">{{ @$petition->petitioner_names }}</td>
    </tr>
    <tr class="line-height">
        <td colspan="4">VERSUS</td>
    </tr>
    <tr class="line-height">
        <td colspan="4">{{ @$petition->opponent_names }}</td>
    </tr>
    <tr class="line-height">
        <td colspan="4">{{ @$petition->title }}</td>
    </tr>

</table>
<div class="page-break">
</div>
<table class="content">
    <thead>
        <tr>
            <th colspan="4" style="text-align: center;">
                <h1>Index</h1>
            </th>
        </tr>
        <tr>
            <th class="td">Description of Documents</th>
            <th class="td">Date</th>
            <th class="td">Annexure</th>
            <th class="td">Page</th>
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
<div class="page-break">
</div>

<div>
    @if(@$petition->petition_indexes)
    @foreach(@$petition->petition_indexes as $petition_index)
    <div style="text-align: center; margin: 50% auto 50% auto;">
        <h1>{{ $petition_index->document_description }}</h1>
    </div>   
    @foreach(@$petition_index->attachments as $attachment)    
    <div>
    <!-- <a href="{{asset('').'storage/attachments/'.$petition_index->id.'/'.$attachment->file_name}}" target="_blank"> -->
        <img class="image_style" width="100%" src="{{ asset('').'storage/attachments/'.$petition_index->id.'/'.$attachment->file_name }}" alt="File Not Found">
    <!-- </a> -->
    </div>  
     
    @endforeach
    <div class="page-break">
    </div>
    @endforeach
    @endif
</div>