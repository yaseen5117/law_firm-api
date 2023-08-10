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

    <div>
        @foreach (@$attachments as $attachment)
            <img class="image_style" width="100%"
                src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path($file_path . $attachment['file_name']))) }}"
                alt="Image">
        @endforeach
    </div>
</body>

</html>
