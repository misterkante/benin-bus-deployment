# 🎫 BeninBus : Application de Vente de Tickets de Voyage

## 📌 Description
### Cette application mobile développée en Flutter permet aux utilisateurs d'acheter des tickets de voyage en ligne. Le backend est construit avec Laravel pour gérer les transactions, les utilisateurs, les réservations, les bus et les trajets.

## 🏗️ Technologies Utilisées
### Frontend (Application Mobile)
- Flutter
- Dart
- Dio (pour les requêtes HTTP)
- SharedPreferences
- kkiapay

### Backend (API REST)
- Laravel
- PostgreSQL
- Laravel Sanctum (pour l'authentification)
- smtp (pour l'envoi des emails)


## 🚀 Fonctionnalités
### Côté Utilisateur
- Connexion & Inscription avec vérification par code
- Réinitialisation de mot de passe avec vérification par code
- Recherche de trajets
- Réservation de trajet 
- Paiement en ligne sécurisé


### Côté Administrateur

- Gestion des points d'arrêts (villes de stationnement)
- Gestion des voyages 
- Gestion des bus
- Statistiques 

## 🔧 Installation & Configuration

```sh
flutter pub get
flutter run
```

## 📜 Mode d'utilisation

### Inscription 
1.- Formulaire de réservation
2.- Réception de code de vérification par mail
3.- Envoi du token dans le formulaire

### A propos  



## Licence
Ce projet est sous licence MIT.



