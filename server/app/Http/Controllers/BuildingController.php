<?php

namespace App\Http\Controllers;

use App\Models\Building;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BuildingController extends Controller
{
    public function index()
    {
        return Building::all();
    }

    public function detail($id)
    {
        return Building::find($id);
    }

    public function create(Request $req)
    {
        $data = json_decode($req->getContent());


        $building = new Building();
        $building->comune = $data->comune;
        $building->description = $data->description;
        $building->immagine = $data->immagine;
        $building->nome = $data->nome;
        $building->indirizzo = $data->indirizzo;
        $building->cap = $data->cap;
        $building->appartamenti = $data->appartamenti;
        $building->consumo_annuo = $data->consumo_annuo;
        $building->contabilizzazione = $data->contabilizzazione;
        $building->tipo_sonda = $data->tipo_sonda;
        $building->tipo_dispositivi = $data->tipo_dispositivi;
        $building->provincia = $data->provincia;
        $building->gestione_remota = $data->gestione_remota;

        $building->save();

        return $building;
    }

    public function delete($id)
    {
        Building::destroy($id);
    }

    public function edit(Request $req, $id)
    {
        $data = json_decode($req->getContent());

        $building = Building::find($id);
        $building->comune = $data->comune;
        $building->description = $data->description;
        $building->immagine = $data->immagine;
        $building->nome = $data->nome;
        $building->indirizzo = $data->indirizzo;
        $building->cap = $data->cap;
        $building->appartamenti = $data->appartamenti;
        $building->consumo_annuo = $data->consumo_annuo;
        $building->contabilizzazione = $data->contabilizzazione;
        $building->tipo_sonda = $data->tipo_sonda;
        $building->tipo_dispositivi = $data->tipo_dispositivi;
        $building->provincia = $data->provincia;
        $building->gestione_remota = $data->gestione_remota;

        $building->save();

        return $building;
    }
}
