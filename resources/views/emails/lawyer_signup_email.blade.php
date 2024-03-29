<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>

<body>
    <p>Dear {{@$user->name}},</p>
    <p><b>Congratulations!</b> You are now part of the
        {{@$setting['site_name']}} teach. You can always login to {{@$setting['site_name']}}
        in order to access and to update the case status, case records of cases being handled by you as part of your
        work at
        {{@$setting['site_name']}}. You can also use our library of sample pleadings and template,
        access our case law library and view our frequently asked legal propositions.
    </p>
    <p>Your Email and Password are provided below:</p>
    <p><b>Email: <u>{{@$user->email}}</u></b></p>
    <p><b>Password: <u>{{@$password}}</u></b></p>
    <p>You can always change your password by logging in. <span style="color: red; font-weight: bold">Please do not
            share your login details with any one.</span> </p>
    <p>To proceed to Login page, please click the link below:</p>
    <a href="{{@$setting['site_url']}}/login" target="_blank">{{@$setting['site_url']}}/login</a>
    <p><b>Regards,</b></p>
    <p>ELAWFIRM TEAM</p>
</body>

</html>