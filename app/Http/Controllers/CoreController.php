<?php

namespace App\Http\Controllers;

use App\Models\CanData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

        $ws_host = config('websockets.ws_host');
        $ws_port = config('websockets.ws_port');

        return view('core.live', compact('page_title', 'page_subtitle', 'ws_host', 'ws_port'));
    }

    public function store(Request $request) {
        $data = $request->input('data');

        foreach ($data as $item) {
            CanData::create([
                'given_id' => $item['given_id'],
                'data' => $item['data'],
                'length' => $item['length'],
                'created_at' => $item['created_at']
            ]);
        }
        return response()->json(['success' => 'Data saved successfully.']);
    }
}
