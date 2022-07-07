<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<p>Hi {{$user->name}},</p>
<p>New documents are uploaded in your case: {{$petition->petition_standard_title_with_petitioner}} in {{$attachmentable_type}} section.</p>
<p>Regards, </p>
</body>
</html>