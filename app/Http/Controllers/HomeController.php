<?php

namespace App\Http\Controllers;

use App\Models\Vente;
use Illuminate\Http\Request;
use App\Models\Component;
use App\Models\Historique;
use App\Models\Photo;
use App\Models\Reparation;
use App\Models\ReparationCheck;
use App\Models\ReparationCompo;
use App\Models\Store;

use App\Models\Client;
use App\Models\Categorie;
use App\Models\Marque;
use App\Models\Modele;
use Illuminate\Validation\Rule;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $reparations=Reparation::all();
        $somme_reparations=0;
        foreach($reparations as $reparation)
        {
            $somme_reparations=$somme_reparations+$reparation->prix;
        }
        $ventes=Vente::all();
        $somme_ventes=0;
        foreach($ventes as $vente)
        {
            $somme_ventes=$somme_ventes+$vente->totale;
        }
        $nombre_clients=Client::all()->count();
        return view('home',['somme_ventes'=>$somme_ventes,'somme_reparations'=>$somme_reparations,'nombre_clients'=>$nombre_clients]);
    }
}
