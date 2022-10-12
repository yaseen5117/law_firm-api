<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>

<body>
    <p>Hello {{@$setting['site_name']}} Admin,</p>
    <p>A new user has signed up on {{@$setting['site_name']}}.</p>
    <p>Please review and verify account here: <a href="{{@$user_profile_url}}" target="_blank">{{@$user_profile_url}}</a></p>
    <p><b>Regards,</b></p>
    <p>{{@$setting['site_name']}}</p>
</body>

</html>