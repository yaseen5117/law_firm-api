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
    <p>To access the case file <a href="{{$setting['site_url']}}/petitions/{{@$petition->id}}">Click here</a>
    </p>
    <p>This is an auto-generated email. Please do not reply to it.</p>
    <p>Regards, <br>
        WebManager <br>{{$setting["site_name"]}}<br></p>
</body>

</html>