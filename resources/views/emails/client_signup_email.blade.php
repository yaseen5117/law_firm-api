<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>

<body>
    <p>Dear {{@$user->name}},</p>
    <p>Thank you for visiting {{@$setting['site_name']}} and registering yourself with us. You can always login to {{@$setting['site_name']}} in order to access your case status, case records, invoices and other useful legal information.</p>
    @if(@$send_email_and_password)
    <p>Your Email and Password are provided below:</p>
    <p><b>Email: <u>{{@$user->email}}</u></b></p>
    <p><b>Password: <u>{{@$password}}</u></b></p>
    @endif
    <p>You can always change your password by logging in. <span style="color: red; font-weight: bold">Please do not share your login details with any one.</span> </p>
    <p>To proceed to Login page, please click the link below:</p>
    <a href="{{@$login_url}}" target="_blank">{{@$login_url}}</a>
    <p><b>Regards,</b></p>
    <p>ELAWFIRM TEAM</p>
</body>

</html>