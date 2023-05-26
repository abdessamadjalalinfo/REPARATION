<?php

namespace App\Http\Controllers;

use App\Models\Component;
use App\Models\Historique;
use App\Models\Photo;
use App\Models\Reparation;
use App\Models\ReparationCheck;
use App\Models\ReparationCompo;
use App\Models\Store;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Categorie;
use App\Models\Marque;
use App\Models\Modele;
use Illuminate\Validation\Rule;


class ReparationController extends Controller
{
    public function index()
    {
        $clients=Client::all();
        $categories=Categorie::all();
        $components=Component::all();

        return view("reparation.new",['clients'=>$clients,
        'categories'=>$categories,
        'components'=>$components
    ]);
    }
    public function clients()
    {
        $clients=Client::Paginate(20);
        return view("clients.clients",['clients'=>$clients]);
    }
    public function ajouterclient(Request $req)
    {
        $req->validate([
            'dni' => [
                'required',
                Rule::unique('clients')->where(function ($query) use ($req) {
                    return $query->where('dni', $req->dni);
                }),
            ],
        ], [
            'dni' => 'La valeur saisie est déjà utilisée.',
        ]);
        
        $client=new Client();
        $client->nom=$req->nom;
        $client->dni=$req->dni;
        $client->prenom=$req->prenom;
        $client->email=$req->email;
        $client->phone=$req->phone;
        $client->adresse=$req->adresse;
        $client->save();
        return back();

    }
    public function modifierclient(Request $req)
    {
        $req->validate([
            'dni' => [
                'required',
                Rule::unique('clients')->where(function ($query) use ($req) {
                    return $query->where('dni', $req->dni);
                }),
            ],
        ], [
            'dni' => 'La valeur saisie est déjà utilisée.',
        ]);
        $client=Client::find($req->id);
        $client->nom=$req->nom;
        $client->dni=$req->dni;
        $client->prenom=$req->prenom;
        $client->email=$req->email;
        $client->phone=$req->phone;
        $client->adresse=$req->adresse;
        $client->save();
        return back();

    }
    public function update(Request $request, $id)
    {
        $reparation = Reparation::findOrFail($id);
        $reparation->status = $request->input('valeur');
        $historique=new Historique();
        $historique->status=$request->input('valeur');
        $historique->reparation_id=$reparation->id;
        $historique->save();
        $reparation->save();

        return response()->json(['success' => true]);
    }
    public function modifierreparation(Request $request)
    {
        $reparation=Reparation::find($request->id);
        $reparation->categorie_id=$request->categorie;
        $reparation->marque_id=$request->marque_id;
        $reparation->model_id=$request->modele;
        $reparation->code=$request->code;
        $reparation->description=$request->description;
        $reparation->prix=$request->prix;
        $reparation->save();
        return back();
    }



