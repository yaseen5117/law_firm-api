<!DOCTYPE html>
<html>

<head>
    <style>
        #heading {
            text-align: center;
        }

        #fir_table {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #fir_table td,
        #fir_table th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #fir_table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #fir_table tr:hover {
            background-color: #ddd;
        }

        #fir_table th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: rgb(143 58 48);
            color: white;
        }
    </style>
</head>

<body>

    <h1 id="heading">Fir List</h1>

    <table id="fir_table">
        <tr>
            <th>Court</th>
            <th>Statute</th>
            <th>Section</th>
            <th>Arrest Info</th>
            <th>Warrent Info</th>
            <th>Bailable Info</th>
            <th>Compoundable Info</th>
            <th>Punishment Info</th>
        </tr>

        @foreach(@$firs as $fir)
        <tr>
            <td>{{$fir->court->title}}</td>
            <td>{{$fir->statute->title}}</td>
            <td>{{$fir->section}}</td>
            <td>{{$fir->arrest_info}}</td>
            <td>{{$fir->warrent_info}}</td>
            <td>{{$fir->bailable_info}}</td>
            <td>{{$fir->compoundable_info}}</td>
            <td>{{$fir->punishment_info}}</td>
        </tr>
        @endforeach

    </table>

</body>

</html>