<!DOCTYPE html>
<html>
<head>
    <title>Email d'Accès à l'API</title>
</head>
<body>
    <h3>Bonjour {{ $user->prenom }},</h3>

    <p>Votre demande d'accès à l'API a été approuvée. Vous trouverez ci-dessous vos identifiants pour accéder à notre API :</p>

    <p><strong>Email</strong> : {{ $user->email }}</p>
    <p><strong>Token d'API</strong> : {{ $user->api_token }}</p>

    <p>Pour toute assistance, n'hésitez pas à nous contacter.</p>

    <p>Merci,<br><br>
    L'équipe de Billetterie Événementielle</p>
</body>
</html>
