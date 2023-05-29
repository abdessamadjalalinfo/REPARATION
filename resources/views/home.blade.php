@extends('layouts.app')
<style>
    
.icon {  
  float: right;
  font-size:500%;
  position: absolute;
  top:0rem;
  right:-0.3rem;
  opacity: .16;
}


#container
{
  width: 1200px;
  display: flex;
}

.grey-dark
{
  background: #495057;
  color: #efefef;
}

.red-gradient {
  background: linear-gradient(180deg, rgba(207,82,82,1) 0%, rgba(121,9,9,1) 80%);
  color: #fff;
}
.red {
  background: #a83b3b;
  color: #fff;
}


.purple
{
  background: #886ab5;
  color: #fff;
}

.orange {
  background: #ffc241;
  color: #fff;
}

.kpi-card
{
  overflow: hidden;
  position: relative;
  box-shadow: 1px 1px 3px rgba(0,0,0,0.75);;
  display: inline-block;
  float: left;
  padding: 1em;
  border-radius: 0.3em;
  font-family: sans-serif;  
  width: 240px;
  min-width: 180px;
  margin-left: 0.5em;
  margin-top: 0.5em;
}

.card-value {
  display: block;
  font-size: 200%;  
  font-weight: bolder;
}

.card-text {
  display:block;
  font-size: 70%;
  padding-left: 0.2em;
}

</style>    
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

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

    <div id="container">
@if(Auth::user()->type=="admin")
    <div class="kpi-card orange">
    <span class="card-value"> {{$somme_reparations}} € </span>
    
    <span class="card-text">
        Reparaciones totales</span>
     <i class="fas fa-shopping-cart icon"></i>
  </div>
 
 
    <div class="kpi-card purple">
    <span class="card-value">  {{$somme_ventes}} €</span>
    <span class="card-text">
Ventas totales</span>
       <i class="fas fa-shopping-cart icon"></i>
  </div>
  
      <div class="kpi-card grey-dark">
    <span class="card-value"> {{$nombre_clients}} </span>
    <span class="card-text">
Numero de clientes</span>
         <i class="fas fa-shopping-cart icon"></i>
  </div>
  
    <div class="kpi-card red">
    <span class="card-value">{{$somme_reparations + $somme_ventes}} € </span>
    <span class="card-text">
Facturación</span>
      <i class="fas fa-shopping-cart icon"></i>
  </div>
</div>
@endif
</div>
@endsection
