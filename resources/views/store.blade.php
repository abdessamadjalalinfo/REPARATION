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
                                  <li><a class="dropdown-item" href="{{route('updatestore')}}">Update store</a></li>
                              
                                </ul>
                              </div>
                          </div>
                       
                       


                   </div>
                </div>
            </div>
            <div class="container">
                <br>
            <div style="text-align:center" class="alert alert-primary" role="alert">
            Update your store
            </div>
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <strong>{{$message}}</strong>
            </div>

            <img src="{{ asset('images/'.Session::get('image')) }}" />
                @endif
            <form method="post" action="{{ route('update.store') }}" enctype="multipart/form-data">        
                    <div class="row">
                        @csrf
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Nombre social</label>
                                <input value="{{$store->nombre_social}}" name="nombre_social" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">CIF/NIF</label>
                                <input value="{{$store->cif}}" name="cif" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Direccion</label>
                                <input value="{{$store->direction}}" name="direction" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Localidad</label>
                                <input value="{{$store->localisation}}" name="localisation" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Codigo Postal</label>
                                <input name="zip" value="{{$store->zip}}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                        </div>
                        <div class="col-6">
                            
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Pais</label>
                                <input value="{{$store->pays}}" name="pays" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">telepono</label>
                                <input value="{{$store->phone}}" name="phone" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">sitio web</label>
                                <input name="site" value="{{$store->site}}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Whatssap</label>
                                <input name="whatssap" value="{{$store->whatssap}}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email</label>
                                <input name="email" value="{{$store->email}}" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Logo</label>
                                <input name="image" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                        </div>   
                       
                       
                        
                        
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                
            </div>
        </div>
    </div>
</div>

@endsection
