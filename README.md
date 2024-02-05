# HireMe - Plateforme d'Emploi

## Contexte du Projet

La société HireMe aspire à développer une plateforme d'emploi visant à faciliter la recherche d'opportunités d'embauche pour les chercheurs d'emploi tout en permettant aux entreprises de publier leurs offres. Ce projet sera réalisé en utilisant le framework Laravel.

## Fonctionnalités Requises

### Authentification et Autorisation

- Mettre en place un système d'authentification avec des rôles (Utilisateur standard (chercheur d'emploi), Entreprises et Administrateur).
- Utiliser des politiques et des gardes pour régir l'accès aux profils et aux fonctionnalités spécifiques en fonction du rôle de l'utilisateur.
- Les internautes peuvent s'inscrire en tant qu'utilisateur normal ou entreprise, et se connecter avec leurs identifiants uniques.
- Les utilisateurs peuvent récupérer leur mot de passe via l'option "Mot de passe oublié" ou rester connectés via l'option "Se souvenir de moi".

### Utilisateurs et Candidatures

- Un utilisateur possède un nom, une photo de profil, un titre, un poste actuel, une industrie, une adresse, des informations de contact, une section "À propos", et un curriculum vitae.
- Le curriculum vitae peut contenir plusieurs compétences, expériences professionnelles, cursus éducatifs, et langues maîtrisées.
- Un utilisateur a un profil complet comprenant un curriculum vitae détaillé.
- Un utilisateur peut télécharger son curriculum vitae au format PDF depuis son profil.
- Un utilisateur peut postuler à plusieurs offres d'emploi.

### Fonctionnalités Additionnelles

- Un utilisateur peut rechercher un emploi par titre, compétences, type de contrat, et emplacement.
- Un utilisateur peut rechercher des entreprises, consulter leurs offres, et s'abonner à leur newsletter pour recevoir les dernières offres (laravel-newsletter (spatie)).

### Entreprises et Gestion des Offres d'Emploi

- Une entreprise possède un nom, un logo (photo de profil), un slogan, une industrie, et une description.
- Une entreprise peut publier plusieurs offres d'emploi.
- Une entreprise peut consulter les candidatures reçues.
- Une offre d'emploi est caractérisée par son nom d'entreprise, un titre, une description, un ensemble de compétences requises, un nombre de visites (bonus), un type de contrat (enum: à distance, hybride, à temps plein), et un emplacement.

### Administration et Gestion des Utilisateurs

- Les administrateurs ont la possibilité de gérer les entreprises, les utilisateurs, et les offres d'emploi (soft delete).
- Les administrateurs ont la possibilité de visualiser les statistiques.

## Configuration du Projet

- Assurez-vous d'avoir PHP et Composer installés sur votre machine.
- Clonez ce dépôt.
- Exécutez `composer install` pour installer les dépendances.
- Dupliquez le fichier `.env.example` et renommez-le en `.env`, puis configurez les informations de la base de données et d'autres paramètres.
- Exécutez `php artisan key:generate` pour générer la clé d'application.
- Exécutez `php artisan migrate --seed` pour migrer la base de données et insérer des données de test.
- Lancez le serveur avec `php artisan serve`.

## Contribuer

Veuillez consulter le fichier CONTRIBUTING.md pour obtenir des informations sur la manière de contribuer à ce projet.

## Licence

Ce projet est sous licence MIT - voir le fichier LICENSE pour plus de détails.
