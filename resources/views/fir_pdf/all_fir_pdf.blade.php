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
            background-color: rgb(245, 245, 240);
            color: black;
        }
    </style>
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script>
        $(document).ready(function() {
            console.log("ready!");
        });
    </script>
</head>

<body>
    <h2 id="heading">ELAWFIRM PK</h2>
    <h4 id="heading">Fir Reader | Search Results</h4>

    <table id="fir_table">
        <thead>
            <tr>
                <th scope="col">Section</th>
                <th scope="col">Offences</th>
                <th scope="col">
                    Whether the police may arrest without warrant or
                    not
                </th>
                <th scope="col">
                    Whether a warrant or a summon shall ordinarily be
                    issued in the first instance.
                </th>
                <th scope="col">Whether bailable or not</th>
                <th scope="col">Punishment</th>
                <th scope="col">By what Court triable</th>
                <th scope="col">Defination</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sectionSearchResults as $sectionSearchResult)
            @foreach($sectionSearchResult['data'] as $singleSectionResult)
            <tr>
                <td scope="row">
                    {{ $singleSectionResult->fir_no }}
                </td>
                <td>{{ $singleSectionResult->title }}</td>
                <td>{{ $singleSectionResult->arrest_info }}</td>
                <td>{{ $singleSectionResult->warrent_info }}</td>
                <td>{{ $singleSectionResult->bailable_info }}</td>
                <td>{{ $singleSectionResult->punishment_info }}</td>
                <td></td>
                <td>{{ $singleSectionResult->defination }}</td>
            </tr>

            <tr>
                <td colspan="5">
                    Police Station:
                    <b>{{ $sectionSearchResult['police_station'] }}</b>
                </td>
                <td colspan="3">
                    Fir No:
                    <b>{{ $sectionSearchResult['fir_no'] }}</b> of Year:
                    <b>{{ $sectionSearchResult['year'] }}</b>
                </td>
            </tr>
            @endforeach
            @endforeach

        </tbody>

    </table>

</body>

</html>