


AutoRent/
├── assets/
│   ├── styles/
│   │   ├── app.css
│   │   ├── scroll-animations.css        #  - Effets scroll snap
│   │   ├── card-effects.css             #  - Animations cards hover
│   │   └── transitions.css              #  - Transitions texte/éléments
│   └── scripts/
│       ├── app.js
│       ├── scroll-snap.js               #  - Gestion scroll snap
│       ├── intersection-observer.js     #  - Animations au scroll
│       └── navbar-effects.js            #  - Navbar fixe dynamique
├── bin/
│   └── console
├── config/
│   ├── packages/
│   │   ├── mailer.yaml                  #  - Config email
│   │   ├── twig.yaml
│   │   └── turbo.yaml                   #  - Config navigation SPA
│   ├── routes/
│   │   ├── routes.yaml                  # Routes principales
│   │   ├── actualite_routes.yaml        #  - Routes actualités
│   │   └── admin_routes.yaml            #  - Routes admin
│   └── services.yaml
├── migrations/
│   ├── Version20250125000001.php        # Structure initiale
│   ├── Version20250126000002.php        # Entités User/Vehicule
│   ├── Version20250127000003.php        # Système réservation
│   └── Version20250128000004.php        #  - Entité Actualite
├── public/
|   |   |_________css/
|   |              |____navbar.css
|   |              |____responsive.css
│   ├── build/                            #  ASSETS COMPILÉS WEBPACK
│   │   ├
│   │   ├
│   │   ├── scroll-effects.css           #  - Effets scroll
│   │   ├── animations.js                #  - Animations
│   │   ├── vendors.js                   #  Librairies externes
│   │   └── runtime.js                   #  Runtime Webpack
│   ├── actualites-css/                  #  STYLES PAGE ACTUALITÉS
│   │   └── scroll-effects.css           #    - Animations scroll
│   ├── actualites-js/                   #  SCRIPTS PAGE ACTUALITÉS
│   │   └── scroll-effects.js            #  FONCTIONNEL - Observer animations
│   ├── css/   
|   |__ home-css                        #  STYLES PERSONNALISÉS
│   │   ├── vehicules-list.css           #  Styles modernes page véhicules
│   │   ├── home-css
│   │   ├── navbar-fixed.css             #  - Navbar fixe responsive
│   │   ├── card-hover-effects.css       #  - Effets hover avancés
│   │   └── transitions-global.css       #  - Transitions réutilisables
│   ├── js/                              #  SCRIPTS PERSONNALISÉS
│   │   ├── home-js               #  - Gestion scroll accueil
         

