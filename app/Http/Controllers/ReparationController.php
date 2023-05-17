<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ReparationController extends Controller
{
    public function index()
    {
        $clients=Client::all();

        return view("reparation.new",['clients'=>$clients]);
    }
    public function clients()
    {
        $clients=Client::all();
        return view("clients.clients",['clients'=>$clients]);
    }
    public function ajouterclient(Request $req)
    {
        $client=new Client();
        $client->nom=$req->nom;
        $client->prenom=$req->prenom;
        $client->email=$req->email;
        $client->phone=$req->phone;
        $client->adresse=$req->adresse;
        $client->save();
        return back();

    }
}
