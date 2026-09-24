Incident d'hébergement InfinityFree (septembre 2026)
Symptômes

Le site affichait la page d'erreur générique d'InfinityFree (« Something Went Wrong! »), indiquant une erreur dans un fichier .htaccess, alors qu'aucun fichier n'avait été modifié.

Modifications apportées

public/.htaccess (fichier Symfony) : les deux directives Options ont été commentées.

```apache
# Options -MultiViews
# Options +SymLinksIfOwnerMatch
```

Le .htaccess racine, qui redirige vers public/, n'a pas été modifié.

Cause supposée

Une mise à jour des serveurs InfinityFree a restreint les directives autorisées dans les .htaccess. D'après un administrateur, Options All n'est plus accepté. En pratique, Options -MultiViews et Options +SymLinksIfOwnerMatch sont aussi refusés, tandis que Options -Indexes semble toujours passer.
