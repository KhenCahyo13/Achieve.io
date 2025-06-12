<!DOCTYPE html>
<html>

<head>
    <title>AchieveIO</title>
</head>

<body>
    <h3>Hello, {{ $data['fullname'] }}</h3>
    <p>We received a request to reset your account password. If you did not make this request, please ignore this email. But, if you did, you can reset your password by clicking the link below.</p>
    <a href="{{ $data['link'] }}">Reset Password</a>
</body>

</html>
