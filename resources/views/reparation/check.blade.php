@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Administrador</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   <div class="row">
                        
                        <div class="col">
                            <div class="dropdown">
                            <a class="btn btn-primary dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-screwdriver-wrench"></i>Reparaciones
                            </a>
                             <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{route('reparation.new')}}">
                                    Añadir una reparación</a></li>
                                <li><a class="dropdown-item" href="#">Lista de reparaciones</a></li>
                            
                              </ul>
                            </div>
                        </div>
                        <div class="col">
                            <div class="dropdown">
                            <a class="btn btn-primary dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-screwdriver-wrench"></i>Clientes
                            </a>
                             <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Lista de clientes</a></li>
                                
                            
                              </ul>
                            </div>
                        </div>

                        <div class="col">
                            <div class="dropdown">
                            <a class="btn btn-primary dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-screwdriver-wrench"></i>Ventas
                            </a>
                             <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Añadir una Ventas</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                            
                              </ul>
                            </div>
                        </div>
                        
                       
                       
                       


                   </div>
                </div>
            </div>
        </div>
    </div>
    
    <br>

    <div class="alert alert-primary" role="alert">
  Reparations
    </div>
    <div class="container row">
        <div class="col-1"><a href="#" class="btn btn-success"><i class="fa-solid fa-ticket"></i>Facture</a></div>
        <div class="col-1"><a href="#" class="btn btn-success"><i class="fa-regular fa-ticket"></i>Ticket</a></div>
    </div>
    <br>

<div class="row">
        
    
    <div class="col-6">
        <div class="card" style="">
            <div class="card-header">
            <i class="fa-regular fa-user"></i>Client
            </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><i class="fa-solid fa-user"></i>Nom : {{$client->nom}} </li>
            <li class="list-group-item"><i class="fa-solid fa-user"></i>Prenom : {{$client->nom}}</li>
            <li class="list-group-item"><i class="fa-solid fa-passport"></i>Passeport :</li>
            <li class="list-group-item"><i class="fa-solid fa-envelope"></i>Email : {{$client->email}}</li>
            <li class="list-group-item"><i class="fa-solid fa-phone"></i>Phone : {{$client->phone}}</li>
            <li class="list-group-item"><i class="fa-solid fa-address-card"></i>Adresse : {{$client->adresse}}</li>
        </ul>
        </div>
        <div class="card" style="">
            <div class="card-header">
                Checking
            </div>
        <ul class="list-group list-group-flush">
            @foreach($checks as $check)
            <li class="list-group-item"> <i style="color:green"class="fa-solid fa-check"></i>{{$check->description}}</li>
            @endforeach
        </ul>
        </div>
    </div>
    <div class="col-6">
        <div class="card" style="">
            <div class="card-header">
                Reparation
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Categorie : {{App\Models\Categorie::find($reparation->categorie_id)->nom}} </li>
                <li class="list-group-item">Marque : {{App\Models\Marque::find($reparation->marque_id)->nom}}</li>
                <li class="list-group-item">Modele : {{App\Models\Modele::find($reparation->model_id)->nom}}</li>
                <li class="list-group-item"><i class="fa-solid fa-barcode"></i>Code\IMEI : {{$reparation->code}}</li>
                <li class="list-group-item"><i class="fa-solid fa-tag"></i>Label : {{$reparation->label}}</li>
                <li class="list-group-item"><i class="fa-solid fa-comment"></i>Description : {{$reparation->description}}</li>
                <li class="list-group-item"><i class="fa-solid fa-calendar-days"></i>Date : {{$reparation->created_at}}</li>
                <li class="list-group-item"><i class="fa-solid fa-dollar-sign"></i>Prix : {{$reparation->prix}}</li>
            </ul>
        </div>
    </div>

    <div class="col-6">
        
    </div>    
</div>    
    </div>
</div>
@endsection
