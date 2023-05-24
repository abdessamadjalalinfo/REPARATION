<?php
namespace App\Http\Controllers;

use App\Models\Component;
use App\Models\Historique;
use App\Models\Photo;
use App\Models\Reparation;
use App\Models\ReparationCheck;
use App\Models\ReparationCompo;
use App\Models\Store;
use App\Models\Vente;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Categorie;
use App\Models\Marque;
use App\Models\Modele;
use Illuminate\Validation\Rule;


class VenteController extends Controller
{
    public function ajoutervente()
    {
        $clients=Client::all();
        $categories=Categorie::all();
        $components=Component::all();
        return view('ventes.ajouter',
        ['clients'=>$clients,
        'categories'=>$categories,
        'components'=>$components
    ]);
    }
    public function adding(Request $request)
    {
        $vente=new Vente();
        if($request->client=="anonyme")
        {
            $vente->label=$request->label;
            $vente->client_id=1;
            $vente->categorie_id=$request->categorie;
            $vente->marque_id=$request->marque_id;
            $vente->model_id=$request->modele;
            $vente->quantite=$request->quantite;
            $vente->prix=$request->prix;
            $vente->totale=$request->prix*$request->quantite;
            $vente->save();
        }
        if($request->client=="nouveau")
        {
            $request->validate([
                'dni' => [
                    'required',
                    Rule::unique('clients')->where(function ($query) use ($request) {
                        return $query->where('dni', $request->dni);
                    }),
                ],
            ], [
                'dni' => 'La valeur saisie est déjà utilisée.',
            ]);
            $client=new Client();
            $client->dni=$request->dni;
            $client->nom=$request->nom;
            $client->prenom=$request->prenom;
            $client->email=$request->email;
            $client->phone=$request->phone;
            $client->adresse=$request->adresse;
            $client->save();
            $vente->label=$request->label;
            $vente->client_id=$client->id;
            $vente->categorie_id=$request->categorie;
            $vente->marque_id=$request->marque_id;
            $vente->model_id=$request->modele;
            $vente->quantite=$request->quantite;
            $vente->prix=$request->prix;
            $vente->totale=$request->prix*$request->quantite;
            $vente->save();
        }
        if($request->client=="existe")
        {

            $vente->label=$request->label;
            $vente->client_id=$request->id_client;
            $vente->categorie_id=$request->categorie;
            $vente->marque_id=$request->marque_id;
            $vente->model_id=$request->modele;
            $vente->quantite=$request->quantite;
            $vente->prix=$request->prix;
            $vente->totale=$request->prix*$request->quantite;
            $vente->save();
        }
        return redirect()->back()->with('success', 'Les ventes ont été ajoutées avec succès !');

    }

    public function listeventes()
    {
        $ventes=Vente::Paginate(10); ;
        return view('ventes.listevente',['ventes'=>$ventes]);
  
    }
    public function deletevente($id)
    {   $vente=Vente::find($id);
        $vente->delete();
        return back();

    }
    public function editvente(Request $request)
    {
        $vente=Vente::find($request->id);
        $vente->prix=$request->prix;
        $vente->quantite=$request->quantite;

        $vente->methode=$request->method;
        $vente->totale=$request->prix*$request->quantite;
        $vente->save();
        return back();
    }
    public function ticketvente($id)
    {
        $vente=Vente::find($id);
        $store=Store::find(1);
        return view('ventes.ticket',['vente'=>$vente,'store'=>$store]);
    }
}
