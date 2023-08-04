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

<div>
 
    @foreach(@$indexData->attachments as $image)
    @if($image)
    <div>
         
        <img class="image_style" width="100%" src="{{ asset('').'storage/attachments/petitions/'.$indexData->petition_id.'/PetitionIndex/'.$image['attachmentable_id'].'/'.$image['file_name'] }}" alt="File Not Found">
 
    </div>
    @endif
    @endforeach

</div>