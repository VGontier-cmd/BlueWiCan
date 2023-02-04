<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\CanData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\DataTables\CanDatasDataTable;

class CoreController extends Controller
{
    private $today;
    private $month;

    private $startOfDay;
    private $endOfDay;

    private $startOfMonth;
    private $endOfMonth;

    public function __construct() {
        setlocale(LC_TIME, 'fr_FR.utf8');
        $this->today = Carbon::parse(Carbon::today())->locale('fr_FR')->isoFormat('dddd Do MMMM');
        $this->month = Carbon::parse(Carbon::today())->locale('fr_FR')->isoFormat('MMMM');

        $this->startOfDay = Carbon::createFromTimestamp(strtotime('today'))->startOfDay();
        $this->endOfDay = Carbon::createFromTimestamp(strtotime('tomorrow'))->startOfDay();

        $this->startOfMonth = Carbon::createFromTimestamp(strtotime('today'))->startOfMonth();
        $this->endOfMonth = Carbon::createFromTimestamp(strtotime('today'))->endOfMonth();
    }
    /**
     * Permet d'afficher le dashboard
     */
    public function dashboard() { 
        $page_title = 'Bienvenue,';
        $page_subtitle = 'Consultez les données envoyées directement depuis le BlueWiCan.';
        
        $nb_trames_total = CanData::all()->count();
        $nb_trames_current_day = CanData::whereBetween('created_at', [$this->startOfDay, $this->endOfDay])->count();
        $nb_trames_current_month = CanData::whereBetween('created_at', [$this->startOfMonth, $this->endOfMonth])->count();

        $today = $this->today;
        $month = $this->month;

        $data_graph_day = $this->getTramesCurrentDay();
        $data_graph_month = $this->getTramesCurrentMonth();

        $labels_graph_month = [];
        foreach ($data_graph_month as $data) {
            $date = Carbon::createFromTimestamp(strtotime("today"))->startOfMonth()->addDay($data->day - 1);
            $labels_graph_month[] = $date->locale('fr_FR')->isoFormat('dddd Do');
        }

        return view('core.dashboard', compact(
            'page_title', 
            'page_subtitle', 
            'nb_trames_total',
            'nb_trames_current_day',
            'nb_trames_current_month',
            'data_graph_day',
            'data_graph_month',
            'labels_graph_month',
            'today',
            'month'
        ));
    }

    /**
     * Permet de récupérer les données enregistrées regroupées par l'heure de création pour
     * le jour courant
     */
    private function getTramesCurrentDay() {
        $data = CanData::whereBetween('created_at', [$this->startOfDay, $this->endOfDay])
            ->groupBy(DB::raw('hour(created_at)'))
            ->select(DB::raw('hour(created_at) as hour'), DB::raw('count(*) as count'))
            ->get();
        return $data;
    }

    /**
     * Permet de récupérer les données enregistrées regroupées par le jour de création pour
     * le mois courant
     */
    public function getTramesCurrentMonth() {
        $data = CanData::whereBetween('created_at', [$this->startOfMonth, $this->endOfMonth])
                    ->groupBy(DB::raw('day(created_at)'))
                    ->select(DB::raw('day(created_at) as day'), DB::raw('count(*) as count'))
                    ->get();
        return $data;
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
