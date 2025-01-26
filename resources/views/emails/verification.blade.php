<!DOCTYPE html>
<html>
<head>
    <title>Email Verification</title>
</head>
<body>
    <h1>Hello, {{ $user->name }}</h1>
    <p>Votre code de vérification est: <strong>{{ $verification_code }}</strong></p>
    <p>Veuillez entrez ce code dans l'application afin de vérifier votre email ou réinitialiser votre mot de passe.</p>
    <i  color='red'>Ce code n'est valide que pendant 5 minutes !</i>
</body>
</html>
