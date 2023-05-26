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
                                  <i class="fa-solid fa-plus"></i>Añadir una reparación</a></li>
                                  <li><a class="dropdown-item" href="{{route('listereparation')}}"><i class="fa-solid fa-list"></i>Lista de reparaciones</a></li>
                              
                                </ul>
                              </div>
                          </div>
                          <div class="col">
                              <div class="dropdown">
                              <a class="btn btn-primary dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              <i class="fa-solid fa-users"></i>Clientes
                              </a>
                              <ul class="dropdown-menu">
                                  <li><a class="dropdown-item" href="{{route('clients')}}"><i class="fa-solid fa-list"></i>Lista de clientes</a></li>
                                  
                              
                                </ul>
                              </div>
                          </div>

                          <div class="col">
                              <div class="dropdown">
                              <a class="btn btn-primary dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              <i class="fa-solid fa-cash-register"></i>Ventas
                              </a>
                              <ul class="dropdown-menu">
                                  <li><a class="dropdown-item" href="{{route('ajoutervente')}}"><i class="fa-solid fa-plus"></i>Añadir una Ventas</a></li>
                                  <li><a class="dropdown-item" href="{{route('listeventes')}}"><i class="fa-solid fa-list"></i>Lista ventes</a></li>
                              
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
                                  @if(Auth::user()->type=="admin")
                                  <li><a class="dropdown-item" href="{{route('updatestore')}}"><i class="fa-solid fa-store"></i>Update store</a></li>
                                  <li><a class="dropdown-item" href="{{route('users')}}"><i class="fa-solid fa-users"></i>Users</a></li>
                                  @endif
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
    <th scope="col">Cliente</th>
      <th scope="col">Categoría</th>
      <th scope="col">Marca</th>
      <th scope="col">Modelo</th>
      <th scope="col">etiqueta</th>
     
      <th scope="col">Precio unitario</th>
      <th scope="col">Cantidad</th>
      <th scope="col">Total</th>
      <th scope="col">Método</th>
      <th scope="col">Fecha</th>
      <th scope="col">Opción</th>
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
      <td>{{$vente->methode}}</td>
      <td>{{$vente->created_at}}</td>
      <td> 
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#e{{$vente->id}}" data-bs-whatever="@getbootstrap"><i class="fa-solid fa-pen-to-square"></i></button>

<div class="modal fade" id="e{{$vente->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">{{App\Models\Categorie::find($vente->categorie_id)->nom}} : {{App\Models\Marque::find($vente->marque_id)->nom}} {{App\Models\Modele::find($vente->model_id)->nom}}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('editvente')}}">
        <input value="{{$vente->id}}"type="hidden" name="id" class="form-control" id="recipient-name">

        <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Quantite:</label>
            <input value="{{$vente->quantite}}"type="number" name="quantite" class="form-control" id="recipient-name">
          </div>  
        <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Prix:</label>
            <input value="{{$vente->prix}}"type="number" name="prix" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Methode de paiement:</label>
            <select class="form-select" name="method" id="categorie" >
                                    
                                    <option value="cash" selected>Cash</option>
                                    <option value="carte" selected>Carte</option>
                                    <option value="paypal" selected>Paypal</option>

                                    
                                    
                                </select>           </div>
                                <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">edit</button>
      </div>
        </form>
      </div>
      
    </div>
  </div>
</div>
        <a href="{{route('deletevente',$vente->id)}}"class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
      
      </td>
      <td><a href="{{route('ticketvente',$vente->id)}}" target="_blank"><i class="fa-solid fa-ticket"></i></a></td>

    </tr>
    @endforeach
    
  </tbody>
</table>

{{ $ventes->render() }}
    </div>
</div>



@endsection
