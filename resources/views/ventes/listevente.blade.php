@extends('layouts.app')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
                                  <li><a class="dropdown-item" href="{{route('listereparation')}}">Lista de reparaciones</a></li>
                              
                                </ul>
                              </div>
                          </div>
                          <div class="col">
                              <div class="dropdown">
                              <a class="btn btn-primary dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              <i class="fa-solid fa-screwdriver-wrench"></i>Clientes
                              </a>
                              <ul class="dropdown-menu">
                                  <li><a class="dropdown-item" href="{{route('clients')}}">Lista de clientes</a></li>
                                  
                              
                                </ul>
                              </div>
                          </div>

                          <div class="col">
                              <div class="dropdown">
                              <a class="btn btn-primary dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              <i class="fa-solid fa-screwdriver-wrench"></i>Ventas
                              </a>
                              <ul class="dropdown-menu">
                                  <li><a class="dropdown-item" href="{{route('ajoutervente')}}">Añadir una Ventas</a></li>
                                  <li><a class="dropdown-item" href="#">Another action</a></li>
                              
                                </ul>
                              </div>
                          </div>
                          
                          <div class="col">
                              <div class="dropdown">
                              <a class="btn btn-primary dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              <i class="fa-solid fa-screwdriver-wrench"></i>Configure
                              </a>
                              <ul class="dropdown-menu">
                                  <li><a class="dropdown-item" href="{{route('addcategorie')}}">Add Catégorie</a></li>
                                  <li><a class="dropdown-item" href="{{route('addmarque')}}">Add Marque</a></li>
                                  <li><a class="dropdown-item" href="{{route('addmodele')}}">Add Modele</a></li>
                              
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
  Ventes
</div>

    <table class="table">
  <thead>
    <tr>
      <th scope="col">Client</th>
      <th scope="col">Categorie</th>
      <th scope="col">Marque</th>
      <th scope="col">Modele</th>
      <th scope="col">label</th>
     
      <th scope="col">Prix Unitaire</th>
      <th scope="col">Quantité</th>
      <th scope="col">Totale</th>
      <th scope="col">Date</th>
      <th scope="col">Option</th>
    </tr>
  </thead>
  <tbody>
  @foreach($ventes as $vente) 
  <tr>
      <th scope="row">{{App\Models\Client::find($vente->client_id)->dni}}: {{App\Models\Client::find($vente->client_id)->nom}} {{App\Models\Client::find($vente->client_id)->prenom}}</th>
      <td>{{App\Models\Categorie::find($vente->categorie_id)->nom}}</td>
      <td>{{App\Models\Marque::find($vente->marque_id)->nom}}</td>
      <td>{{App\Models\Modele::find($vente->model_id)->nom}}</td>
      <td>{{$vente->label}}</td>
      
        </td>
      </td>
      <td>{{$vente->prix}}</td>
      <td>{{$vente->quantite}}</td>
      <td>{{$vente->totale}}</td>
      <td>{{$vente->created_at}}</td>
      <td> 
        <a href="{{route('checkreparation',$vente->id)}}"class="btn btn-success"><i class="fa-solid fa-magnifying-glass"></i></a>
        <a href="{{route('deletevente',$vente->id)}}"class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
      
      </td>

    </tr>
    @endforeach
    
  </tbody>
</table>
    </div>
</div>



@endsection
