<?php

namespace App\Http\Controllers;

use App\DataTables\CanDatasDataTable;

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
    public function live() {
        $page_title = 'Toutes les données live';
        $page_subtitle = 'Liste de toutes les trames en live';
        return view('core.live', compact('page_title', 'page_subtitle'));
    }
}
