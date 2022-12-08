<?php

namespace App\Http\Controllers;

class CoreController extends Controller
{
    /**
     * Permet d'afficher la page d'accueil
     * @return View
     */
    public function home() {
        return view('core/home');
    }
}
