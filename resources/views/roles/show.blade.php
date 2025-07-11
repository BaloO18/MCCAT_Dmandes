<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du Rôle : {{ $role->nomRole }}</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; margin: 20px; background-color: #f4f7f6; color: #333; }
        .container { background-color: #ffffff; padding: 30px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); max-width: 600px; margin: auto; }
        h1 { color: #2c3e50; border-bottom: 2px solid #3498db; padding-bottom: 10px; margin-bottom: 20px; }
        p { margin-bottom: 10px; line-height: 1.6; }
        strong { color: #555; }
        a { display: inline-block; margin-top: 20px; padding: 10px 15px; background-color: #007bff; color: white; text-decoration: none; border-radius: 5px; transition: background-color 0.3s ease; }
        a:hover { background-color: #0056b3; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Détails du Rôle</h1>

        <p><strong>ID :</strong> {{ $role->id }}</p>
        <p><strong>Nom du Rôle :</strong> {{ $role->nomRole }}</p>
        <p><strong>Créé le :</strong> {{ $role->created_at->format('d/m/Y H:i') }}</p>
        <p><strong>Dernière mise à jour :</strong> {{ $role->updated_at->format('d/m/Y H:i') }}</p>

        <a href="{{ route('roles.index') }}">Retour à la liste des rôles</a>
    </div>
</body>
</html>