│   │   ├── card-hover.js                #  - Effets hover cards
│   │   ├── text-animations.js           #  - Animations texte
│   │   ├── navbar-scroll.js             #  - Navbar réactive scroll
│   │   ├
│   │   └── smooth-transitions.js        #  - Transitions pages
│   ├── images/
│   │   ├── vehicules/                   # Images véhicules
│   │   │   ├── thumbnails/              #  - Miniatures optimisées
│   │   │   └── full/                    #  - Images haute résolution
│   │   ├── actualites/                  #  - Images actualités
│   │   │   ├── featured/               # Images à la une
│   │   │   └── gallery/                # Galerie images
│   │   ├── backgrounds/                 #  - Images de fond
│   │   ├── icons/                       #  - Icônes SVG
│   │   ├── logos/                       #  - Logos marques
│   │   └── ui/                          #  - Éléments interface
│   ├── uploads/                         #  - Uploads utilisateur
│   │   ├── actualites/                  # Images actualités uploadées
│   │   └── vehicules/                   # Images véhicules uploadées
│   └── index.php
├── src/
│   ├── Controller/
│   │   ├── Admin/                       #  ADMINISTRATION
│   │   │   ├── DashboardController.php  # - Tableau de bord
│   │   │   ├── ReservationCrudController.php
│   │   │   ├── ActualiteAdminController.php # - Backend actualités
│   │   │   ├── VehiculeAdminController.php #  - Gestion véhicules
│   │   │   └── UserAdminController.php     #  - Gestion utilisateurs
│   │   ├                         
│   │   │   ├── VehiculeController.php   # - véhicules
│   │   │   ├── ActualiteController.php  # - actualités
│   │   │   └── ReservationController.php # - réservations
│   │   ├── ActualiteController.php      #  - Contrôleur front actualités
│   │   ├── CategorieController.php
│   │   ├── ContactController.php
│   │   ├── HomeController.php           #  - Scroll snap data + stats
│   │   ├── RegistrationController.php
│   │   ├── ReservationController.php    #  - Notifications email
│   │   ├── SecurityController.php
│   │   ├── VehiculeController.php       #  - Méthode list() recherche
│   │   └── SearchController.php         #  - Recherche globale
│   ├── DataFixtures/                    #   DONNÉES DE TEST
│   │   ├── UserFixtures.php
│   │   ├── CategorieFixtures.php
│   │   ├── VehiculeFixtures.php
│   │   ├── ActualiteFixtures.php        #  - Données test actualités
│   │   └── ReservationFixtures.php      #  - Réservations test
│   ├── Entity/
│   │   ├── Actualite.php                #  - Entité actualités
│   │   ├── Categorie.php
│   │   ├── Reservation.php              #  - Propriétés complètes
│   │   ├── User.php                     #  - UserIdentifier email
│   │   ├── Vehicule.php                 #  - getProchaineDateDisponible()
│   │   └── Media.php                    #  - Gestion médias/images
│   ├── Form/
│   │   ├── ActualiteFormType.php        #  NOUVEAU - Formulaire actualités
│   │   ├── ContactFormType.php
│   │   ├── RegistrationFormType.php
│   │   ├── ReservationFormType.php      #  - Validation dates
│   │   ├── VehiculeSearchType.php       #  - Formulaire recherche
│   │   └── MediaUploadType.php          #  - Upload médias
│   ├── Repository/
│   │   ├── ActualiteRepository.php      #  - Requêtes actualités
│   │   ├── CategorieRepository.php
│   │   ├── ReservationRepository.php    #  - Méthodes disponibilité
│   │   ├── UserRepository.php
│   │   ├── VehiculeRepository.php       #  - findByFilters()
│   │   └── MediaRepository.php          #  - Requêtes médias
│   ├── Security/
│   │   ├── CustomAuthenticator.php
│   │   
│   │      
│   │      
│   ├── Service/                         #  - SERVICES
│   │   ├── NotificationService.php      #  - Service email
│   │   ├── ScrollAnimationService.php   #  - Gestion animations scroll
│   │   ├── ActualiteService.php         #  - Service actualités
│   │   ├── FileUploadService.php        #  - Upload fichiers
│   │   ├── ImageProcessingService.php   #  - Traitement images
│   │   ├── StatisticsService.php        #  - Calcul statistiques
│   │   └── SearchService.php            #  - Recherche avancée
│   ├── EventListener/                   #  - LISTENERS
│   │   ├── ScrollEffectListener.php     #  - Listener effets scroll
│   │   ├── ExceptionListener.php        #  - Gestion erreurs
│   │   └── SecurityListener.php         #  - Événements sécurité 
│   ├── Command/                         #  - COMMANDES CLI
│   │   ├── GenerateReportCommand.php    #  - Génération rapports
│   │   └── CleanupFilesCommand.php      #  - Nettoyage fichiers
│   └── Twig/                            #  - EXTENSIONS TWIG
│       ├── ScrollExtension.php          #  - Fonctions scroll
│       └── DateExtension.php            #  - Formatage dates
├── templates/
│   ├── base.html.twig                   # Layout principal + navbar fixe
│   ├── partials/                        #  COMPOSANTS RÉUTILISABLES
│   │   ├── navbar.html.twig             #  - Navbar fixe avec scroll
│   │   ├── footer.html.twig
│   │   ├── scroll-animations.html.twig  #  - Scripts animations
│   │   ├── card-effects.html.twig       #  - Effets cards réutilisables
│   │   ├── loading-spinner.html.twig    #  - Indicateur chargement
│   │   └── breadcrumbs.html.twig        #  - Fil d'Ariane
│   ├── emails/                          #  - EMAILS
│   │   ├── layout.html.twig             #  Layout emails
│   │   ├── admin_notification.html.twig #  Email admin
│   │   ├── user_confirmation.html.twig  #  Email client
│   │   └── reminder.html.twig           #  Email rappel
│   ├── errors/                          #  - PAGES ERREUR
│   │   ├── 404.html.twig               # Page 404 personnalisée
│   │   └── 500.html.twig               # Page 500 personnalisée
│   ├── home/
│   │   └── index.html.twig              #  - Scroll snap + animations
│   ├── actualite/                       #  - ACTUALITÉS
│   │   ├── index.html.twig              #  - Page actualités
│   │   ├── show.html.twig               #  - Détail actualité
│   │   └── category.html.twig           #  - Actualités par catégorie
│   ├── admin/                           #  ADMINISTRATION
│   │   ├── layout.html.twig             #  Layout admin
│   │   ├── dashboard.html.twig          #  Tableau de bord
│   │   ├── actualite/                   
│   │   │   ├── index.html.twig          #  - Liste admin actualités
│   │   │   ├── edit.html.twig           #  - Édition actualité
│   │   │   ├── new.html.twig            #  - Création actualité
│   │   │   └── show.html.twig           #  - Détail admin
│   │   ├── vehicule/                    #  - Gestion véhicules
│   │   │   ├── index.html.twig
│   │   │   ├── edit.html.twig
│   │   │   └── new.html.twig
│   │   └── reservation/                 # - Gestion réservations
│   │       ├── index.html.twig
│   │       └── edit.html.twig
│   ├── categorie/
│   │   └── show.html.twig               # - Cards avec effets shadow
│   ├── vehicule/
│   │   ├── index.html.twig              # Liste véhicules
│   │   ├── show.html.twig               # - Date disponibilité
│   │   └── list.html.twig               # - Recherche + résultats
│   ├── reservation/
│   │   ├── index.html.twig              # - Formulaire réservation
│   │   ├── confirmation.html.twig       #   Page confirmation
│   │   └── history.html.twig            # - Historique utilisateur
│   ├── components/                      # - COMPOSANTS TWIG
│   │   ├── card-vehicle.html.twig       # - Card véhicule avec effets
│   │   ├── scroll-section.html.twig     # - Section avec scroll snap
│   │   ├── text-animation.html.twig     # - Texte avec animation
│   │   ├── pagination.html.twig         # - Pagination personnalisée
│   │   └── search-filters.html.twig     # - Filtres de recherche
│   ├── security/
│   │   ├── login.html.twig
│   │   └── forgot_password.html.twig    # - Mot de passe oublié
│   ├── registration/
│   │   └── register.html.twig
│   ├── profile/                         # - PROFIL UTILISATEUR
│   │   ├── show.html.twig              # Profil utilisateur
│   │   └── edit.html.twig              # Édition profil
│   └── contact/
│       └── index.html.twig
├── tests/                               # SUITE DE TESTS COMPLÈTE
│   ├── Functional/                      # TESTS FONCTIONNELS
│   │   ├── VehiculeControllerTest.php   # Tests end-to-end
│   │   ├── ReservationFlowTest.php      # Test complet réservation
│   │   ├── ActualiteControllerTest.php  # - Tests actualités
│   │   ├── ScrollEffectsTest.php        # - Tests animations
│   │   ├── AdminWorkflowTest.php        # - Tests administration
│   │   └── UserJourneyTest.php          # - Parcours utilisateur
│   ├── Unit/                            # TESTS UNITAIRES
│   │   ├── Controller/
│   │   │   ├── CategorieControllerTest.php
│   │   │   ├── ContactControllerTest.php
│   │   │   ├── HomeControllerTest.php       # - Tests scroll snap
│   │   │   ├── RegistrationControllerTest.php
│   │   │   ├── ReservationControllerTest.php
│   │   │   ├── SecurityControllerTest.php
│   │   │   └── VehiculeControllerTest.php
│   │   ├── Service/
│   │   │   ├── NotificationServiceTest.php  # Test service email
│   │   │   ├── ActualiteServiceTest.php     # - Tests service actualités
│   │   │   ├── ScrollAnimationTest.php      # - Tests animations
│   │   │   ├── FileUploadServiceTest.php    # - Tests upload
│   │   │   └── StatisticsServiceTest.php    # - Tests statistiques
│   │   ├── Entity/
│   │   │   ├── ActualiteTest.php           # Tests entité actualité
│   │   │   ├── UserTest.php
│   │   │   ├── VehiculeTest.php
│   │   │   └── ReservationTest.php
│   │   └── Repository/
│   │       ├── ActualiteRepositoryTest.php # Tests requêtes
│   │       └── VehiculeRepositoryTest.php
│   ├── Integration/                     # - TESTS INTÉGRATION
│   │   ├── DatabaseTest.php            # Tests base de données
│   │   └── ApiTest.php                 # Tests API
│   └── fixtures/                       # - DONNÉES TEST
│       ├── images/                     # Images test
│       └── data/                       # Données JSON test
├── translations/                     
│   ├── messages.fr.yaml                 # - Traductions françaises
│   ├── validators.fr.yaml               # - Messages validation
│   ├── admin.fr.yaml                    # - Interface admin
│   └── emails.fr.yaml                   # - Emails français
├── vendor/                             # DÉPENDANCES COMPOSER
├── docs/                               # - DOCUMENTATION
│  
├── .env                                # VARIABLES ENVIRONNEMENT
├── .env.local          test            # ENVIRONNEMENT TEST
├── .gitignore                          # Git ignore rules
├── webpack.config.js                   # BUILD ASSETS
├── phpunit.xml.dist                    # CONFIGURATION TESTS
├── phpcs.xml                           # - Code style PHP
├── Makefile                            # - Commandes make
└── README.md                           # DOCUMENTATION PROJET

 STATISTIQUES FINALES DU PROJET :
