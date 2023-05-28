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
                                  <li><a class="dropdown-item" href="{{route('addcomponent')}}">Add Component</a></li>
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
    <div class="row justify-content-center">
<div class="row">
@if($errors->has('dni'))
                <span class="text-danger">
                    {{ $errors->first('dni') }}
                </span>
            @endif
<div class="col">
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap"><i class="fa-solid fa-plus"></i>
</button>
<br>
</div>
</div>
<br>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">nuevo cliente
</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('ajouterclient')}}">
          <div class="mb-3">
              <label for="recipient-name" class="col-form-label">Dni/Nie/Pasaporte:</label>
              <input name="dni"type="text" class="form-control" id="recipient-name">
            </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">apellido:</label>
            <input name="nom"type="text" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Nombre de pila:</label>
            <input name="prenom"type="text" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Email:</label>
            <input name="email" type="email" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">
Teléfono:</label>
            <input name="phone" type="text" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">DIRECCIÓN:</label>
            <input name="adresse" type="text" class="form-control" id="recipient-name">
          </div>
          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Agregar</button>
      </div>
        </form>
      </div>
      
    </div>
  </div>
</div>
<br>
    <div class="alert alert-primary" role="alert">
  Clientes
</div>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Dni/Nie/Pasaporte</th>
      <th scope="col">apellido</th>
      <th scope="col">Nombre de pila</th>
      <th scope="col">Email</th>
      <th scope="col">Teléfono</th>
      <th scope="col">DIRECCIÓN</th>
      <th scope="col">Opción</th>
    </tr>
  </thead>
  <tbody>
  @foreach($clients as $client) 
  <tr>
      <th scope="row">{{$client->dni}}</th>
      <td>{{$client->nom}}</td>
      <td>{{$client->prenom}}</td>
      <td>{{$client->email}}</td>
      <td>{{$client->phone}}</td>
      <td>{{$client->adresse}}</td>
      <td>
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#e{{$client->id}}" data-bs-whatever="@getbootstrap"><i class="fa-solid fa-pen-to-square"></i></button>

        <div class="modal fade" id="e{{$client->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">{{$client->nom}} {{$client->prenom}}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
              <form action="{{route('modifierclient')}}">
          <div class="mb-3">

            <label for="recipient-name" class="col-form-label">Dni/Nie/Pasaporte:</label>
            <input name="dni"type="text" value="{{$client->dni}}" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
          <input name="id"type="hidden" value="{{$client->id}}" class="form-control" id="recipient-name">

            <label for="recipient-name" class="col-form-label">apellido:</label>
            <input name="nom"type="text" value="{{$client->nom}}" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Nombre de pila:</label>
            <input name="prenom"type="text" value="{{$client->prenom}}"  class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Email:</label>
            <input name="email" type="email"value="{{$client->email}}"  class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Teléfono:</label>
            <input name="phone" type="text" value="{{$client->phone}}"  class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">DIRECCIÓN:</label>
            <input name="adresse" type="text" value="{{$client->adresse}}"  class="form-control" id="recipient-name">
          </div>
          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerca</button>
        <button type="submit" class="btn btn-primary">Editar</button>
      </div>
        </form>
              </div>
              
            </div>
          </div>
        </div>



      </td>
    </tr>
    @endforeach
    
  </tbody>
</table>



    </div>
    <div class=" col-6 pagination">
    {{ $clients->links() }}
</div>
</div>

@endsection
