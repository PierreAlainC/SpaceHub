# 📄 Installation SpaceHub — Commandes

## 1. Installer la Symfony CLI

```bash
curl -sS https://get.symfony.com/cli/installer | bash
````

→ Installe l’outil `symfony` pour créer/lancer des projets Symfony.

---

## 2. Ajouter la CLI au PATH

```bash
echo 'export PATH="$HOME/.symfony5/bin:$PATH"' >> ~/.bashrc
source ~/.bashrc
symfony -v
```

→ Permet d’utiliser la commande `symfony` partout dans le terminal.

---

## 3. Créer le projet Symfony 5.4

```bash
symfony new SpaceHub --version=5.4
cd SpaceHub
```

→ Crée un projet Symfony minimal compatible PHP 7.4.

---

## 4. Installer les composants Symfony essentiels

```bash
composer require \
  symfony/twig-bundle \
  symfony/orm-pack:"^1.0" \
  symfony/security-bundle \
  symfony/validator \
  symfony/http-client \
  symfony/serializer \
  symfony/monolog-bundle \
  symfony/mailer
```

### Rôle rapide de chaque composant :

* **symfony/twig-bundle** → Affichage des pages HTML (templating).
* **symfony/orm-pack** → Gestion base de données (Doctrine ORM + migrations).
* **symfony/security-bundle** → Login, rôles, sécurité.
* **symfony/validator** → Validation des données (formes, entités, API).
* **symfony/http-client** → Appels aux APIs externes (NASA, ISS).
* **symfony/serializer** → Sérialisation JSON pour l’API interne.
* **symfony/monolog-bundle** → Logs (erreurs, appels API, debug).
* **symfony/mailer** → Envoi d’emails (optionnel).

---

## 5. Choix lors de l’installation de Mailer

```
Do you want to include Docker configuration?
Réponse : n
```

→ On évite l’ajout automatique de fichiers Docker.

---

> ## 📝 **Note : choix de Symfony 5.4**  
>
> J’ai choisi d’utiliser **Symfony 5.4 (LTS)**, car on travaille sur un environnement équipé de **PHP 7.4**, et les versions plus récentes de Symfony (6.3+ et 7.x) nécessitent **PHP 8.1 / 8.2** ou plus.  
>  
> Symfony 5.4 est encore une version stable, officielle et parfaitement adaptée pour ce projet SpaceHub.  
>  
> En restant sur Symfony 5.4, on garde une installation simple, cohérente et 100% compatible avec la machine actuelle.

---

## 6. Installation des outils de développement

### 6.1. Installation du Profiler Symfony

```bash
composer require --dev symfony/profiler-pack
```

→ On installe la barre de debug Symfony (profilage des requêtes, logs, erreurs).

### 6.2. Installation du MakerBundle

```bash
composer require --dev symfony/maker-bundle
```

→ J’installe l’outil pour générer rapidement du code (entités, contrôleurs, formulaires…).

### 6.3. Installation des Fixtures

Commande initiale (en erreur) :

```bash
composer require --dev doctrine/doctrine-fixtures-bundle
```

→ Conflit de versions (fixtures 3.7.x nécessitent Doctrine DBAL 3, mais on utilise DBAL 2.13).

Commande corrigée :

```bash
composer require --dev "doctrine/doctrine-fixtures-bundle:^3.4"
```

→ On installe une version compatible avec Symfony 5.4 + PHP 7.4.
→ Les fixtures serviront à remplir la base de données avec des données de test.

### 6.4. Installation de PHPUnit

```bash
composer require --dev phpunit/phpunit
```

→ J’installe PHPUnit pour pouvoir écrire et exécuter des tests unitaires et fonctionnels.

### 6.5. Installation de Faker

```bash
composer require --dev fakerphp/faker
```

→ On ajoute Faker pour générer facilement de fausses données (très utile pour les fixtures).

---

>## 📝 Note
>
>On installe tous ces outils en mode --dev car ils servent uniquement pendant le développement (tests, génération de code, données de démo, debug).

---

## 7. Mise en place du dépôt GitHub

### 7.1. Initialisation Git

```bash
git init
git add .
git commit -m "commit initial - Setup projet SpaceHub Symfony 5.4"
```

→ J’initialise Git et je crée le premier commit du projet.

### 7.2. Création du dépôt GitHub

→ Je crée un dépôt vide sur GitHub nommé SpaceHub (sans README).

### .3. Lier le dépôt local au dépôt GitHub

```bash
git branch -M main
git remote add origin https://github.com/PierreAlainC/SpaceHub.git
git push -u origin main
```

→ On envoie le projet Symfony sur GitHub.

### 7.4. Mise à jour du .gitignore

→ Symfony fournit déjà un ```.gitignore```, je vérifie qu’il inclut bien :
```vendor/```, ```var/```, ```.env.local```, etc.