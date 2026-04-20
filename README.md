# 🚀 SpaceHub

Bienvenue sur **SpaceHub** 🌌
Un projet perso autour de l’espace, développé avec Symfony, avec un objectif simple : **rendre les données spatiales accessibles et sympa à explorer**.

---

## 🌍 Live Demo

👉 [Découvrir SpaceHub](https://spacehub.rf.gd)

---

## 🏷️ Tech & Status

![PHP](https://img.shields.io/badge/PHP-7.4-blue)
![Symfony](https://img.shields.io/badge/Symfony-5.4-black)
![Status](https://img.shields.io/badge/status-WIP-orange)
![Hosting](https://img.shields.io/badge/hosting-InfinityFree-lightgrey)

---

## 📸 Aperçu

### 🏠 Homepage

![Homepage](public/assets/images/readme/homepage.png)

### 🪐 Planètes (liste)

![Planets](public/assets/images/readme/planets.png)

### 🌍 Fiche planète

![Planet](public/assets/images/readme/planet.png)

### 📸 APOD (NASA)

![APOD](public/assets/images/readme/apod.png)

### 🛰️ ISS Tracking

![ISS](public/assets/images/readme/iss.png)

---

## 🌠 Le concept

SpaceHub regroupe plusieurs APIs publiques pour afficher :

* 🪐 **Les planètes** du système solaire (données physiques & orbitales)
* 📸 **La photo du jour (APOD)** de la NASA
* 🛰️ **La position de l’ISS** en temps réel
* 👨‍🚀 **Les astronautes actuellement dans l’espace**

👉 Le but : proposer une interface simple pour découvrir le cosmos sans se prendre la tête.

---

## 🧠 Stack technique

* PHP 7.4
* Symfony 5.4
* Doctrine ORM
* Twig
* MySQL / MariaDB
* Symfony HttpClient

---

## 🔌 APIs utilisées

* NASA (APOD)
* WhereTheISSAt (position ISS)
* Open Notify (astronautes)
* OpenStreetMap / Nominatim (géolocalisation)
* Le Système Solaire API (planètes)

---

## ⚙️ Installation

```bash
git clone https://github.com/PierreAlainC/SpaceHub.git
cd SpaceHub
composer install
```

### 🔑 Configuration

Créer un fichier `.env.local` :

```dotenv
DATABASE_URL="mysql://user:password@127.0.0.1:3306/spacehub"

NASA_API_KEY=your_api_key_here
```

---

### 🗄️ Base de données

```bash
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
```

---

### ▶️ Lancer le projet

```bash
symfony serve
```

ou bien

```bash
php -S 127.0.0.1:3306 -t public
```

---

## 🌐 Endpoints API

```text
GET /api/v1/apod
GET /api/v1/iss
GET /api/v1/planets
GET /api/v1/planets/{id}
```

---

## 🚀 Déploiement

Le projet est déployé sur **InfinityFree**.

👉 Quelques adaptations nécessaires :

* utilisation de `NativeHttpClient` (compatibilité serveur)
* gestion des limitations cURL / SSL
* fallback sur certaines APIs

---

## ⚠️ Limitations actuelles

Soyez indulgent 😄

* Certaines APIs (ISS, géolocalisation) peuvent être instables
* Temps de réponse dépendant des services externes
* Hébergement gratuit → limitations réseau / SSL

---

## 🔄 Améliorations prévues (V2)

* Mise en cache des appels API
* Carte interactive (Leaflet) pour l’ISS
* Traduction automatique (APOD)
* Amélioration UX/UI
* Gestion des favoris
* Optimisation performances
* Pages erreurs

---

## 📊 État du projet

* ✅ Planètes : OK
* ✅ APOD : OK ⚠️ mais réponse 500 fréquente liée aux serveurs API ⚠️
* ✅ ISS : fonctionnel ⚠️ mais réponses API pouvant être longues ⚠️
* 🔄 Projet en évolution

---

## 🙋‍♂️ Feedback

N’hésitez pas à :

* proposer des idées
* suggérer des améliorations
* partager vos retours 🙌

Je suis clairement en phase d’apprentissage et d’amélioration continue.

---

## 👨‍💻 Auteur

**Pierre-Alain Cypres**
Développeur Web (Symfony / Backend)

---

## 🌌 Conclusion

SpaceHub est un projet passion, en constante évolution 🚀

👉 Une V2 est clairement prévue !

Merci d’avoir pris le temps de jeter un œil 🙏
