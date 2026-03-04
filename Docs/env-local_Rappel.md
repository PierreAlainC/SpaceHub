# Rappel

## Elements et Roles

Nous avons dans le ```.env.local``` : 
```bash
DATABASE_URL="mysql://app:!ChangeMe!@127.0.0.1:3306/app?serverVersion=8&charset=utf8mb4"
```

|élément| rôle |
|------|--------|
| mysql:// | Type de base de données utilisé (ici MySQL) |
| app | Mot de passe de cet utilisateur MySQL |
| !ChangeMe! | serveur local |
| 127.0.0.1 | Adresse du serveur de base de données (localhost) |
| 3306 | Port utilisé par MySQL (port standard) |
| app | Nom de la base de données utilisée par le projet |
| serverVersion=8 | Version de MySQL utilisée (permet à Doctrine d’adapter ses requêtes) |
| charset=utf8mb4 | Encodage utilisé pour stocker correctement tous les caractères (y compris emojis et caractères Unicode) |