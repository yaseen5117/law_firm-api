<!DOCTYPE html>
<html>

<head>
    <title></title>
    <!-- Additional meta tags, stylesheets, scripts, etc. -->

    <style>
        .page-break {
            page-break-after: always;
        }
    </style>
</head>

<body>
    <table class="content">
        <thead>
            <tr>
                <th class="td">Description of Documents</th>
                <th class="td">Date</th>
                <th class="td">Annexure</th>
                <th class="td">Page</th>
            </tr>
        </thead>
        <tbody>
            <tr class="color">
                <td class="td">eeee</td>
                <td class="td">44444</td>
                <td class="td">fffff</td>
                <td class="td">gggggg</td>
            </tr>
        </tbody>
    </table>
    <div class="page-break">
    </div>
    <div>
        @foreach(@$attachments as $attachment)
        <img class="image_style" width="100%" src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path($file_path . $attachment['file_name']))) }}" alt="Image">
        @endforeach
    </div>
</body>

</html>