<!DOCTYPE html>
<html>

<head>
    <title></title>
    <!-- Additional meta tags, stylesheets, scripts, etc. -->
</head>

<body>
    <div>
        @foreach(@$attachments as $attachment)
            @if($attachment)
            <div>
                <img class="image_style" width="100%" src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path($file_path . $attachment['file_name']))) }}" alt="Image">
                <br><br>
            </div>
            @endif
        @endforeach
    </div>
</body>

</html>