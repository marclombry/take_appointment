<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
</head>
<body>
<h2>Prise de rendez vous avec le service {{ $contact['service_name'] }}</h2>
<p>Votre rendez-vous :</p>
<ul>
    <li><strong>Prenom</strong> : {{ $contact['firstname'] }}</li>
    <li><strong>Nom</strong> : {{ $contact['lastname'] }}</li>
    <li><strong>Email</strong> : {{ $contact['email'] }}</li>
    <li><strong>Entreprise</strong> : {{ $contact['company'] }}</li>
    <li><strong>Téléphone</strong> : {{ $contact['tel'] }}</li>
    <li><strong>horaire</strong> : de {{ $contact['date_begin'] }} à {{ $contact['date_end'] }}</li>
</ul>
</body>
</html>
