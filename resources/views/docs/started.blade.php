@extends('layouts.docs')

@section('content')
<div class="d-flex justify-content-end align-items-center gap-2 mb-4">
    <a class="doc-btn" href="https://laravel.com/docs/9.x" target="_blank">
        <span>Laravel documentation<i class="bi bi-arrow-up-right"></i></span>
    </a>
    <a class="doc-btn --primary" href="https://github.com/Nyrress/BlueWiCan/archive/refs/heads/master.zip" download>
        <span><i class="bi bi-cloud-download"></i>Download project</span>
    </a>
</div>

<!-- PROLOGUE -->
<section class="doc-section">
    <h1>Prologue</h1>
    <section id="intro">
        <h2>Introduction</h2>
        <p>
            Bienvenue dans la documentation du projet <span class="highlighted">BlueWiCan</span> !
        </p>
        <p>
            Le projet BlueWiCan vise à développer une application web capable de recevoir des trames CAN envoyées 
            directement depuis un module Bluetooth ou Wifi nommé BlueWiCan. Cette application permettra à l'utilisateur de 
            visualiser les données CAN et de les analyser en temps réel.
        </p>
        <p>
            Cette documentation fournira toutes les informations nécessaires pour comprendre le fonctionnement de l'application, 
            y compris les instructions d'installation, les guides d'utilisation et les spécifications techniques. 
            Nous espérons que cette documentation vous aidera à tirer le meilleur parti de l'application BlueWiCan.
        </p>
    </section>
    
    <section id="objectifs">
        <h2>Objectifs</h2>
        <p>
            L'objectif principal de ce projet est d'améliorer le calculateur prototype nommé BlueWiCan pour qu'il puisse échanger 
            avec un serveur les données CAN d'un véhicule. Ces données sont par la suite accessibles sur une page web.
        </p>
        <div class="img-section shadow-lg">
            <img src="{{url('/images/docs/objectifs.png')}}">
        </div>
        <p>
            En effet, Cette application à pour principal objectif de permettre à n'importe quel utilisateur de pouvoir consulter
            les données envoyées par le BlueWinCan n'importe où dans le monde grâce à un module Wifi ou bluetooth.
        </p>
    </section>
    
    <section id="tools">
        <h2>Outils utilisés</h2>
        <p>
            Cette application a été développée via le framework <span class="highlighted">Laravel</span>, un framework PHP 
            utilisant l'architecture <span class="highlighted">MVC</span> permettant de construire des applications web.
        </p>
        <ul class="list">
            <p>Voici, la liste des technologies utilisées pour la réalisation de ce premier morceau d'application :</p>
            <li><span class="highlighted">Laravel 9</span>, framework PHP MVC</li>
            <li><span class="highlighted">PHP >= 8.0</span>, primordiale pour l'utilisation de la version 9 de Laravel</li>
            <li><span class="highlighted">Composer</span>, un gestionnaire de paquets (pour les librairies PHP)</li>
            <li><span class="highlighted">MySQL</span>, comme serveur de base de données.</li>
            <li><span class="highlighted">Node.js</span></li>
            <li><span class="highlighted">Vue.js</span>, framework javascript utilisé pour les interfaces web</li>
            <li><span class="highlighted">Bootstrap</span>, une collection d'outils utiles à la création du design de sites et d'applications web.</li>
        </ul>
    </section>
</section>


