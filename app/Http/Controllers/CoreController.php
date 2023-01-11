<?php

namespace App\Http\Controllers;

use App\DataTables\CanDatasDataTable;
use BeyondCode\LaravelWebSockets\Apps\AppProvider;
use BeyondCode\LaravelWebSockets\Dashboard\DashboardLogger;

class CoreController extends Controller
{
    /**
     * Permet d'afficher la page d'accueil
     */
    public function home(CanDatasDataTable $dataTable) {
        $page_title = 'Toutes les données stockées';
        $page_subtitle = 'Liste de toutes les trames stockées';
        return $dataTable->render('core.home', compact('page_title', 'page_subtitle'));
    }

    /**
     * Permet d'afficher la page des données live
     */
    public function live(AppProvider $appProvider) {
        return view('core.live', [
            "page_title" => "Toutes les données live",
            "page_subtitle" => "Liste de toutes les trames en live",

            "host" => env("LARAVEL_WEBSOCKETS_HOST"),
            "port" => env("LARAVEL_WEBSOCKETS_PORT"),
            "authEndpoint" => "api/sockets/connect",
            "logChannel" => DashboardLogger::LOG_CHANNEL_PREFIX,
            "apps" => $appProvider->all()
        ]);
    }
}
