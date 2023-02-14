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
<section>
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
    
    <section id="releases">
        <h2>Releases notes</h2>
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
        <p>
            Laravel inclu un serveur local pouvant être lancé grâce à la commande suivante :
        </p>
        <div class="code-section">
            <code id="code-release">
                <div class="line">
                    <span>php artisan serve</span>
                </div>
            </code>
            <button class="btn-copy" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Copied" aria-label="Copy to Clipboard" data-clipboard-target="#code-release">
                <i class="bi bi-clipboard2-fill copy-icon"></i>
                <i class="bi bi-clipboard2-check-fill check-icon"></i>
            </button>
        </div>
        <p>
            Cependant, vous pouvez utiliser UWAMPP, WAMPP, XAMPP ou encore Laragon si vous ne voulez pas vous compliquer la vie (conseillé pour les projets Laravel)
        </p>
    </section>
</section>


<!-- DEVELOPMENT -->
<section>
    <!-- prerequisites -->
    <section id="prerequisites">
        <h2>Prérequis</h2>
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
</section>

<!-- SERVER -->
<section>
    <!-- SERVER SSH - Connection -->
    <section id="connection">
        <h1>Server SSH</h1>
        <h2>Connection</h2>
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
    </section>
    
    <!-- SECTION - Web site -->
    <section id="web">
        <h2>Web site</h2>
        <p>
            Pour accéder à l'application web, rendez-vous sur le lien suivant: <a href="http://82.66.189.233/" target="_blank">http://82.66.189.233</a>
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
            Dans ce fichier se trouve toutes les tâches et commandes planifiées selon certains paramètres
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