<!-- DEVELOPMENT -->
<section class="doc-section">
    <h1>Développement</h1>
    <!-- prerequisites -->
    <section id="config">
        <h2>Configurations</h2>
        <p>
            Pour le développement local et toutes les incompréhensions à propos de Laravel ou les problèmes techniques que vous pouvez rencontrer, 
            on vous invite à vous renseigner directement sur la documentation de laravel <a href="https://laravel.com/docs/9.x/" target="_blank">ici</a>
        </p>
        <p>
            Avant de commencer à rentrer dans les détails de l'application, récupérez le code source de l'application <a href="https://github.com/Nyrress/BlueWiCan/archive/refs/heads/master.zip" download>ici</a>, et lié le porjet à un nouveau
            repository sur GitHub ou GitLab (au choix) mais on vous conseille d'utiliser un outil de versionning Git pour une meilleure organisation et
            assurer la mainteance de l'application.
        </p>
        <ul class="list">
            <p>Dans un premier temps, assurez-vous de bien avoir installé les outils suivants :</p>
            <li><span class="highlighted">Laravel 9</span></li>
            <li><span class="highlighted">PHP >= 8.0</span></li>
            <li><span class="highlighted">Composer</span></li>
            <li><span class="highlighted">Laragon</span></li>
            <li><span class="highlighted">Un IDE comme VSCODE</span></li>
            <li><span class="highlighted">Node.js</span></li>
        </ul>
    </section>

    <section id="dev-db">
        <h2>Base de données</h2>
        <p>
            Afin de pouvoir configurer votre de base de données locale, ouvrez le projet dans votre IDE.
        </p>
        <p>
            Un fichier de configuration <span class="highlighted">.env</span> se trouvant à la racine du projet rassemble des variables
            d'envrionnements permettant de configurer l'application et la base de données. 
        </p>
        <div class="code-section">
            <code id="code-dev-1">
                <div class="line">
                    <span>DB_CONNECTION=mysql</span>&nbsp;
                </div>
                <div class="line">
                    <span>DB_HOST=127.0.0.1</span>&nbsp;
                </div>
                <div class="line">
                    <span>DB_PORT=3306</span>&nbsp;
                </div>
                <div class="line">
                    <span>DB_DATABASE=BlueWiCan</span>&nbsp;
                </div>
                <div class="line">
                    <span>DB_USERNAME=root</span>&nbsp;
                </div>
                <div class="line">
                    <span>DB_PASSWORD=</span>
                </div>
            </code>
            <button class="btn-copy" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Copied" aria-label="Copy to Clipboard" data-clipboard-target="#code-dev-1">
                <i class="bi bi-clipboard2-fill copy-icon"></i>
                <i class="bi bi-clipboard2-check-fill check-icon"></i>
            </button>
        </div>
        <p>
            Remplacer ces variables déjà présentent dans le fichier par la configuration ci-dessus.
        </p>
        <p>
            Notez que l'application met en cache différents fichiers comme <span class="highlighted">.env</span> et <span class="highlighted">web.php</span>
            dans le dossier <span class="highlighted">/bootstrap</span> (rien à voir avec le framework CSS). Par conséquent, à chaque 
            modification de ces fichiers il est important d'exécuter la commande suivante permettant de vider les caches.
        </p>
        <div class="code-section">
            <code id="code-dev-2">
                <div class="line">
                    <span>php artisan optimize</span>&nbsp;
                </div>
            </code>
            <button class="btn-copy" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Copied" aria-label="Copy to Clipboard" data-clipboard-target="#code-dev-2">
                <i class="bi bi-clipboard2-fill copy-icon"></i>
                <i class="bi bi-clipboard2-check-fill check-icon"></i>
            </button>
        </div>
        <p>
            La gestion de votre base de données se fait dans le dossier <span class="highlighted">/database</span>.
            Ce dossier contient aussi un sous dossier pour les migrations de base de données <span class="highlighted">/database/migrations</span> 
            dans lequel vous allez retrouver toutes les migrations de base de données pour l'ajout, la suppression et la modification des tables.
        </p>
        <p>
            Voici un exemple de migration que nous avons créé pour l'ajout de la table <span class="highlighted">can_datas</span>.
        </p>
        <div class="img-section shadow-lg">
            <img src="{{url('/images/docs/data-migration.png')}}">
        </div>
        <ul class="list">
            <p>Cette table contient les champs suivants :</p>
            <li><span class="highlighted">data_id :</span> la clé primaire de la table auto-incrémentée.</li>
            <li><span class="highlighted">id :</span> l'id de la trame</li>
            <li><span class="highlighted">data :</span> les données de la trame</li>
            <li><span class="highlighted">length :</span> la taille de la trame</li>
            <li><span class="highlighted">created_at :</span> date de création de la trame </li>
            <li><span class="highlighted">updated_at :</span> date de modification de la trame</li>
        </ul>
        <p>
            Les colonnes <span class="highlighted">created_at</span> et <span class="highlighted">updated_at</span> sont créées par la méthode <span class="highlighted">timestamps</span>.
        </p>
        <p>
            Vous pouvez créer vos propres migrations, pour plus de renseignement consulter la documentation de Laravel.
        </p>
        <p>
            Pour créer la base de données ainsi que toutes les tables, vous pouvez exécuter les migrations grâce
            à la commande suivante :
        </p>
        <div class="code-section">
            <code id="code-dev-3">
                <div class="line">
                    <span>php artisan migrate</span>&nbsp;
                </div>
            </code>
            <button class="btn-copy" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Copied" aria-label="Copy to Clipboard" data-clipboard-target="#code-dev-3">
                <i class="bi bi-clipboard2-fill copy-icon"></i>
                <i class="bi bi-clipboard2-check-fill check-icon"></i>
            </button>
        </div>
        <p>
            Vous pouvez maintenant, accéder à votre base de données locale grâce à phpMyAdmin.
        </p>
    </section>

    <!-- use -->
    <section id="use">
        <h2>Guide d'utilisation</h2>
        <p>
            Pour commencer à utiliser et développer l'application vous devez démarrer votre serveur apache,
            Soit en utilisant le serveur de Laravel en exécutant la commande suivante :
        </p>
        <div class="code-section">
            <code id="code-dev-4">
                <div class="line">
                    <span>php artisan serve</span>
                </div>
            </code>
            <button class="btn-copy" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Copied" aria-label="Copy to Clipboard" data-clipboard-target="#code-dev-4">
                <i class="bi bi-clipboard2-fill copy-icon"></i>
                <i class="bi bi-clipboard2-check-fill check-icon"></i>
            </button>
        </div>
        <p>
            Soit, vous pouvez utiliser UWAMP, WAMPP, XAMPP ou encore Laragon si vous ne voulez pas vous compliquer la vie (conseillé pour les projets Laravel).
        </p>
        <p>
            Laravel utilise un outil de construction frontal moderne qui fournit un environnement de 
            développement extrêmement rapide et regroupe votre code pour la production. 
            Lors de la création d'applications avec Laravel, vous utiliserez généralement Vite pour regrouper les 
            fichiers CSS et JavaScript de votre application dans des ressources prêtes pour la production.
        </p>
        <p>
            Vous pouvez configurer vos assets dans le fichier <span class="highlighted">vite.config.js</span> à la racine du projet.
        </p>
        <div class="img-section shadow-lg">
            <img src="{{url('/images/docs/vite.png')}}">
        </div>
        <p>
            De ce fait, pour compiler les assets de styles et de scripts vous devez exécuter la commande suivante
            dans un terminal de VSCODE.
        </p>
        <div class="code-section">
            <code id="code-dev-5">
                <div class="line">
                    <span>npm run dev</span>
                </div>
            </code>
            <button class="btn-copy" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Copied" aria-label="Copy to Clipboard" data-clipboard-target="#code-dev-5">
                <i class="bi bi-clipboard2-fill copy-icon"></i>
                <i class="bi bi-clipboard2-check-fill check-icon"></i>
            </button>
        </div>
        <p>
            Laisser le serveur vite tourner pendant que vous développez afin de compiler les scripts JS ou SCSS si vous y apportez des modifications.
        </p>
        <div class="img-section shadow-lg">
            <img src="{{url('/images/docs/vite-run.png')}}">
        </div>

        <p>
            Rendez-vous ensuite sur votre application web locale via votre naviguateur.
        </p>
        <p>
            Vous arriverez sur une page de connexion vous permettant de vous connecter à l'application, cependant si vous ne possèder pas de compte, 
            vous avez la possibilité de vous en créer un en appuyant sur le bouton sign up.
        </p>
        <div class="img-section shadow-lg">
            <img src="{{url('/images/docs/login.png')}}">
        </div>
        <p>
            Pour vous inscrire vous devez saisir votre nom ainsi que vos identifiants de connexion.
        </p>
        <div class="img-section shadow-lg">
            <img src="{{url('/images/docs/register.png')}}">
        </div>
        <p>
            Une fois connecté, vous arriverez sur un dashboard vous présentant les statistiques globales
        </p>
        <div class="img-section shadow-lg">
            <img src="{{url('/images/docs/dashboard.png')}}">
        </div>
        <p>
            Sur le menu latéral à votre gauche vous pouvez retrouver l’onglet "<span class="highlighted">Datas Stored</span>"
            redirigeant sur la page permettant la visualisation des trames stockées dans la base de données.
        </p>
        <div class="img-section shadow-lg">
            <img src="{{url('/images/docs/saved.png')}}">
        </div>
        <div class="img-section" img-type="small">
            <img src="{{url('/images/docs/saved-actions.png')}}">
        </div>
        <ul class="list">
            <p>Différentes fonctionnalités sont mises à disposition :</p>
            <li><span class="highlighted">Actualisation du tableau</span> regroupant la liste des trames enregistrées</li>
            <li><span class="highlighted">Imprimer</span> la liste des trames affichées</li>
            <li><span class="highlighted">Télécharger</span> la liste des trames affichées sous les formats <span class="highlighted">PDF</span>, <span class="highlighted">CSV</span> et <span class="highlighted">Excel</span></li>
        </ul>
        <p>
            Vous avez aussi la possibilité de trier les différents résultats en 
            fonction des attributs caractérisant une trame (<span class="highlighted">id</span>, <span class="highlighted">data</span>, <span class="highlighted">length</span>, <span class="highlighted">created_at</span>).
        </p>
        <p>
            Ensuite, dans l’onglet "<span class="highlighted">Live Datas</span>", vous aurez la possibilité de voir les trames
            envoyées depuis le BlueWiCan.
        </p>
        <div class="img-section shadow-lg">
            <img src="{{url('/images/docs/live.png')}}">
        </div>
        <div class="img-section" img-type="small">
            <img src="{{url('/images/docs/live-actions.png')}}">
        </div>
        <ul class="list">
            <p>Sur cette page plusieurs actions sont disponibles comme :</p>
            <li><span class="highlighted">Ouverture/Fermuture</span> d'une connexion au serveur websockets</li>
            <li><span class="highlighted">Enregistrer</span> les trames reçues en base de données</li>
            <li><span class="highlighted">Effacer</span> les trames reçues</li>
        </ul>
        <div class="img-section" img-type="small" style="height: 2.5rem">
            <img src="{{url('/images/docs/auth.png')}}" >
        </div>
        <p>
            Sur toute l'application, une fois connecté, vous avez la possibilité de vous déconnecter grâce au bouton de déconnexion
            à droite de votre profil.
        </p>
    </section>


    <!-- mvc -->
    <section id="mvc">
        <h2>Le MVC de Laravel</h2>
        <ul class="list">
            <p>Comme énoucé précédement, Laravel est un framework basé sur l'architecture MVC :</p>
            <li><span class="highlighted">Models</span>, c’est Eloquent qui se charge de cet aspect et on a créé un modèle "<span class="highlighted">CanData</span>" pour nos trames dans le dossier <span class="highlighted">/Http/Models</span></li>
            <li><span class="highlighted">Views</span>, affichage des pages de l'applciation dans le dossier <span class="highlighted">/resources/views</span></li>
            <li><span class="highlighted">Controllers</span>, c’est le chef d’orchestre de l’application, permet de gérer toutes les actions nécessaires de l'application dans le dossier <span class="highlighted">/Http/Controllers</span></li>
        </ul>

        <p>
            Directement lié aux contrôleurs on retrouve les routes permettant l'accès aux différentes actions des contrôleurs.
        </p>
        <p>
            La définition des routes se fait dans le fichier <span class="highlighted">web.php</span>
        </p>
        <p>
            Pour mieux comprendre la communication entre les blocs principaux composant l'application, voici un petit schema résumant
            l'architecture MVC de Laravel et de manière générale.
        </p>
        <div class="img-section">
            <img src="{{url('/images/docs/mvc.png')}}" >
        </div>
    </section>

    <!-- routes -->
    <section id="routes">
        <h2>Les routes</h2>
        <p>
            Dans le fichier <span class="highlighted">web.php</span>, nous avons organisé les routes de notre application
            en les regroupant en fonction de leur niveau d'accessibilité.
        </p>
        <p>
            Vous avez surement remarqué la présence de deux <span class="highlighted">middlewares</span>, pour faire simple un middleware 
            est une étape pour la requête HTTP arrivant en amont, ça permet d’accomplir des vérifications
        </p>
        <div class="img-section shadow-lg">
            <img src="{{url('/images/docs/routes-auth.png')}}" >
        </div>
        <p>
            ici, avec le middleware "<span class="highlighted">auth</span>", on demande que l’accès à 
            ces routes soient limités aux utilisateurs authentifiés. Ceux qui ne le sont pas seront automatiquement renvoyés sur
            la page de connexion.
        </p>
        <div class="img-section shadow-lg">
            <img src="{{url('/images/docs/routes-guest.png')}}" >
        </div>
        <p>
            Contrairement au middleware "<span class="highlighted">auth</span>", "<span class="highlighted">guest</span>" permet d'accorder l’accès aux routes
            de connexion, d'inscription, etc... (dans notre cas) Uniquement si l'utilisateur n'est pas authentifié. Dans le cas où un utilisateur est déjà connecté 
            avec l'ouverture d'une session, il n'est pas possible pour lui de se rediriger vers la page de connexion. Pour cela, il devra se déconnecter.       
        </p>
        <p>
            De plus, il n'est pas compliqué sous Laravel de comprendre comment se définit une route.
        </p>
        <div class="img-section shadow-lg">
            <img src="{{ url('/images/docs/route-ex.png') }}" >
        </div>
        <ul class="list">
            <p>En effet elle se décompose en plusieurs parties :</p>
            <li><span class="highlighted">Type</span></li>
            <li><span class="highlighted">l'URI</span></li>
            <li><span class="highlighted">Contrôleur</span></li>
            <li><span class="highlighted">Action du contrôleur</span></li>
            <li><span class="highlighted">Nom de la route (optionnel)</span></li>
        </ul>
    </section>

    <!-- stored -->
    <section id="auth">
        <h2>Authentification</h2>
        <p>
            Tous les traitements concernant l'authentification et l'inscription figurent dans le contrôleur <span class="highlighted">AuthController</span>.
        </p>
        <p>
            Action <span class="highlighted">login</span> permettant de se connecter
        </p>
        <div class="img-section shadow-lg">
            <img src="{{ url('/images/docs/login-method.png') }}" >
        </div>
        <p>
            Action <span class="highlighted">register</span> permettant de s'inscrire
        </p>
        <div class="img-section shadow-lg">
            <img src="{{ url('/images/docs/register-method.png') }}" >
        </div>
        <p>
            Action <span class="highlighted">logout</span> permettant se déconnecter
        </p>
        <div class="img-section shadow-lg">
            <img src="{{ url('/images/docs/logout-method.png') }}" >
        </div>
    </section>

    <!-- stored -->
    <section id="stored">
        <h2>Données stockées</h2>
        <p>
            Sur la page de données stockées créée via le fichier <span class="highlighted">/resources/views/core/saved.blade.php</span> 
            vous pouvez remarquer un tableau de données créé grâce à la librairie "<span class="highlighted">yajra/DataTables</span>"
            nous l'avons par la suite stylisé avec du scss et configuré grâce à notre classe <span class="highlighted">CanDataDataTable.php</span>
        </p>
        <p>
            On lui précise sur quel model ce tableau doit-il agir et récupérer les données, c'est dans la méthode <span class="highlighted">query</span> que cela
            se fait en lui précisant le model en paramètre.
        </p>
        <div class="img-section shadow-lg">
            <img src="{{url('/images/docs/can-datatable.png')}}" >
        </div>
        <p>
            On oublie pas de définir la route pour accéder à la page des données stockées.
        </p>
        <div class="img-section shadow-lg">
            <img src="{{url('/images/docs/saved-route.png')}}" >
        </div>
        <p>
            On appelle par la suite cette classe dans la méthode <span class="highlighted">saved</span> de notre <span class="highlighted">CoreController</span>.
        </p>
        <div class="img-section shadow-lg">
            <img src="{{url('/images/docs/saved-method.png')}}" >
        </div>
        <p>
            Puis on affiche le tableau sur notre vue, dans le fichier <span class="highlighted">saved.blade.php</span>.
        </p>
        <div class="img-section shadow-lg">
            <img src="{{url('/images/docs/saved-view.png')}}" >
        </div>
        <p>
            Avec un peu de style, voila le résutlat !
        </p>
        <div class="img-section shadow-lg">
            <img src="{{url('/images/docs/saved.png')}}" >
        </div>
    </section>

    <!-- live -->
    <section id="live">
        <h2>Données live</h2>
        <p>
            Sur cette page nous réutilisons un tableau du même style que celui sur la page des données stockées, cependant,
            nous n'utilisons pas la librairie <span class="highlighted">yajra/datatables</span> pour celui-ci.
        </p>
        <p>
            Contrairement à la page des données stockées nous nous basons pas sur des données enregistrées pour l'affichage des trames
            mais bien sur des données envoyées par le BlueWiCan sous le format <span class="highlighted">JSON</span> se basant sur l'exemple
            ci-dessous.
        </p>
        <div class="img-section shadow-lg">
            <img src="{{url('/images/docs/trame-json.png')}}" >
        </div>
        <ul class="list">
            <p>
                C'est sur cette page que nous allons ouvrir une connexion <span class="highlighted">web socket</span>, donc dans notre fichier
                <span class="highlighted">.env</span> nous avons rajouté deux variables d'environnements :
            </p>
            <li><span class="highlighted">WS_HOST</span>, l'hôte du serveur web socket</li>
            <li><span class="highlighted">WS_PORT</span>, le port du serveur</li>
        </ul>
        <p><strong>Configuration Locale :</strong></p>
        <div class="code-section">
            <code id="code-live-1">
                <div class="line">
                    <span>WS_HOST=127.0.0.1</span>&nbsp;
                </div>
                <div class="line">
                    <span>WS_PORT=6001</span>
                </div>
            </code>
            <button class="btn-copy" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Copied" aria-label="Copy to Clipboard" data-clipboard-target="#code-live-1">
                <i class="bi bi-clipboard2-fill copy-icon"></i>
                <i class="bi bi-clipboard2-check-fill check-icon"></i>
            </button>
        </div>
        <p><strong>Configuration en production :</strong></p>
        <div class="code-section">
            <code id="code-live-1">
                <div class="line">
                    <span>WS_HOST=82.66.189.233</span>&nbsp;
                </div>
                <div class="line">
                    <span>WS_PORT=6001</span>
                </div>
            </code>
            <button class="btn-copy" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Copied" aria-label="Copy to Clipboard" data-clipboard-target="#code-live-1">
                <i class="bi bi-clipboard2-fill copy-icon"></i>
                <i class="bi bi-clipboard2-check-fill check-icon"></i>
            </button>
        </div>
        <p>
            On définie la route pour accéder à la page des données live.
        </p>
        <div class="img-section shadow-lg">
            <img src="{{url('/images/docs/live-route.png')}}" >
        </div>
        <p>
            Toujours dans le <span class="highlighted">CoreController</span>, on appelle la méthode <span class="highlighted">live</span>.
        </p>
        <div class="img-section shadow-lg">
            <img src="{{url('/images/docs/live-method.png')}}" >
        </div>
        <p>
            Dans cette méthode, on déclare et iniatialise les variables <span class="highlighted">$ws_host</span> et <span class="highlighted">$ws_port</span> pour
            les injecter dans notre vue <span class="highlighted">live.blade.php</span>.
        </p>
        <p>
            De plus, si vous voulez utiliser vos variables d'environnement dans votre application, il vous faut utiliser la méthode "<span class="highlighted">config()</span>".
            Les variables d'environnement sont utilisées dans les fichiers de configurations dans le dossier <span class="highlighted">config</span> de l'application.
        </p>
        <p>
            Les fichiers de configurations sont des tableaux PHP hashés par des clés et valeurs comme le montre ce fichier de configuration que nous avons créé pour les
            configurations websockets (<span class="highlighted">websockets.php</span>). 
        </p>
        <div class="img-section shadow-lg">
            <img src="{{url('/images/docs/ws-config.png')}}" >
        </div>
        <p>
            <strong>PETIT RAPPEL :</strong> Les données de ces fichiers sont mises en cache. Donc à la modification de celles-ci, n'oubliez pas d'exécuter la commande suivante
        </p>
        <div class="code-section">
            <code id="code-live-2">
                <div class="line">
                    <span>php artisan optimize</span>
                </div>
            </code>
            <button class="btn-copy" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Copied" aria-label="Copy to Clipboard" data-clipboard-target="#code-live-2">
                <i class="bi bi-clipboard2-fill copy-icon"></i>
                <i class="bi bi-clipboard2-check-fill check-icon"></i>
            </button>
        </div>
        <p>
            Renseignez-vous à ce sujet pour mieux comprendre, notamment avec la documentation de Laravel.
        </p>
        <p>
            Intéressons nous à l'affichage des données live, le fichier <span class="highlighted">live.blade.php</span> utilise le framework <span class="highlighted">Vue.js</span>
            pour faire l'affichage des trames directement sur la vue sans avoir besion de rafraichir la page.
        </p>
        <p>
            Dans une balise script nous avons créé un objet Vue permettant de manipuler notre page comme nous le souhaitions.
            A chaque actualisation de notre objet, la page se changera automatiquement. 
        </p>
        <div class="img-section shadow-lg">
            <img src="{{url('/images/docs/vue-obj.png')}}">
        </div>
        <ul class="list">
            <p>Faisons une brève explication sur cette objet Vue :</p>
            <li><span class="highlighted">el : </span>élément du DOM à partir duquel l'objet Vue agit.</li>
            <li><span class="highlighted">data : </span>permet de définir toutes les variables propre à l'objet.</li>
            <li><span class="highlighted">mounted : </span>cette méthode est appellée dès les chargement de la page.</li>
            <li><span class="highlighted">methods : </span>permet de renseigner toutes les méthodes propre à l'objet.</li>
        </ul>

        <p>
            Pour afficher les données directment dans le tableau, on vérifie s'il y'a des données envoyées et si oui alors
            on boucle sur dessus avec la directive Vue <span class="highlighted">v-for="(data, index) in incomingDatas"</span>.
        </p>
        <div class="img-section shadow-lg">
            <img src="{{url('/images/docs/vue-display-datas.png')}}">
        </div>

        <ul class="list">
            <p>Notre objet contient différentes méthodes :</p>
            <li><span class="highlighted">connect() : </span>permet d'ouvrir la connexion au serveur websocket</li>
            <li><span class="highlighted">disconnect() : </span>permet de fermer la connexion au serveur websocket.</li>
            <li><span class="highlighted">save() : </span>permet d'enregistrer toutes les trames reçues en base de données.</li>
            <li><span class="highlighted">clear() : </span>permet de supprimer les trames reçues du tableau.</li>
        </ul>
        <p>
            Rentrons plus dans les détails de ces méthodes :
        </p>
        <p><span class="highlighted">01 - connect() : </span></p>
        <div class="img-section shadow-lg">
            <img src="{{url('/images/docs/vue-connect.png')}}">
        </div>
        <p>
            Cette méthode est appellée dès le chargement de la page puisque nous l'appellons dans la méthode <span class="highlighted">mounted()</span>.
        </p> 
        <div class="img-section shadow-lg">
            <img src="{{url('/images/docs/vue-connect-btn.png')}}">
        </div>
        <p>
           De plus, la gestion du bouton de connexion ou de déconexion se fait en fonction de l'état de l'attribut <span class="highlighted">connected</span>.
           Nous vérifions sont état avec la directive Vue <span class="highlighted">v-if="connected"</span>. Donc en fonction de l'état de cette attribut soit 
           on affiche le bouton de connexion, soit celui de déconnexion.
        </p>
        <p>
            Le bouton de connexion appelle la méthode "<span class="highlighted">connect()</span>" lorsque nous cliquons dessus, grâce à la directive <span class="highlighted">v-on:click='connect()'</span>, 
            tandis que le bouton de déconnexion appelle la méthode "<span class="highlighted">disconnect()</span>" avec la directive <span class="highlighted">v-on:click='disconnect()'</span>
        </p>
        <p>
            Dans ces deux méthodes nous jouons sur un changement de l'état booléen de la variable <span class="highlighted">connected</span>.
        </p>
        <p><span class="highlighted">02 - disconnect() : </span></p>
        <div class="img-section shadow-lg">
            <img src="{{url('/images/docs/vue-disconnect.png')}}">
        </div>
        <p>
            Comme expliqué précédement, cette méthode est appellée au clique du bouton de déconnexion changeant l'état de la variable <span class="highlighted">connected</span> à false.
        </p>
        <p><span class="highlighted">03 - save() : </span></p>
        <div class="img-section shadow-lg">
            <img src="{{url('/images/docs/vue-save.png')}}">
        </div>
        <p>
            Cette méthode est appellée au clique du bouton pour enregistrer les données</span>.
        </p>
        <div class="img-section shadow-lg">
            <img src="{{url('/images/docs/vue-save-btn.png')}}">
        </div>
        <p>
            Elle permet d'envoyer une requête Ajax à notre endpoint <span class="highlighted">/save-data</span> dans le <span class="highlighted">CoreController</span>.
        </p>
        <p>
            Cette requête Ajax prend en body, le tableau de données précédement construit (<span class="highlighted">dataArray</span>) en parcourant totues les lignes du tableau et en y récupérant les valeurs de chaque
            cellule.
        </p>
        <p>
            Via la route suivante :
        </p>
        <div class="img-section shadow-lg">
            <img src="{{url('/images/docs/save-data-route.png')}}">
        </div>
        <div class="img-section shadow-lg">
            <img src="{{url('/images/docs/save-method.png')}}">
        </div>
        <p>
            Dans l'action de notre contrôleur on parcourt toutes les trames dans le body de la requête et pour chaque trame on 
            vérifie si elle existe déjà ou non dans la base de données en fonction de son id.
        </p>
        <p>
            Si la trame n'existe pas alors on l'insert dans la base de données sinon on la modifie.
        </p>
        <p><span class="highlighted">04 - clear() : </span></p>
        <div class="img-section shadow-lg">
            <img src="{{url('/images/docs/vue-clear.png')}}">
        </div>
        <p>Pour effacer les données affichées on vide le tableau des données envoyées.</p>
        <div class="img-section shadow-lg">
            <img src="{{url('/images/docs/vue-clear-btn.png')}}">
        </div>
        <p>Avec l'ajout de styles on obtient ce résultat :</p>
        <div class="img-section shadow-lg">
            <img src="{{url('/images/docs/live.png')}}">
        </div>
    </section>
