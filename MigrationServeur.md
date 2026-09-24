Incident d'hébergement InfinityFree (septembre 2026)
Symptômes

Le site affichait la page d'erreur générique d'InfinityFree (« Something Went Wrong! »), indiquant une erreur dans un fichier .htaccess, alors qu'aucun fichier n'avait été modifié.

Modifications apportées

.htaccess racine : suppression des directives php_value, non supportées par l'hébergeur, et simplification de la redirection HTTPS.

apache
DirectoryIndex index.php

```apache
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteBase /

    RewriteCond %{HTTPS} !=on
    RewriteCond %{HTTP:X-Forwarded-Proto} !=https
    RewriteRule ^ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]

    RewriteCond %{REQUEST_URI} !^/public/
    RewriteRule ^(.*)$ public/$1 [L]
</IfModule>
```

public/.htaccess (fichier Symfony) : les deux directives Options ont été commentées.

```apache
# Options -MultiViews
# Options +SymLinksIfOwnerMatch
Cause supposée
```


Une mise à jour des serveurs InfinityFree a restreint les directives autorisées dans les .htaccess. D'après un administrateur, Options All n'est plus accepté. En pratique, Options -MultiViews et Options +SymLinksIfOwnerMatch sont aussi refusés, tandis que Options -Indexes semble toujours passer.
