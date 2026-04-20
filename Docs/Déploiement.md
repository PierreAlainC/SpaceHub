# Commandes déploiement

## Optimisation prod

Une fois l'environnement passé en `prod`, ne pas oublier d'optimiser le vendor 

```bash
composer install --no-dev --optimize-autoloader
```

Ajouter si besoin `APP_DEBUG=0` ou `APP_DEBUG=1` pour afficher ou non les erreurs symfony

## Cache

Vider le cache pour passer en prod 

```bash
php bin/console cache:clear --env=prod
```

## Repasser en dev

```bash
composer install
```

```bash
php bin/console cache:clear
```

Bien s'assurer que index.php soit le bon également.