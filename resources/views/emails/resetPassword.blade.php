<!DOCTYPE html>
<html>
<head>
    <title>From {{ $website }}: Reset password</title>
</head>

<body>
    <p>Dear {{ $user->first_name }},</p>
    <br/>
    <p>You can reset your password by clicking this link
        ******.
        Please ignore this email if it is not your operation.
    </p>
    <br/>
    <p>Regards,
        <br>
        {{ $website }}
    </p>
</body>

</html>