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
</style>


<table class="main">

    <tr>
        <td colspan="6">
            <h2>Pending Cases</h2>
        </td>
    </tr>
</table>

<table class="main">
    <thead>
        <th>Library No.</th>
        <th>Title</th>
        <th>Case No.</th>
        <th>Court</th>
    </thead>
    <tbody>
        @foreach($pendingCases as $pendingCase)
        <tr>
            <td class="cell-padding">{{ $pendingCase->pending_tag }}</td>
            <td class="cell-padding">{{ $pendingCase->title }}</td>
            <td class="cell-padding">{{ $pendingCase->case_no }}/{{ $pendingCase->year }}</td>
            <td class="cell-padding"> @if($pendingCase->court){{ $pendingCase->court->title }} @endif</td>
        </tr>
        @endforeach
    </tbody>
</table>