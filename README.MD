php -S localhost:8080 -t public/
# 🔐 TalentHub – Système d’Authentification MVC (Sans Framework)

## 📌 Description du projet

TalentHub est une plateforme de recrutement en cours de développement.  
Ce projet constitue le **socle technique d’authentification** de la plateforme.

L’objectif est de construire un **système d’authentification multi-rôles réutilisable**, basé sur une **architecture MVC en couches**, développé **sans framework**, en PHP natif.

Ce système servira de fondation pour les futures fonctionnalités :
- Offres d’emploi
- Candidatures
- Messagerie
- Back-office admin

---

## 🎯 Objectifs pédagogiques

- Implémenter une architecture MVC « fait maison »
- Séparer clairement :
  - Controllers (gestion des requêtes)
  - Services (logique métier)
  - Models / Repositories (accès aux données)
  - Views (affichage)
- Mettre en place une authentification sécurisée
- Gérer plusieurs rôles utilisateurs
- Protéger l’accès aux routes selon le rôle
- Comprendre les avantages du MVC face au code procédural

---

## 👥 Rôles du système

| Rôle       | Description |
|------------|-------------|
| Candidate  | S’inscrit, se connecte, accède à son dashboard |
| Recruiter | S’inscrit, se connecte, accède à son dashboard |
| Admin     | Se connecte uniquement, accède au back-office |

Chaque rôle possède :
- Ses propres routes
- Ses propres contrôleurs
- Ses propres vues protégées

---

## ⚙️ Fonctionnalités implémentées

### 🔐 Authentification
- Inscription (Candidate & Recruiter)
- Connexion (tous les rôles)
- Déconnexion
- Hashage des mots de passe (`password_hash`)
- Vérification des identifiants (`password_verify`)
- Gestion des sessions PHP

### 🔑 Gestion des rôles
- Attribution automatique du rôle
- Stockage du rôle en session
- Redirection après login selon le rôle

### 🚫 Protection des routes
- Routes publiques :
  - `/`
  - `/login`
  - `/register`
- Routes protégées :
  - `/candidate/dashboard`
  - `/recruiter/dashboard`
  - `/admin/dashboard`
- Vérification :
  - Utilisateur connecté
  - Rôle autorisé
- Page 403 en cas d’accès interdit

---

## 🧱 Architecture MVC

### 📂 Structure du projet

