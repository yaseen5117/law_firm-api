<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>

<body>
    <p>Greetings!</p>
    <p>Dear {{$added_by_user->name}},</p>
    <p>You have an event ({{$tomorrow_hearing->hearing_summary}}) schedule tomorrow.</p>
    <p>This is an auto-generated email. Please do not reply to it.</p>
    <p>Regards, </p>
    <p>WebManager <br>{{$setting["site_name"]}}<br></p>
</body>

</html>