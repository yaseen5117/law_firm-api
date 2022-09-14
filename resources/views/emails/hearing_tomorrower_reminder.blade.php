<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>

<body>
	<p>Greetings!</p>
	<p>Dear {{$user->name}},</p>
	<p>Your case: {{$petition->petition_standard_title_with_petitioner}}
		is scheduled for hearing tomorrow <b>{{textualDateFormate(@$tomorrow_hearing->hearing_date)}}</b>
		before the {{@$petition->court->title}}.</p>
	<p>To access the case file, please feel free to subscribe to {{$setting["site_name"]}} and log in. <a href="{{$setting['site_url']}}/login">{{$setting["site_url"]}}/login</a></p>
	<p>This is an auto-generated email. Please do not reply to it.</p>
	<p>Regards, </p>
	<p>WebManager <br>{{$setting["site_name"]}}<br></p>
</body>

</html>