<!DOCTYPE html>
<html>

<head>
    <title>AchieveIO</title>
</head>

<body>
    <h3>Hello, {{ $data['fullname'] }}</h3>
    <p>Thank you for registering to AchieveIO. To avoid fake accounts, please verify your account by clicking the link below.</p>
    <a href="{{ $data['link'] }}">Verify Account</a>
</body>

</html>