├──  8 NOUVEAUX STYLES CSS
├──  7 NOUVEAUX Scripts JS
├──  Système actualités complet avec animations
├──  Effets scroll snap implémentés
├──  Animations cards/texte avancées
├──  Navbar fixe responsive
├──  Interface admin complète
├──  Système notifications email
├──  Interface multilingue
├──  Design responsive complet



Démarrage et Fondations du Projet
Ce projet a été initialisé avec Symfony 6.4, en utilisant la structure --webapp pour inclure tous les outils nécessaires au développement d'une application web moderne.

La première étape a été de mettre en place les fondations techniques :

Création du projet et configuration de la base de données AutoRent.

Mise en place d'un HomeController de base pour servir la page d'accueil. Cela a permis de valider que l'application est fonctionnelle et accessible depuis un navigateur, agissant comme notre "chantier témoin" avant de construire des fonctionnalités plus complexes.

Mise en Place du Système d'Authentification
Le cœur de toute application nécessitant des c                # CONFIG LOCALE (non versionné)
├── .env.omptes clients est la sécurité. Un système d'authentification complet a été mis en place en utilisant les outils du maker-bundle de Symfony :

Création de l'entité User (make:user) : C'est le plan de notre utilisateur, avec toutes les informations nécessaires (email, mot de passe haché, rôles).

