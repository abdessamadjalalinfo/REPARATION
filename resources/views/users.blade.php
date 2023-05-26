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





<br>
    <div class="alert alert-primary" role="alert">
  Users
</div>
    <table class="table">
  <thead>
    <tr>
    <th scope="col">Nombre</th>
      <th scope="col">Correo electrónico</th>
      <th scope="col">Tipo</th>
      <th scope="col">Creado_en</th>
      <th scope="col">Opción</th>
     
    </tr>
  </thead>
  <tbody>
  @foreach($users as $user) 
  <tr>
      <th scope="row">{{$user->name}}</th>
      <td>{{$user->email}}</td>
      <td>{{$user->type}}</td>
      <td>{{$user->created_at}}</td>
      <td>
      @if($user->type=="admin" && $user->id != Auth::user()->id)
      <a class="btn btn-warning"href="{{route('admin',$user->id)}}">hacer normal</a>
      @endif
      @if($user->type=="normal" && $user->id != Auth::user()->id)
      <a class="btn btn-danger"href="{{route('admin',$user->id)}}">hacer administrador</a>
      @endif
     
    </td>
     
     
    </tr>
    @endforeach
    
  </tbody>
</table>



    </div>
    <div class=" col-6 pagination">
    {{ $users->links() }}
</div>
</div>

@endsection
