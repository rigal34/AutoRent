Bonjour Bruno.


📁 Structure du Projet
AutoRent/
├── assets/                 # Fichiers CSS, JS, images pour le frontend
├── bin/
│   └── console             # L'exécutable de la console Symfony
├── config/                 # Fichiers de configuration de l'application
├── migrations/             # Fichiers de migration de la base de données (contient les versions générées)
├── public/                 # Racine web du projet, seul dossier accessible depuis un navigateur
│   └── index.php
│   └── images/             # Nouveau dossier pour les images uploadées (via VichUploader)
├── src/                    # Le cœur de ton code PHP
│   ├── Controller/
│   │   ├── Admin/
│   │   │   ├── DashboardController.php
│   │   │   ├── CategorieCrudController.php   # Nouveau : CRUD pour les catégories
│   │   │   └── VehiculeCrudController.php    # Nouveau : CRUD pour les véhicules
│   │   ├── HomeController.php
│   │   ├── RegistrationController.php
│   │   └── SecurityController.php
│   ├── DataFixtures/       # Nouveau dossier : Contient les classes de fixtures
│   │   ├── CategorieFixtures.php
│   │   ├── UserFixtures.php
│   │   ├── VehiculeFixtures.php
│   │   └── ReservationFixtures.php
│   ├── Entity/
│   │   ├── Categorie.php                     # Nouveau : Entité Catégorie
│   │   ├── Reservation.php                   # Nouveau : Entité Réservation
│   │   ├── User.php                          # Mis à jour : Ajout de nom, prénom, dateDeNaissance et relations
│   │   └── Vehicule.php                      # Nouveau : Entité Véhicule
│   ├── Form/
│   │   └── RegistrationFormType.php
│   ├── Repository/
│   │   ├── CategorieRepository.php           # Nouveau : Dépôt pour Catégorie
│   │   ├── ReservationRepository.php         # Nouveau : Dépôt pour Réservation
│   │   ├── UserRepository.php
│   │   └── VehiculeRepository.php            # Nouveau : Dépôt pour Véhicule
│   └── Security/
│       └── CustomAuthenticator.php
├── templates/              # Fichiers de vue (HTML et Twig)
│   ├── admin/
│   │   └── dashboard.html.twig
│   ├── home/
│   │   └── index.html.twig
│   ├── registration/
│   │   └── register.html.twig
│   └── security/
│       └── login.html.twig
└── .gitignore      

Démarrage et Fondations du Projet
Ce projet a été initialisé avec Symfony 6.4, en utilisant la structure --webapp pour inclure tous les outils nécessaires au développement d'une application web moderne.

La première étape a été de mettre en place les fondations techniques :

Création du projet et configuration de la base de données AutoRent.

Mise en place d'un HomeController de base pour servir la page d'accueil. Cela a permis de valider que l'application est fonctionnelle et accessible depuis un navigateur, agissant comme notre "chantier témoin" avant de construire des fonctionnalités plus complexes.

Mise en Place du Système d'Authentification
Le cœur de toute application nécessitant des comptes clients est la sécurité. Un système d'authentification complet a été mis en place en utilisant les outils du maker-bundle de Symfony :

Création de l'entité User (make:user) : C'est le plan de notre utilisateur, avec toutes les informations nécessaires (email, mot de passe haché, rôles).

Création du système de connexion (make:auth) : La porte d'entrée (/login) et de sortie (/logout) de notre application a été construite, avec la logique de sécurité associée.

Création du formulaire d'inscription (make:registration-form) : Un guichet (/register) a été ouvert pour permettre aux nouveaux visiteurs de créer leur compte de manière simple et sécurisée.

Installation du Back-Office avec EasyAdmin

Le DashboardController a été généré, posant les bases du futur back-office qui sera sécurisé pour les administrateurs.

🛠️ Modélisation de la Base de Données (Entités)
La structure de la base de données a été définie avec Doctrine ORM, en créant les entités suivantes et leurs relations, conformément au diagramme entité-relation du projet :

Categorie : Pour organiser les véhicules par type (Citadine, SUV, etc.).

Vehicule : Représente les véhicules disponibles à la location, avec leurs caractéristiques et une relation ManyToOne vers Categorie.

Reservation : Gère les locations, avec des relations ManyToOne vers User (l'utilisateur qui loue) et vers Vehicule (le véhicule loué).

🧪 Données de Test (Fixtures)
Pour faciliter le développement et les tests, des données fictives ont été générées et insérées dans la base de données à l'aide de DoctrineFixturesBundle et Faker :

CategorieFixtures.php : Insère les catégories de véhicules de base.

UserFixtures.php : Crée 10 utilisateurs de test aléatoires et un utilisateur administrateur fixe, avec des mots de passe hachés.

VehiculeFixtures.php : Insère des exemples de véhicules, liés aux catégories existantes.

ReservationFixtures.php : Génère des réservations de test, liant aléatoirement utilisateurs et véhicules.

⚙️ Back-Office (EasyAdmin)
Un panneau d'administration a été mis en place avec EasyAdminBundle pour permettre la gestion du contenu du site.

Configuration Générale du Dashboard
DashboardController.php : Point d'entrée principal du back-office (/admin), configuré pour afficher les liens vers la gestion des entités.

Gestion des Catégories
CategorieCrudController.php : Interface CRUD (Create, Read, Update, Delete) pour gérer les catégories de véhicules.

Gestion des Véhicules et des Images
VehiculeCrudController.php : Interface CRUD pour gérer les véhicules.

Organisation des Images : La gestion des images pour les véhicules a été spécifiquement mise en place pour permettre l'upload et l'affichage des images principales.

Un dossier public/images a été créé pour stocker physiquement les fichiers images téléchargés, le rendant accessible via les URL du site.

Le champ imagePrincipale dans le formulaire EasyAdmin est géré par EasyCorp\Bundle\EasyAdminBundle\Field\ImageField.

Ce champ est configuré pour :

->setUploadDir('public/images') : Indiquer le chemin physique sur le serveur où les images doivent être enregistrées après téléchargement.

->setBasePath('images/') : Définir l'URL de base à partir de laquelle les images doivent être affichées dans le navigateur (par exemple, http://ton_site/images/nom_image.jpg).

->setUploadedFileNamePattern('[randomhash].[extension]') : Assurer que chaque fichier téléchargé est renommé avec un identifiant unique (un hash aléatoire) pour éviter les conflits de noms et améliorer la sécurité.

Affichage Simplifié : Actuellement, le VehiculeCrudController est configuré pour n'afficher que le nom et l'image principale des véhicules, tant dans la liste que dans les formulaires de création et d'édition.

Note importante : En raison des contraintes de la base de données (champs comme tarifJournalier, motorisation, statut, categorie sont obligatoires), la création de nouveaux véhicules via ce formulaire simplifié entraînera une erreur de violation de contrainte si ces champs ne sont pas fournis. Pour une création fonctionnelle, il serait nécessaire d'afficher et de remplir tous les champs obligatoires dans le formulaire.