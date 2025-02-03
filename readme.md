# 🎫 BeninBus : Application de Vente de Tickets de Voyage

## 📌 Description
Cette application mobile développée en Flutter permet aux utilisateurs d'acheter des tickets de voyage en ligne. Le backend est construit avec Laravel pour gérer les transactions, les utilisateurs, les réservations, les bus et les trajets.

## 🏗️ Technologies Utilisées
### Frontend (Application Mobile)
- Flutter
- Dart
- Dio (pour les requêtes HTTP)
- SharedPreferences

### Backend (API REST)
- Laravel
- PostgreSQL
- Laravel Sanctum (pour l'authentification)
- smtp (pour l'envoi des emails)

## 📂 Structure du Projet
```
root/ # Projet Flutter
│   ├── lib/
│   ├── pubspec.yaml
│   ├── android/
│   ├── ios/
```

## 🚀 Fonctionnalités
### Côté Utilisateur
- Connexion & Inscription avec vérification par code
- Réinitialisation de mot de passe avec vérification par code
- 
- Recherche de trajets et sélection des tickets
- Paiement en ligne sécurisé
- Affichage de l'historique des réservations

### Côté Administrateur

- Gestion des points d'arrêts (villes de stationnement)
- Gestion des voyages 
- Gestion des bus

- Suivi des réservations et paiements
- Gestion des utilisateurs

## 🔧 Installation & Configuration

```sh
flutter pub get
flutter run
```

## 📧 Vérification par Email
- Un code de 6 chiffres est généré et envoyé par email lors de l'inscription.
- Ce code expire après 5 minutes.
- L'utilisateur doit entrer ce code pour activer son compte.

## 📌 API Endpoints (Exemples)
### BaseUrl : 
### Authentification
- `POST /api/register` : Inscription
- `POST /api/login` : Connexion
- `POST /api/verify-email` : Vérification de l'email par code

### Gestion des Voyages
- `GET /api/voyages` : Liste des voyages
- `POST /api/reservations` : Réserver un ticket
- `GET /api/reservations/{id}` : Détails d'une réservation

## 📜 Licence
Ce projet est sous licence MIT.



