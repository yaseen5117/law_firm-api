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
            <h2>W.P. 4645/2022 Ehsaan Ullah Qureshi - VS -Learned District Judge (West), Islamabad etc. | PETITION UNDER ARTICLE 199 OF THE CONSTITUTION OF THE ISLAMIC REPUBLIC OF PAKISTAN, 1973 ALONG WITH AFFIDAVIT</h2>
        </td>
    </tr>

</table>
<div class="page-break">
</div>

<div>

    @foreach(@$attachments as $attachment)
    @if($attachment)
    <div>

        <img class="image_style" width="100%" src="{{ asset('').'storage/attachments/petitions/221/PetitionIndex/2219/'.$attachment->file_name }}" alt="File Not Found">

    </div>
    @endif
    @endforeach

</div>
