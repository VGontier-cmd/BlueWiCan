<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\CanData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\DataTables\CanDatasDataTable;

class CoreController extends Controller
{
    /**
     * Permet d'afficher le dashboard
     */
    public function dashboard() {
        $startOfDay = Carbon::createFromTimestamp(strtotime('today'))->startOfDay();
        $endOfDay = Carbon::createFromTimestamp(strtotime('tomorrow'))->startOfDay();
        
        $page_title = 'Bienvenue,';
        $page_subtitle = 'Consultez les données envoyées directement depuis le BlueWiCan.';
        
        $nb_trames = CanData::all()->count();
        $nb_trames_today = CanData::whereBetween('created_at', [$startOfDay, $endOfDay])->count();

        return view('core.dashboard', compact(
            'page_title', 
            'page_subtitle', 
            'nb_trames',
            'nb_trames_today' 
        ));
    }

    /**
     * Permet d'afficher la page d'accueil
     */
    public function saved(CanDatasDataTable $dataTable) {
        $page_title = 'Données stockées';
        $page_subtitle = 'Données stockées';
        return $dataTable->render('core.saved', compact('page_title', 'page_subtitle'));
    }

    /**
     * Permet d'afficher la page des données live
     */
    public function live() {
        $page_title = 'Données live';
        $page_subtitle = 'Données live';

        $ws_host = config('websockets.ws_host');
        $ws_port = config('websockets.ws_port');

        return view('core.live', compact('page_title', 'page_subtitle', 'ws_host', 'ws_port'));
    }

    public function store(Request $request) {
        $data = $request->input('datas');

        foreach ($data as $item) {
            $recordExists = DB::table('can_datas')->where('given_id', $item['given_id'])->exists();
            if(!$recordExists) {
                CanData::create([
                    'given_id' => $item['given_id'],
                    'data' => $item['data'],
                    'length' => $item['length'],
                    'created_at' => Carbon::parse($item['created_at'])->format('Y-m-d H:i:s')
                ]);
            } else {
                DB::table('can_datas')
                ->where('given_id', $item['given_id'])
                ->update([
                    'given_id' => $item['given_id'],
                    'data' => $item['data'],
                    'length' => $item['length'],
                    'updated_at' => Carbon::parse($item['created_at'])->format('Y-m-d H:i:s')
                ]);
            }
        }

        return response()->json(['success' => 'Data saved successfully.']);
    }
}
