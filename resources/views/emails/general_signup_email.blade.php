<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>

<body>
    <p>Dear {{@$user->name}},</p>
    <p>Your account has been created on {{@$setting['site_name']}}. You can always login to {{@$setting['site_name']}} in order to access your case status, case records, invoices and other useful legal information.</p>
    @if(@$send_email_and_password)
    <p>Your Email and Password are provided below:</p>
    <p><b>Email:</b> <u>{{@$user->email}}</u></p>
    <p><b>Password:</b> <u>{{@$password}}</u></p>
    @endif
    <p>You can always change your password by logging in. <span style="color: red; font-weight: bold">Please do not share your login details with any one.</span> </p>
    <p>To proceed to Login page, please click the link below:</p>
    <a href="{{@$setting['site_url']}}/login" target="_blank">{{@$setting['site_url']}}/login</a>
    <p><b>Regards,</b></p>
    <p>{{@$setting['site_name']}}</p>
</body>

</html>
