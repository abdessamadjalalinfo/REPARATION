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
                                  <li><a class="dropdown-item" href="{{route('addcheck')}}">Add Check</a></li>
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
</div>
<div class="container">
<div class="row">
    <div class="col-4">
    <form action="{{route('addingmarque')}}">
    <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Categorie</label>
                <select name="categorie_id"  class="form-select"id="modeleSelect">
                @foreach($categories as $categorie)
                <option value="{{$categorie->id}}">{{$categorie->nom}}</option>
            @endforeach    
    </select> 
    </div>
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Marque</label>
    <input name="nom" type="text" class="form-control" >
  </div>
  
  
  <button type="submit" class="btn btn-primary">Add</button>
</form>
    </div>
    <div class="col-8">
        <h6>Marque</h6>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Categorie</th>
      <th scope="col">Mark</th>
      <th scope="col">número de ventas</th>
      <th scope="col">Número de reparación</th>
      <th scope="col">Option</th>
      
      
    </tr>
  </thead>
  <tbody>
    @foreach($marques as $marque)
  <tr>
      <th scope="row">{{$marque->id}}</th>
      <td scope="row">
      {{App\Models\Categorie::find($marque->categorie_id)->nom}}  
      </td>
      <td>{{$marque->nom}}</td>
      <td>{{$marque->ventes()->count()}}</td>
      <td>{{$marque->reparations()->count()}}</td>
      <td>
        
        @if($marque->reparations()->count() +$marque->ventes()->count()  ==0)

        <a class="btn btn-danger"  href="{{route('deletemarques',$marque->id)}}"><i class="fa-solid fa-x"></i></a>
        @endif
        
      </td>
      
    </tr>
    @endforeach
  </tbody>
</table>
    </div>
</div>
</div>
@endsection
