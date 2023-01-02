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
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script>
        $(document).ready(function() {
            console.log("ready!");
        });
    </script>
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


    </table>

</body>

</html>