    public function ajouterreparation(Request $request)
    {
        $request->validate([
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $reparation=new Reparation();
        if($request->client=="anonyme")
        {
            $reparation->label=$request->label;
            $reparation->client_id=1;
            $reparation->categorie_id=$request->categorie;
            $reparation->marque_id=$request->marque_id;
            $reparation->model_id=$request->modele;
            $reparation->code=$request->code;
            $reparation->description=$request->description;
            $reparation->prix=$request->prix;
            $reparation->save();
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
            $reparation->label=$request->label;
            $reparation->client_id=$client->id;
            $reparation->categorie_id=$request->categorie;
            $reparation->marque_id=$request->marque;
            $reparation->model_id=$request->modele;
            $reparation->code=$request->code;
            $reparation->description=$request->description;
            $reparation->prix=$request->prix;
            $reparation->save();
        }
        if($request->client=="existe")
        {

            $reparation->label=$request->label;
            $reparation->client_id=$request->id_client;
            $reparation->categorie_id=$request->categorie;
            $reparation->marque_id=$request->marque;
            $reparation->model_id=$request->modele;
            $reparation->code=$request->code;
            $reparation->description=$request->description;
            $reparation->prix=$request->prix;
            $reparation->save();
        }
        foreach($request->components as $x){
            $component=new ReparationCompo();
            $component->component_id=$x;
            $component->reparation_id=$reparation->id;
            $component->save();
        }
            
        $historique=new Historique();
        $historique->status="reparation";
        $historique->reparation_id=$reparation->id;
        $historique->save();

        foreach($request->check as $check)
        {
            $chec=new ReparationCheck();
            $chec->description=$check;
            $chec->reparation_id=$reparation->id;
            $chec->save();
        }
        if ($request->hasFile('images')) {
            $uploadedImages = [];
    
            foreach ($request->file('images') as $imageFile) {
                $imageName = time() . '_' . $imageFile->getClientOriginalName();
                $imagePath = $imageFile->move( 'images', $imageName,);
    
                $image = Photo::create([
                    'reparation_id' => 1,
                    'path' => $imagePath,
                ]);
    
                $uploadedImages[] = $image;
            }
            return redirect()->back()->with('success', 'Les images ont été uploadées avec succès !');
        }
        return redirect()->back()->with('error', 'Une erreur s\'est produite lors de l\'upload des images.');

    }

    public function marque(Request $req)
    {
        $categorieId = $req->input('categorieId');
        $sousCategories = Marque::where('categorie_id', $categorieId)->get();
        return response()->json($sousCategories);
    }
    public function modele(Request $req)
    {
        $marqueId = $req->input('marqueId');
        $modeles = Modele::where('marque_id', $marqueId)->get();
        return response()->json($modeles);
    }

    public function listereparation()
    {
        $reparations=Reparation::paginate(15);
        return view('reparation.listereparation',['reparations'=>$reparations]);
    }

    public function checkreparation($id)
    {
        $reparation=Reparation::find($id);
        $client=Client::find($reparation->client_id);
        $photos=Photo::where('reparation_id',$reparation->id)->get();
        $checks=ReparationCheck::where('reparation_id',$reparation->id)->get();
        $components=ReparationCheck::where('reparation_id',$reparation->id)->get();
        $status=Historique::where('reparation_id',$reparation->id)->get();
        $categories=Categorie::all();
        return view('reparation.check',
    [
        'client'=>$client,
        'reparation'=>$reparation,
        'photos'=>$photos,
        'checks'=>$checks,
        'components'=>$components,
        'status'=>$status,
        'categories'=>$categories
    ]);
    }

    public function addcategorie()
    {
        $categories=Categorie::all();
        return view('addcategorie',['categories'=>$categories]);
    }
    public function addingcategorie(Request $r)
    {
        $categorie=new Categorie();
        $categorie->nom=$r->nom;
        $categorie->save();
        return back();
    }
    public function addmarque()
    {
        $marques=Marque::all();
        $categories=Categorie::all();
        return view('addmarque',['marques'=>$marques,'categories'=>$categories]);
    }
    public function updatestore()
    {
        $store=Store::find(1);
        
        return view('store',['store'=>$store]);
   

    }
    public function addingmarque(Request $r)
    {
        $marque=new Marque();
        $marque->nom=$r->nom;
        $marque->categorie_id=$r->categorie_id;

        $marque->save();
        return back();
    }
    public function addmodele(Request $r)
    {
        $categories=Categorie::all();
        $marques=Marque::all();
        $modeles=Modele::all();
        return view('addmodele',['categories'=>$categories,'marques'=>$marques,"modeles"=>$modeles]);
    }
    public function addingmodele(Request $r)
    {
        $modele=new Modele();
        $modele->nom=$r->nom;
        $modele->marque_id=$r->mrk;

        $modele->save();
        return back();
    }

    public function deletereparation($id)
    {
        $historiques=Historique::where('reparation_id',$id)->get();
        foreach($historiques as $historique)
        {
            $historique->delete();
        }
        $photos=Photo::where('reparation_id',$id)->get();
        foreach($photos as $photo)
        {
            $photo->delete();
        }

        $checks=ReparationCheck::where('reparation_id',$id)->get();
        foreach($checks as $check)
        {
            $check->delete();
        }
        $components=ReparationCompo::where('reparation_id',$id)->get();
        foreach($components as $component)
        {
            $component->delete();
        }
        $reparation=Reparation::find($id);
        $reparation->delete();
        return back();
    }

    public function etiquette($id)
    {
        $reparation=Reparation::find($id);
        return view('etiquette',['reparation'=>$reparation]);
    }
    public function facture($id)
    {   $reparation=Reparation::find($id);
        $checks=ReparationCheck::where('reparation_id',$reparation->id)->get();
        $store=Store::find(1);
        

        return view('facture',['reparation'=>$reparation,'checks'=>$checks,'store'=>$store]);

    }
    public function ticket($id)
    {
        $store=Store::find(1);
        $reparation=Reparation::find($id);
        $checks=ReparationCheck::where('reparation_id',$reparation->id)->get();

        return view('ticket',['reparation'=>$reparation,'checks'=>$checks,'store'=>$store]);
    }

    public function whatssap(Request $request)
    {
        return redirect("https://wa.me/".$request->phone."/?text=".$request->message);
    }

    public function update_store(Request $request)
    {
        
        $store=Store::find(1);
        $store->nombre_social=$request->nombre_social;
        $store->cif=$request->cif;

        $store->direction=$request->direction;
        $store->localisation=$request->localisation;
        $store->zip=$request->zip;

        $store->pays=$request->pays;
        $store->phone=$request->phone;
        $store->site=$request->site;
        $store->whatssap=$request->whatssap;
        $store->email=$request->email;
        if($request->image)
        {
            $request->validate([
                'image' => 'required|image|mimes:png,jpg,jpeg|max:2048'
            ]);
    
            $imageName = time().'.'.$request->image->extension();
    
            // Public Folder
            $request->image->move(public_path('images'), $imageName);
    
            
            $store->logo=$imageName;
            $store->save();
            return back()->with('success', 'Updated')->with('image', $imageName);
        }
        
        $store->save();
        return back()->with('success', 'Updated')->with('image', $store->logo);;
    }
    public function users()
    {
        $users=User::Paginate(20);
        return view("users",['users'=>$users]);
    }
    public function admin($id)
    {
        $user=User::find($id);
        if($user->type=="admin")
        {
            $user->type="normal";
            $user->save();
            return back();
        }
        if($user->type=="normal")
        {
            $user->type="admin";
            $user->save();
            return back();
        }
    }
    public function deleteuser($id)
    {
        $user=User::find($id);
       
        $user->delete();
        return back();
    }
}
