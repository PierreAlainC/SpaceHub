# SpaceHub

SpaceHub a pour objectif de partager mon intéret pour l'Espace! Il permettra de regrouper plusieurs données en utilisant des APIs publiques.  
Le site permettra d’afficher des informations comme la photo du jour (NASA), la position de l’ISS ou des données sur les planètes et tout ça vraiment dans le but de faire découvrir simplement ce fascinant cosmos!  
Le projet repose sur Symfony 5.4.

## Objectif du projet

- Centraliser plusieurs APIs externes dans une seule interface.  
- Construire une API interne simple (JSON) pour exposer les données récupérées.  
- Mettre en place une base technique claire pour la suite du développement.  
- Utiliser une architecture organisée : contrôleurs courts, services dédiés, logs.
- PARTAGER!

## Installation

### Cloner le dépôt :

```bash
git clone https://github.com/<username>/SpaceHub.git
cd SpaceHub
```

### Installer les dépendances :

```bash
composer install
```

### Configurer la base de donnée dans .env.local :

```bash
DATABASE_URL="mysql://user:password@127.0.0.1:3306/spacehub"
```

### Créer la base de donnée et appliquer les migrations :

```bash
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
```

### Lancer le serveur Symfony :

```bash
symfony serve
```

### Endpoints prévus

>

### Les routes suivantes seront ajoutées pendant le développement :

```GET /api/v1/apod``` : photo du jour (NASA)

```GET /api/v1/iss``` : position actuelle de l’ISS

```GET /api/v1/planets``` : liste des planètes

```GET /api/v1/planets/{id}``` : détails d’une planète

```POST /api/v1/favorites``` : ajout d’un favori

```GET /api/v1/favorites``` : liste des favoris

### État actuel

>Installation Symfony terminée
>
>Composants principaux ajoutés
>
>Outils de développement installés
>
>Documentation technique en cours

Le README sera complété au fur et à mesure de l’avancée du projet.