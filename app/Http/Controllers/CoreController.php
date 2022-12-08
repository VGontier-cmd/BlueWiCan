<?php

namespace App\Http\Controllers;

use App\DataTables\CanDatasDataTable;

class CoreController extends Controller
{
    /**
     * Permet d'afficher la page d'accueil
     */
    public function home(CanDatasDataTable $dataTable) {
        return $dataTable->render('core.home');
    }
}
