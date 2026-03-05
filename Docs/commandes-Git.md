# Git – Rappel des commandes principales

---
---

## 1. Commandes principales

### Initialiser un dépôt

```bash
git init
```

---

### Voir l’état du dépôt

```bash
git status
```

---

### Voir les branches

```bash
git branch
```

---

### Créer une branche

```bash
git branch nom-de-branche
```

---

### Changer de branche

```bash
git checkout nom-de-branche
```

---

### Créer et basculer sur une branche

---

```bash
git checkout -b nom-de-branche
```

---

### Ajouter des fichiers au commit

```bash
git add fichier
```

---


### Ajouter tous les fichiers :

```bash
git add .
```

---

### Créer un commit

```bash
git commit -m "message du commit"
```

---

### Voir l’historique des commits

```bash
git log
```

---

### Ajouter un dépôt distant

```bash
git remote add origin URL_DU_DEPOT
```

---

### Envoyer les modifications vers GitHub

```bash
git push origin nom-de-branche
```

---

### Récupérer les modifications du dépôt distant

```bash
git pull origin nom-de-branche
```

---

### Fusionner une branche

```bash
git merge nom-de-branche
```

---

### Supprimer une branche locale

```bash
git branch -d nom-de-branche
```

---
---

## 2. Exemples d’utilisation

### Ajouter et enregistrer des modifications

```bash
git add .
git commit -m "Add Planet entity"
```

---

### Enregistrer les changements dans le dépôt.

### Envoyer une branche sur GitHub

```bash
git push origin feature-planet
```

Publie la branche sur le dépôt distant.

---

### Fusionner une branche dans la branche principale

> Pour une branche locale ```feature-planet```

Se placer sur la branche principale :

```bash
git checkout main
```

Fusionner la branche :

```bash
git merge feature-planet
```

Envoyer la mise à jour :

```bash
git push origin main
```

Supprimer une branche après fusion

```bash
git branch -d feature-planet
```

Supprime la branche locale une fois le travail intégré.

---

### Mettre à jour une branche existante avec main

#### En utilisant ```merge```

> On peut fusionner main dans la branche.

Se placer sur ta branche :

```bash
git checkout ma-branche
```

Récupérer les dernières modifications du dépôt distant :

```bash
git pull origin main
```

>ou la méthode plus explicite :
>
>```bash
>git checkout ma-branche
>git merge main
>```

Cela intègre les changements de main dans la branche.

#### En utilisant ```rebase``` 

> Utile pour garder un historique plus propre.

```bash
git checkout ma-branche
git rebase main
```

Cela rejoue les commits par-dessus main

---

### Obtenir la version de PHP

```bash
php -v
```

---

### Obtenir la version de symfony

```bash
php bin/console --version
```

---

### Obtenir la version de MariaDB

```bash
mysql -V
```

---

### Vider le cache

```bash
php bin/console cache:clear
```

---

### Validation BDD

```bash
php bin/console doctrine:schema:validate
```

---