Création du système de connexion (make:auth) : La porte d'entrée (/login) et de sortie (/logout) de notre application a été construite, avec la logique de sécurité associée.

Création du formulaire d'inscription (make:registration-form) : Un guichet (/register) a été ouvert pour permettre aux nouveaux visiteurs de créer leur compte de manière simple et sécurisée.

Installation du Back-Office avec EasyAdmin

Le DashboardController a été généré, posant les bases du futur back-office qui sera sécurisé pour les administrateurs.

 Modélisation de la Base de Données (Entités)
La structure de la base de données a été définie avec Doctrine ORM, en créant les entités suivantes et leurs relations, conformément au diagramme entité-relation du projet :

Categorie : Pour organiser les véhicules par type (Citadine, SUV, etc.).

Vehicule : Représente les véhicules disponibles à la location, avec leurs caractéristiques et une relation ManyToOne vers Categorie.

Reservation : Gère les locations, avec des relations ManyToOne vers User (l'utilisateur qui loue) et vers Vehicule (le véhicule loué).

 Données de Test (Fixtures)
Pour faciliter le développement et les tests, des données fictives ont été générées et insérées dans la base de données à l'aide de DoctrineFixturesBundle et Faker :

CategorieFixtures.php : Insère les catégories de véhicules de base.

UserFixtures.php : Crée 10 utilisateurs de test aléatoires et un utilisateur administrateur fixe, avec des mots de passe hachés.

VehiculeFixtures.php : Insère des exemples de véhicules, liés aux catégories existantes.

ReservationFixtures.php : Génère des réservations de test, liant aléatoirement utilisateurs et véhicules.

 Back-Office (EasyAdmin)
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

Gestion Avancée des Véhicules (src/Entity/Vehicule.php & src/Controller/Admin/VehiculeCrudController.php) :

La propriété statut a été implémentée sous forme de booléen, permettant de gérer de manière simple et efficace la disponibilité ou l'état d'un véhicule.

La capacité d'associer plusieurs images à un même véhicule a été ajoutée. La propriété images dans l'entité Vehicule est désormais un tableau (array) stockant les noms de fichiers, géré via un champ d'upload multiple dans EasyAdmin.

La relation entre Vehicule et Categorie a été mise à jour de ManyToOne vers une relation ManyToMany, offrant la flexibilité à un véhicule d'appartenir à plusieurs catégories simultanément (ex: "Citadine" et "Électrique"). Cette complexité est gérée par une table de liaison en base de données.

Module de Gestion des Actualités (src/Entity/Actualite.php & src/Controller/Admin/ActualiteCrudController.php) :

Une nouvelle entité Actualite a été créée, avec ses propriétés (titre, contenu, datePublication, image), et son Repository (ActualiteRepository.php).

La gestion complète des actualités (création, lecture, modification, suppression) a été intégrée au back-office via un ActualiteCrudController dans EasyAdmin, permettant à l'administrateur de gérer ce contenu de manière autonome, sans nécessiter de vues HTML spécifiques côté front-office pour l'instant.

Mises à jour de la Base de Données (migrations/) :

Toutes ces modifications sur les entités ont été appliquées à la base de données via des scripts de migration (migrations/VersionXXXXXXXXXXXXXX.php), assurant une parfaite synchronisation entre le modèle de données PHP et la structure de la base de données.

Cette architecture évolutive permet à AutoRent d'offrir des fonctionnalités robustes et une gestion simplifiée via le tableau de bord EasyAdmin, tout en étant prête pour de futures extensions (comme l'affichage des actualités sur le front-office ou une gestion plus complexe des images).
Ce projet a été développé avec Symfony 6.4 et utilise AssetMapper pour la gestion des assets front-end. Le design est basé sur le framework Bootstrap 5.

###  Fonctionnalités Front-End (Ce que le client voit)
Page d'Accueil Dynamique : Affiche un carrousel d'images et une liste de cartes de catégories de véhicules, dont les informations (nom, image) sont tirées directement de la base de données.

Catalogue Complet "Nos Véhicules" : Une page dédiée qui affiche l'intégralité des véhicules disponibles sous forme de grille de cartes Bootstrap responsives.

Pages de Catégories : Des pages dynamiques (ex: /categorie/{id}) qui affichent uniquement les véhicules appartenant à une catégorie spécifique, là aussi sous forme de cartes.

Page Contact : Une page de contact fonctionnelle avec un formulaire HTML.

Structure Professionnelle : Le site utilise une structure de "partials" Twig pour la barre de navigation et le pied de page, garantissant une cohérence et une maintenance facile.