</section>


<!-- IMPROVEMENTS -->
<section class="doc-section">
    <h1>Points d'améliorations</h1>
    <section id="improve-register">
        <h2>Inscription</h2>
        <p>
            Nous avons fait une inscription simple sans gestion de rôles, ni <span class="highlighted">vérification par email</span>, etc.
            Ce sont des fonctionnalités qui pourront être implémentées plus tard.
        </p>
        <p>
            De plus, nous avions commencé à implémenter la fonctionnalité pour <span class="highlighted">réinitiliser son mot de passe</span> concistant 
            à envoyer un lien de réinitilisation par mail.
        </p>
        <p>
            Nous avons fait le page mais reste à finir le back-end.
        </p>
        <div class="img-section shadow-lg">
            <img src="{{url('/images/docs/reset-password.png')}}">
        </div>
        <p>
            Cependant nous n'avions pas eu le temps de la finir et de vraiment l'implémenter. 
            Ce sera à vous de faire vos recherches et de définir un protocole d'envoi de mail.
        </p>
        <p>
            Notamment, en configurant ceci :
        </p>
        <div class="code-section">
            <code id="code-auth-1">
                <div class="line">
                    <span>MAIL_MAILER=smtp</span>&nbsp;
                </div>
                <div class="line">
                    <span>MAIL_HOST=mailhog</span>&nbsp;
                </div>
                <div class="line">
                    <span>MAIL_PORT=1025</span>&nbsp;
                </div>
                <div class="line">
                    <span>MAIL_USERNAME=null</span>&nbsp;
                </div>
                <div class="line">
                    <span>MAIL_PASSWORD=null</span>&nbsp;
                </div>
                <div class="line">
                    <span>MAIL_ENCRYPTION=null</span>&nbsp;
                </div>
                <div class="line">
                    <span>MAIL_FROM_ADDRESS="hello@example.com"</span>&nbsp;
                </div>
                <div class="line">
                    <span>MAIL_FROM_NAME="${APP_NAME}"</span>
                </div>
            </code>
            <button class="btn-copy" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Copied" aria-label="Copy to Clipboard" data-clipboard-target="#code-auth-1">
                <i class="bi bi-clipboard2-fill copy-icon"></i>
                <i class="bi bi-clipboard2-check-fill check-icon"></i>
            </button>
        </div>
        <p>
            Voici la méthode qui nous avions commencé à implémenter dans le contrôleur <span class="highlighted">AuthController</span>.
        </p>
        <div class="img-section shadow-lg">
            <img src="{{url('/images/docs/reset-password-method.png')}}">
        </div>
    </section>

    <section id="https">
        <h2>HTTPS</h2>
        <p>
            Concernant le site en production, il serait important d'utiliser un <span class="highlighted">certificat SSL</span> 
            et mettre en place une connexion sécurisée via le protocole <span class="highlighted">https</span>.
        </p>
        <p>
            L'HTTPS est un protocole de communication qui utilise le certificat SSL pour sécuriser les échanges entre le navigateur de 
            l'utilisateur et le site web. Lorsqu'un utilisateur se connecte à un site web en HTTPS, ses données sont chiffrées avant 
            d'être envoyées au serveur web. Cela garantit que les informations sensibles, telles que les noms d'utilisateur, 
            les mots de passe et les informations de paiement, ne peuvent pas être interceptées par des tiers malveillants.
        </p>
        <p>
            En résumé, le certificat SSL et l'HTTPS sont utilisés pour protéger la confidentialité et l'intégrité des données échangées 
            entre les utilisateurs et les sites web. Ils sont particulièrement importants pour les sites qui traitent des informations sensibles, 
            tels que les sites de commerce électronique, les services bancaires en ligne et les sites de santé en ligne.
        </p>
    </section>

    <section id="wss">
        <h2>WSS</h2>
        <p>
            Actuellement, nous utilisons le protocole <span class="highlighted">WS</span> pour la communication en temps réel entre un navigateur
            et un serveur.
        </p>
        <p>
            C'est un protocole de communication bidirectionnel en temps réel entre un navigateur web et un serveur, 
            qui permet aux applications web d'envoyer et de recevoir des données en temps réel, 
            sans avoir à constamment interroger le serveur. Le protocole WSS utilise SSL/TLS pour chiffrer les données échangées entre le 
            navigateur et le serveur, offrant ainsi une sécurité supplémentaire par rapport au protocole WebSocket standard.
        </p>
        <p>
            C'est pourquoi, il serait intéressant d'ajouter uen couche de sécurité supplémentaire avec le <span class="highlighted">WSS (WebSockets over SSL)</span> couplé avec le protocole SSL/TLS.
        </p>
    </section>
