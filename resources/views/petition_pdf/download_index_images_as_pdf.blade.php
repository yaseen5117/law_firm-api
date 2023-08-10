<!DOCTYPE html>
<html>

<head>
    <title>{{$downloaded_file_name}}</title>
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