###  Fonctionnalités Back-End (Ce que l'admin gère)
Dashboard d'Administration Complet : Un back-office sécurisé a été créé avec EasyAdminBundle, permettant une gestion simple et intuitive de tout le contenu du site.

Gestion des Entités (CRUD) : Le dashboard permet de Créer, Lire, Mettre à jour et Supprimer (CRUD) les Vehicules et les Categories.

Gestion des Images : Le formulaire du back-office a été configuré pour permettre l'upload d'images pour les entités qui en ont besoin (comme l'image de chaque catégorie), rendant le site entièrement administrable.

###  Architecture et Code
Logique Contrôleur/Repository : Utilisation propre du modèle MVC de Symfony. Chaque page a son contrôleur dédié qui utilise le Repository correspondant pour interroger la base de données.

Routing Dynamique : Mise en place de routes dynamiques avec des paramètres (ParamConverter) pour générer des pages de manière intelligente et automatique.

Intégration Front-End Moderne : Le projet est stylisé avec Bootstrap 5 et Font Awesome, installés et gérés via importmap (AssetMapper), la méthode moderne de Symfony sans Node.js.

 Ajout de la page catalogue "Nos Véhicules"

- Création du VehiculeController et de la route /vehicules pour afficher tous les véhicules.
- Utilisation du VehiculeRepository pour récupérer les données depuis la base de données.
- Création du template vehicule/index.html.twig avec une boucle pour afficher les véhicules sous forme de cartes Bootstrap.
- Correction et finalisation des styles de la barre de navigation (Navbar) et du pied de page (Footer).
- Ajout de liens dynamiques sur les images des véhicules pointant vers leurs pages de catégorie respectives.
###  Fonctionnalités Ajoutées
1. Page Catalogue "Nos Véhicules"
Affichage Complet : Création d'une page dédiée (/vehicules) qui affiche l'intégralité du catalogue de véhicules.

Logique Dynamique : Le VehiculeController utilise le VehiculeRepository pour récupérer tous les véhicules de la base de données et les transmet au template Twig.

Présentation en Grille : La page utilise la grille de Bootstrap (row, col-md-4) et une boucle for pour afficher chaque véhicule sous forme de carte (card) responsive.

2. Page de Contact Fonctionnelle
Formulaire Symfony : Création d'un formulaire de contact robuste avec le composant Form de Symfony (ContactFormType). Le formulaire est configuré pour être stylisé automatiquement par Bootstrap grâce au thème bootstrap_5_layout.html.twig.

Envoi d'E-mails : Le ContactController gère la soumission du formulaire. En cas de succès, il utilise le composant Mailer de Symfony, configuré avec un service externe (Brevo), pour envoyer un vrai e-mail contenant les informations du formulaire.

Gestion des Retours Utilisateur : Le système de messages "flash" a été mis en place pour afficher un message de succès ou d'erreur à l'utilisateur après la soumission du formulaire, améliorant ainsi l'expérience utilisateur.

3. Interactivité et Liens Dynamiques
Navigation Améliorée : Les images sur la page "Nos Véhicules" sont maintenant cliquables.

Logique de Redirection : Un clic sur l'image d'un véhicule redirige l'utilisateur vers la page de la catégorie correspondante (ex: un clic sur une Porsche mène à la page /categorie/sportive), créant ainsi un parcours de navigation logique à travers le site.
Envoi d'E-mails via Service Externe : Le ContactController gère la soumission du formulaire et utilise le composant Mailer. Il a été configuré pour utiliser un service externe professionnel (Brevo) via le brevo-mailer, avec une gestion sécurisée des identifiants dans le fichier .env
###  Fonctionnalité Ajoutée : Fiche de Détail par Véhicule
Page de Détail Unique : Création d'une page dédiée pour afficher la fiche technique complète et détaillée de chaque véhicule du catalogue.

Routing Dynamique et ParamConverter : Mise en place d'une route dynamique (/vehicule/{id}) qui utilise la "magie" du ParamConverter de Symfony. Le VehiculeController reçoit directement l'objet Vehicule correspondant à l'ID dans l'URL, sans avoir besoin d'écrire le code de recherche manuellement.

Vue Détaillée (show.html.twig) : Conception d'un template Twig spécifique (vehicule/show.html.twig) avec une mise en page professionnelle à deux colonnes : une grande image du véhicule à gauche et toutes ses caractéristiques (nom, description complète, tarif, bouton de réservation) à droite.

Interconnexion du Catalogue : Tous les boutons "Voir détails" des différentes pages de listing (catalogue complet, pages de catégories) ont été rendus fonctionnels. Ils pointent désormais vers la page de détail du véhicule correspondant en utilisant la fonction path() de Twig, créant un parcours utilisateur complet et logique.

###  Fonctionnalité Ajoutée : Gestion Complète des Réservations (Back-Office)
1. La Fondation : Création de l'Entité Reservation
Objectif : Définir le "plan de montage" d'une réservation pour que Symfony sache quelles informations la composent.

Action : Utilisation de la commande php bin/console make:entity Reservation. En s'appuyant sur le diagramme de classes, chaque propriété (dateReservation, prixTotal, statut, etc.) a été ajoutée avec le type de champ approprié (ex: DateTimeField, MoneyField).

Points Clés Appris : L'ID est géré automatiquement par Symfony. La consultation du fichier d'entité permet de vérifier le travail de l'assistant make:entity.

2. La Construction : Mise à Jour de la Base de Données
Objectif : Appliquer le nouveau "plan de montage" à notre "entrepôt" (la base de données).

Action : Utilisation des commandes php bin/console make:migration et php bin/console doctrine:migrations:migrate. La première commande a créé le plan de construction, la seconde a construit la table reservation dans la base de données.

3. L'Interface de Gestion : Création du ReservationCrudController
Objectif : Créer une interface dans le back-office pour que l'administrateur puisse voir et gérer les réservations.

Action : Utilisation de la commande spécialisée php bin/console make:admin:crud en ciblant l'entité Reservation.

Configuration :

Ajout du lien dans le menu du DashboardController (MenuItem::linkToCrud) pour rendre la page accessible.

Configuration des champs à afficher (configureFields) dans le ReservationCrudController en utilisant les "outils" appropriés (IdField, DateTimeField, MoneyField, AssociationField...).

Résolution de Bugs : Compréhension et correction de l'erreur NoSuchPropertyException en faisant correspondre parfaitement les champs du contrôleur avec les propriétés de l'entité.

4. La Finition : Rendre les Formulaires Intelligents
Objectif : Rendre le formulaire de création de réservation utilisable et robuste.

Action : Ajout de la méthode __toString() dans les entités User et Vehicule.

Points Clés Appris : Compréhension du rôle de l'AssociationField, qui a besoin d'une "étiquette" textuelle pour afficher les objets liés. La méthode __toString() fournit cette étiquette, transformant un menu déroulant technique en une liste de noms lisibles.

* **Formulaire d'inscription complet :**
    * Ajout des champs **"Nom"** et **"Prénom"** pour un enregistrement plus détaillé.
    * Le formulaire est maintenant **100% fonctionnel** : les informations des nouveaux utilisateurs sont validées et correctement **sauvegardées en base de données**.

* **Logique de redirection améliorée :**
    * Après une **inscription réussie**, le nouvel utilisateur est automatiquement connecté et redirigé vers la page **"Notre Catalogue"** pour une expérience utilisateur fluide.
    * Lorsqu'un **utilisateur déjà existant se connecte**, il est redirigé vers la **page d'accueil**.

* **Déconnexion fonctionnelle :**
    * Un bouton **"Se déconnecter"** est maintenant visible dans la barre de navigation pour tout utilisateur connecté, lui permettant de mettre fin à sa session de manière sécurisée.

    * **Route Sécurisée** : L'action de créer une nouvelle réservation (`/reservation/{id}`) est désormais protégée. Seuls les **utilisateurs authentifiés** (`ROLE_USER`) peuvent y accéder.

* **Redirection Conditionnelle** :
    * Un visiteur **non connecté** qui clique sur "Réserver" est automatiquement redirigé vers la **page de connexion** avec un message l'invitant à s'identifier.
    * Un utilisateur **connecté** accède directement au **formulaire de réservation** pour le véhicule sélectionné.

* **Formulaire de Réservation** : Un formulaire dédié est affiché, permettant aux utilisateurs de choisir leurs dates de début et de fin de location.

* **Confirmation et Persistance des Données** :
    * Après la soumission réussie du formulaire, un **message de succès** (flash message) s'affiche pour confirmer à l'utilisateur que sa demande a bien été prise en compte.
    * La nouvelle réservation est **sauvegardée en base de données**, en l'associant au véhicule choisi et à l'utilisateur connecté.

##  **Mise à jour : Affichage Date de Disponibilité** (27/01/2025)

###  **Nouvelles fonctionnalités :**
- **Affichage intelligent de la disponibilité** : Quand un véhicule est indisponible, l'utilisateur voit maintenant la prochaine date de disponibilité
- **Calcul automatique** : Le système trouve automatiquement quand le véhicule sera libre après les réservations actuelles

###  **Améliorations techniques :**
- **Nouvelle méthode `getProchaineDateDisponible()`** dans l'entité Vehicule
- **Logique métier** : Parcours des réservations actives (`en_attente`, `confirme`)
- **Calcul intelligent** : Trouve la date de fin la plus récente + 1 jour
- **Interface utilisateur** : Message clair "Véhicule disponible dès le [DATE]"

###  **Fichiers modifiés :**
###  **Impact utilisateur :**
-  **Expérience améliorée** : Plus de frustration avec "indisponible"
-  **Information claire** : L'utilisateur sait quand revenir
-  **Aspect professionnel** : Application web moderne et complète

---
 Système de Recherche de Véhicules
 Fonctionnalités implémentées :

 Recherche par nom/modèle de véhicule
 Filtrage par marque (liste déroulante)
 Filtrage par prix minimum et prix maximum
 Affichage des résultats en temps réel
 Interface responsive avec Bootstrap
 Fichiers créés/modifiés :
Nouveaux fichiers :

src/Form/VehiculeSearchType.php - Formulaire de recherche
templates/vehicule/list.html.twig - Template d'affichage des résultats

Fichiers modifiés :

src/Controller/VehiculeController.php - Ajout de la méthode list() pour gérer la recherche
src/Form/ReservationFormType.php - Améliorations du formulaire de réservation

### Version 1.3.0 - Tests & Interface Moderne
**Date :** [Date du jour]

####  Nouvelles Fonctionnalités
- **Tests Unitaires** : Implémentation des tests pour la logique métier
- **Tests Fonctionnels** : Tests end-to-end pour les parcours utilisateur
- **Interface Modernisée** : Refonte visuelle de la page véhicules

####  Structure CSS Reorganisée
####  Améliorations Visuelles
- **Cards Véhicules** : Design moderne avec ombres et bordures arrondies
- **Animations d'Entrée** : Effet `fadeInUp` au chargement des cards
- **Responsive Design** : Adaptation optimale sur tous écrans
- **Filtres Visuels** : Interface de recherche améliorée
- **États Interactifs** : Hover effects et transitions fluides

####  Tests Implémentés
- **Tests Unitaires** : Validation des entités et services
- **Tests Fonctionnels** : Parcours de recherche de véhicules


---

##  Aperçu des Améliorations Visuelles

### Page Véhicules Avant/Après
 SERVICE DÉDIÉ :
 src/Service/NotificationService.php

Responsabilité : Gestion centralisée des notifications email
Injection de dépendances : MailerInterface + Twig
Méthode principale : sendReservationNotifications()

2️ TEMPLATES EMAIL :
 templates/emails/
  ├──  admin_notification.html.twig    # Email pour l'admin
  └──  user_confirmation.html.twig     # Email pour le client
3️ INTÉGRATION CONTRÔLEUR :
 src/Controller/ReservationController.php

Injection automatique du NotificationService
Appel après persist/flush pour garantir la cohérence


 FONCTIONNEMENT :
 EMAIL ADMINISTRATEUR :

Expéditeur : rigalbruno2@gmail.com
Destinataire : rigalbruno2@gmail.com
Objet : "Nouvelle réservation véhicule #{ID}"
Contenu : Détails complets de la réservation

 EMAIL CLIENT :

Expéditeur : rigalbruno2@gmail.com  
Destinataire : Email dynamique du client connecté
Objet : " Réservation en attente d'approbation"
Contenu : Confirmation avec détails personnalisés


 DONNÉES TRANSMISES :

 Informations réservation complètes
 Détails véhicule (marque, modèle, etc.)
 Données utilisateur  
 Prix total calculé Statut "en_attente"


 AVANTAGES :

Double notification (admin + client)
Templates séparés pour personnalisation
Service réutilisable pour d'autres notifications
Injection Symfony automatique

 SYSTÈME PROFESSIONNEL ET SCALABLE ! 

##  Mise à jour du formulaire de réservation

**Nouveaux champs ajoutés :**
-  **Email** : Contact client (EmailType, validation automatique)
-  **Téléphone** : Contact d'urgence (TelType, format numérique)

**Bénéfices :** Amélioration de la communication et validation des données.
#  AutoRent - Plateforme de Location de Véhicules

![AutoRent Logo](https://img.shields.io/badge/AutoRent-Location%20Véhicules-orange?style=for-the-badge&logo=car)

##  Description

**AutoRent** est une plateforme moderne de location de véhicules développée avec Symfony. Elle offre une interface intuitive pour la gestion et la location de différents types de véhicules avec un système d'administration complet.

---

##  Nouvelles Fonctionnalités (Dernière Mise à Jour)

###  **Améliorations UX/UI Page d'Accueil**
- ** Scroll Snap Effect** : Navigation fluide entre sections avec effet d'aimantation
- ** Navbar Fixe** : Barre de navigation toujours accessible pour naviguer entre pages
- ** Effets Shadow Cards** : Animations hover avec halo orange (couleur AutoRent)
- ** Transitions Texte & Cards** : Animations d'apparition au scroll avec délais progressifs

###  **Système d'Actualités**
- ** Contrôleur Front Actualités** : Gestion de l'affichage public des news
- ** Page Actualités** : Template `actualite/index.html.twig` avec design responsive
- ** Contrôleur Backend Actualités** : Interface d'administration mise à jour

---

##  Fonctionnalités Principales

###  **Frontend Public**
-  Page d'accueil** avec scroll snap et animations
-  Catalogue véhicules** par catégories
-  Section actualités** avec dernières news
-  Design responsive** et moderne
-  Animations CSS** et effets visuels

###  **Backend Administration**
- ** Gestion utilisateurs** et rôles
- ** CRUD véhicules** complet
- ** Gestion catégories** de véhicules
- ** Système actualités** avec éditeur
- ** Upload images** pour véhicules
- ** Tableau de bord** administrateur

###  **Expérience Utilisateur**
- ** Scroll snap** entre sections
- ** Navigation fixe** toujours accessible
- ** Effets hover** sur cards avec shadow orange
- ** Transitions fluides** texte et éléments
- ** Interface responsive** sur tous écrans

---

##  Technologies Utilisées

### **Backend**
![Symfony](https://img.shields.io/badge/Symfony-6.x-000000?style=flat&logo=symfony)
![PHP](https://img.shields.io/badge/PHP-8.x-777BB4?style=flat&logo=php)
![Doctrine](https://img.shields.io/badge/Doctrine-ORM-orange?style=flat)

### **Frontend**
![Bootstrap](https://img.shields.io/badge/Bootstrap-5.x-7952B3?style=flat&logo=bootstrap)
![CSS3](https://img.shields.io/badge/CSS3-Animations-1572B6?style=flat&logo=css3)
![JavaScript](https://img.shields.io/badge/JavaScript-ES6+-F7DF1E?style=flat&logo=javascript)

src/
├── Controller/
│   ├──  HomeController.php          # Page accueil avec scroll snap
│   ├──  CategorieController.php     # Gestion catégories front
│   ├──  ActualiteController.php     #  Contrôleur front actualités
│   └── Admin/
│       ├──  AdminController.php    # Dashboard admin
│       ├──  VehiculeController.php  # CRUD véhicules
│       └──  ActualiteAdminController.php #  Backend actualités
├── Entity/
│   ├──  Vehicule.php
│   ├──  Categorie.php
│   ├──  Utilisateur.php
│   └──  Actualite.php
└── Repository/
    └──  Repositories pour chaque entité
templates/
├──  home/index.html.twig            #  Avec scroll snap & animations
├──  actualite/
│   └──  index.html.twig             #  Page actualités publique
├──  categorie/
│   └── show.html.twig
└── admin/
    ├──  dashboard.html.twig
    ├──  vehicule/
    └──  actualite/                  #  Interface admin actualités
public/
├── css/
│   └──  styles.css                  #  Animations & effets
├── js/
│   └──  animations.js               #  Scroll effects
└── images/                            # Assets véhicules

###  Animations de Scroll - Page Actualités
> ** Version :** 1.2.0  
> ** Fichiers :** `public/actualites-css/scroll-effects.css` | `public/actualites-js/scroll-effects.js`

---

##  **Tags Conventionnels**

### `feat:` **Système d'animations au défilement**
-  Animations bidirectionnelles (montée/descente)
-  Gestion multi-pages avec navigation
-  Performance optimisée avec IntersectionObserver

### `style:` **Effets visuels des cartes**
```css
/* Animation carte - fondu et glissement */
.scroll-card {
    opacity: 0;
    transform: translateY(40px);
    transition: all 0.8s ease-out;
}

public/
├── actualites-css/
│   └── scroll-effects.css    # Styles animations
├── actualites-js/
│   └── scroll-effects.js     # Logique scroll
└── templates/
    └── actualite/
        └── index.html.twig   # Classes: text-animation, scroll-card
        
        # Mon Projet Web

## 🔧 Changements et Améliorations

### Migration de la Base de Données

**Problème rencontré :**
Suite à un bug persistant avec XAMPP et MySQL empêchant la connexion à la base de données, une migration complète du système de stockage a été nécessaire.

**Solution mise en place :**
- ❌ Ancien système : MySQL avec XAMPP
- ✅ Nouveau système : SQLite

**Avantages de SQLite :**
- **Performance** : Base de données intégrée, plus rapide
- **Simplicité** : Aucune configuration serveur requise  
- **Portabilité** : Un seul fichier .db facile à déployer
- **Fiabilité** : Aucun service externe à gérer

### Optimisation des Images

**Problématique :**
Les images PNG ralentissaient considérablement le chargement du site.

**Conversion effectuée :**
-  Format précédent : PNG (lourdes)
-  Nouveau format : WebP (optimisées)

**Résultats obtenus :**
-  Réduction de 60-80% du poids des images
-  Temps de chargement divisé par 3
-  Expérience mobile grandement améliorée
-  Compatibilité avec tous les navigateurs modernes

### Validation W3C HTML

**Contrôle qualité effectué :**
Validation complète du code HTML via le [W3C Markup Validator](https://validator.w3.org/)

**Corrections apportées :**
-  Balises fermées correctement
-  Structure HTML conforme aux standards
-  Accessibilité améliorée
-  Sémantique respectée

**Résultat :**

####  COMPTE ADMINISTRATEUR :
- Email: eros@gmail.com
- Rôle: ROLE_ADMIN
- Accès: /admin (après connexion)
##  Mise en ligne avec ngrok (Démonstration temporaire)

Pour exposer temporairement l'application en ligne à des fins de démonstration :

### Prérequis

- ngrok installé ([Télécharger](https://ngrok.com/download))
- Compte ngrok gratuit ([S'inscrire](https://dashboard.ngrok.com/signup))

### Étapes de déploiement

#### 1. Configuration initiale de ngrok