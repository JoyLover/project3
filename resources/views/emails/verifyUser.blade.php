<!DOCTYPE html>
<html>
<head>
    <title>From {{ $website }}: Please confirm your email</title>
</head>

<body>
    <p>Dear {{ $user->first_name }},</p>
    <br/>
    <p>Please confirm your email by clicking this link
        <a href="{{url('user/verify', $user->verifyUser->token)}}">Verify Email</a>.
        If this account is not registered by you, please ignore this email.
    </p>
    <br/>
    <p>Regards,
        <br>
        {{ $website }}
    </p>
</body>

</html>