</section>


<!-- SERVER -->
<section class="doc-section">
    <!-- SERVER SSH - Connection -->
    <section id="connection">
        <h1>Déploiement de l'application</h1>
        <h2>Connexion</h2>
        <p>
            Pour accéder à votre projet web, vous pouvez utiliser un terminal et vous connecter 
            à votre serveur en exécutant les commandes suivantes :
        </p>
        <p>
            Ouvrez un terminal sur votre ordinateur.
        </p>
        <p>
            Utilisez la commande ssh pour vous connecter à votre serveur. Entrez l'adresse IP de votre serveur comme ceci
        </p>
        
        <div class="code-section">
            <code id="code-1">
                <div class="line">
                    <span>ssh 82.66.189.233</span>
                </div>
            </code>
            <button class="btn-copy" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Copied" aria-label="Copy to Clipboard" data-clipboard-target="#code-1">
                <i class="bi bi-clipboard2-fill copy-icon"></i>
                <i class="bi bi-clipboard2-check-fill check-icon"></i>
            </button>
        </div>
        
        <p>
            Utilisez la commande <span class="highlighted">ssh</span> pour vous 
            connecter à votre serveur en entrant l'adresse IP de votre serveur et 
            en utilisant le nom d'utilisateur <span class="highlighted">bluewican</span>. 
            Entrez le mot de passe <span class="highlighted">wildisblue</span> pour 
            valider votre connexion.
        </p>
        
        <div class="code-section">
            <code id="code-2">
                <div class="line">
                    <span>ssh bluewican@82.66.189.233 -p 2222</span>
                </div>
            </code>
            <button class="btn-copy" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Copied" aria-label="Copy to Clipboard" data-clipboard-target="#code-2">
                <i class="bi bi-clipboard2-fill copy-icon"></i>
                <i class="bi bi-clipboard2-check-fill check-icon"></i>
            </button>
        </div>
        <p>
            Une fois connecté à votre serveur, accédez au répertoire contenant votre 
            projet en utilisant la commande <span class="highlighted">cd</span> suivie 
            du chemin d'accès au répertoire.
        </p>
        <div class="code-section">
            <code id="code-3">
                <div class="line">
                    <span>cd /var/www/html/BlueWiCan</span>
                </div>
            </code>
            <button class="btn-copy" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Copied" aria-label="Copy to Clipboard" data-clipboard-target="#code-3">
                <i class="bi bi-clipboard2-fill copy-icon"></i>
                <i class="bi bi-clipboard2-check-fill check-icon"></i>
            </button>
        </div>
        <p>
            Si vous souhaitez rafraîchir le serveur avec les dernières modifications 
            depuis la branche master de votre dépôt GitHub, utilisez la commande suivante.
        </p>
        <div class="code-section">
            <code id="code-4">
                <div class="line">
                    <span>sudo git pull BlueWiCan master</span>
                </div>
                <div class="line">&nbsp;</div>
                <div class="line">
                    <span>sudo php artisan optimize</span>
                </div>
                <div class="line">&nbsp;</div>
                <div class="line">
                    <span>sudo npm run build</span>
                </div>
            </code>
            <button class="btn-copy" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Copied" aria-label="Copy to Clipboard" data-clipboard-target="#code-4">
                <i class="bi bi-clipboard2-fill copy-icon"></i>
                <i class="bi bi-clipboard2-check-fill check-icon"></i>
            </button>
        </div>
        <p>
            Vous pouvez aussi exécuter ces commandes simultanément.
        </p>
        <div class="code-section">
            <code id="code-5">
                <div class="line">
                    <span>sudo git pull BlueWiCan master && sudo php artisan optimize && sudo npm run build</span>
                </div>
            </code>
            <button class="btn-copy" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Copied" aria-label="Copy to Clipboard" data-clipboard-target="#code-5">
                <i class="bi bi-clipboard2-fill copy-icon"></i>
                <i class="bi bi-clipboard2-check-fill check-icon"></i>
            </button>
        </div>
        <p>
            Assurez-vous que toutes les autorisations nécessaires sont accordées 
            pour exécuter ces commandes et que votre environnement est correctement configuré.
        </p>
        <p>
            Pour accéder à l'application web, rendez-vous sur le lien suivant: <a href="http://82.66.189.233/" target="_blank">http://82.66.189.233</a>
        </p>
    </section>
    
    <!-- SECTION - bdd -->
    <section id="db">
        <h2>Base de données</h2>
        <p>
            Pour accéder à la base de données de l'application, rendez-vous sur le lien suivant: <a href="http://82.66.189.233/phpmyadmin" target="_blank">http://82.66.189.233/phpmyadmin</a>
        </p>
        <div class="img-section shadow-lg">
            <img src="{{url('/images/docs/bdd-login.png')}}">
        </div>
        <p>
            Pour vous à phpMyAdmin sur le serveur vous devez utiliser comme nom d'utilisateur 
            <span class="highlighted">root</span> et entrer le mot de passe <span class="highlighted">wildisblue</span>.
        </p>
    </section>
    
    <!-- SECTION - Web sockets -->
    <section id="sockets">
        <h2>Le serveur Web Socket</h2>
        <p>
            Le serveur web socket est indépendant de l’application, il peut donc s’exécuter
            en dehors de celle-ci. Un github nommé "<span class="highlighted">bluewican-websocket-server</span>" 
            a été créé pour le stocker. Mais si vous voulez le récupérer via le serveur SSH, 
            il se trouve dans le dossier suivant : <span class="highlighted">/var/www/nodejs</span>
        </p>
        <p>
            Pour lancer le serveur vous avez seulement à vous mettre à la racine du chemin 
            où se trouve votre serveur web socket et d’effectuer la commande suivante
        </p>
        <div class="code-section">
            <code id="code-6">
                <div class="line">
                    <span>cd /var/www/nodejs</span>
                </div>
                <div class="line">&nbsp;</div>
                <div class="line">
                    <span>npm start</span>
                </div>
            </code>
            <button class="btn-copy" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Copied" aria-label="Copy to Clipboard" data-clipboard-target="#code-6">
                <i class="bi bi-clipboard2-fill copy-icon"></i>
                <i class="bi bi-clipboard2-check-fill check-icon"></i>
            </button>
        </div>
        <p>
            Le lien du serveur web socket : <span class="highlighted">ws://82.66.189.233:{port}</span><br/>
            Le port : <span class="highlighted">6001</span>
        </p>
        <p>
            Si voulez effectuer des modifications sur le serveur, vous pouvez aller consulter le 
            fichier "<span class="highlighted">server.js</span>" qui se trouve à la racine.
        </p>
    </section>
    
    <!-- SECTION - Crontab -->
    <section id="cron">
        <h2>Tâches planifiées</h2>
        <p>
            Pour que le projet laravel et le serveur websockets se mettent automatiquement 
            à jour en production on utilise les tâches planifiées <span class="highlighted">crontab</span> pour que toutes 
            les deux minutes le serveur ubuntu vérifie la présence d’une nouvelle version 
            sur les serveurs de <span class="highlighted">GitHub</span> ou non et si c’est le cas, la télécharge et relance 
            le projet automatiquement.
        </p>
        <p>
            Pour retrouver ses taches planifiées vous pouvez pour cela exécuter la commande 
            suivante dans le terminal du serveur Bluewican.
        </p>
        <div class="code-section">
            <code id="code-7">
                <div class="line">
                    <span>sudo crontab -e</span>
                </div>
            </code>
            <button class="btn-copy" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Copied" aria-label="Copy to Clipboard" data-clipboard-target="#code-7">
                <i class="bi bi-clipboard2-fill copy-icon"></i>
                <i class="bi bi-clipboard2-check-fill check-icon"></i>
            </button>
        </div>
        <p>
            Dans ce fichier se trouve toutes les tâches et commandes planifiées selon certains paramètres.
        </p>
        <div class="img-section shadow-lg">
            <img src="{{url('/images/docs/crontab.png')}}">
        </div>
        <p>
            Pour mieux comprendre la construction d'un tâche planifiée, voici une courte description 
            de la structure d'une entrée dans un fichier crontab. Les champs à renseigner sont dans 
            l'ordre (un champ qu'on ne souhaite pas renseigner doit être rempli avec une *).
        </p>
        <div class="img-section shadow-lg">
            <img src="{{url('/images/docs/cron.png')}}">
        </div>
        <p>
            Pour plus de précision, on vous invite à consulter la documentaion Cron <a href="https://doc.ubuntu-fr.org/cron" target="_blank">https://doc.ubuntu-fr.org/cron</a>
        </p>
    </section>
</section>
@endsection