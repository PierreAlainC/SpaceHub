# Ajout Image

Pour SpaceHub, je ferais :

un champ `image` ou `imagePath` nullable dans `Planet`

des images locales dans `public/images/planets/`

Exemple en BDD :

```bash
/images/planets/saturn.jpg
```

Puis dans Twig :

```twig
<img src="{{ asset(images/planets/ ~ planet.slug ~ '.jpg) }}" alt="Illustration de {{ planet.name }}">
```
