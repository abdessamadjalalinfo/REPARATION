@extends('layouts.app')
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

@section('content')
<style>
.myDiv{
	display:none;
    
} 
</style>
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
    <br>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h1>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    </h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Reparaciones</div>
                    @if($errors->has('dni'))
                <span class="text-danger">
                    {{ $errors->first('dni') }}
                </span>
            @endif
                    <div class="card-body">
                    <form enctype="multipart/form-data" action='{{route('ajouterreparation')}}' method="post">
                    @csrf
                        <div class="mb-3">
                        <div class="form-check">
                            <input   class="form-check-input" type="radio" name="client" id="anonyme" value="anonyme" checked>
                            <label class="form-check-label" >
                            anónimo
                            </label>
                        </div>
                        <div class="form-check">
                            <input  class="form-check-input" type="radio" name="client" id="nouveau" value="nouveau">
                            <label  class="form-check-label" >
                            Crear cliente

                            </label>
                            
                        </div>
                        <div class="form-check">
                            <input  class="form-check-input" type="radio" name="client" id="existe" value="existe">
                            <label  class="form-check-label" >
                            Cliente existente
                            </label>
                        </div>
                        </div>
                        <div id="shownouveau" style="display:none" class="myDiv">
                       
                            <div class="row">
                                <div class="col">
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Dni/Nie/Pasaporte:</label>
                                    <input name="dni"type="text" class="form-control" id="recipient-name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">apellido:</label>
                                        <input name="nom"type="text" class="form-control" id="recipient-name">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">Nombre de pila:</label>
                                        <input name="prenom"type="text" class="form-control" id="recipient-name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label">Email:</label>
                                            <input name="email" type="email" class="form-control" id="recipient-name">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">Teléfono:</label>
                                        <input name="phone" type="text" class="form-control" id="recipient-name">
                                    </div>
                                </div>
                            </div>
                           
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">DIRECCIÓN:</label>
                                <input name="adresse" type="text" class="form-control" id="recipient-name">
                            </div>
          
      
                        </div>
                        <div  style="display:none"  id="showexiste" class="myDiv">
                            <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Por favor elige:</label>
                            <select name="id_client" class="form-select" aria-label="Default select example">
                                @foreach($clients as $client)
                                <option value="{{$client->id}}" selected>{{$client->nom}} {{$client->prenom}}</option>
                                
                                @endforeach
                            </select>   
                            </div>


                        </div>
                        <div class="alert alert-secondary" role="alert">
                        Reparation
                        </div>
                        
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Fraseología:</label>
                                    <input name="label" type="text" class="form-control" id="recipient-name">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Descripción:</label>
                                    <input name="description" type="text" class="form-control" id="recipient-name">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">Categoría:</label>
                                        <select class="form-select" name="categorie" id="categorie" >
                                    @foreach($categories as $categorie)
                                    <option value="{{$categorie->id}}" selected>{{$categorie->nom}}</option>
                                    
                                    @endforeach
                                </select> 
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Marca:</label>
                                    <select name="marque_id"  class="form-select"id="sousCategorieSelect">
                                        <option value="">Sélectionnez une sous-catégorie</option>
                                    </select>             
                                </div>
                            </div>
                            </div>
                            <div class="row">
                            <div class="col">
                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">Modelo:</label>
                                        <select name="modele"  class="form-select"id="modeleSelect">
                                            <option value="">Seleccionar modelo</option>
                                        </select> 
                                    </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Code/IMEI:</label>
                                    <input name="code" type="text" class="form-control" id="recipient-name">
                                </div>
                            </div>
                        </div>
                        <div class="alert alert-secondary" role="alert">
                          Fotos
                        </div>
                        <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Fotos:</label>
                                    <input name="images[]" multiple type="file" class="form-control" id="recipient-name">
                        </div>
                        <div class="alert alert-secondary" role="alert">
                        Componentes 
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Componentes:</label>
                            <select name="components[]" multiple class="form-control" >
                               
                                @foreach($components as $component)
                            <option value="{{$component->id}}" selected>{{$component->nom}}</option>
                                @endforeach
                               
                            </select>   
                        </div>
                        <div class="alert alert-secondary" role="alert">
                        Comprobación
                        </div>
                        <div class="row">
                            <div class="col">
                            <input class="form-check-input" type="checkbox" name="check[]"value="Battery" id="flexCheckDefault">
  <label class="form-check-label" for="flexCheckDefault">
  Battery
  </label>
                            </div>
                            <div class="col">
                            <input class="form-check-input" type="checkbox"  name="check[]"value="Screen" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                            pantalla
                            </label>
                            </div>
                            <div class="col">
                            <input class="form-check-input" type="checkbox" name="check[]"value="Micro"id="flexCheckDefault">
  <label class="form-check-label" for="flexCheckDefault">
    Micro
  </label>
                            </div>
                            <div class="col">
                            <input class="form-check-input" type="checkbox" name="check[]"value="Camera"id="flexCheckDefault">
  <label class="form-check-label" for="flexCheckDefault">
Camera
  </label>
                            </div>
                        </div> 
                         
                        
                        <div class="col mb-3">
                                    <label for="recipient-name" class="col-form-label">Premio:</label>
                                    <input name="prix" type="number" class="form-control" id="recipient-name">
                        </div>
                        
                       
                        <button type="submit" class="btn btn-primary">Agregar</button>
                    </form>
                    


                </div> 
                </div>
                  
        </div>
    </div>
</div>

<script>
 $(document).ready(function() {
    $('input:radio[name=client]').change(function() {
        var demovalue = $(this).val();
        if (this.value == 'anonyme') {
            
            $("div.myDiv").hide();
            
        }
        else if (this.value == 'nouveau') {
            
            $("div.myDiv").hide();
            $("#show"+demovalue).show();
        }
        if (this.value == 'existe') {
            
            $("div.myDiv").hide();
            $("#show"+demovalue).show();
        }
    });
});
    </script>

<script>
    $(document).ready(function() {
      $('#categorie').change(function() {
        var categorieId = $(this).val();
        console.log(categorieId);

        // Faire une requête AJAX vers le serveur Laravel
        $.ajax({
          url: '{{route('marque')}}', // URL de la route Laravel qui renvoie les sous-catégories
          type: 'POST',
          data: {
            "categorieId": categorieId,
            "_token": "{{ csrf_token() }}"
        },
          success: function(response) {
            // Supprimer les anciennes options
            $('#sousCategorieSelect').empty();

            // Ajouter les nouvelles options en fonction de la réponse du serveur
            if (response.length > 0) {
              $.each(response, function(key, value) {
                $('#sousCategorieSelect').append('<option value="' + value.id + '">' + value.nom + '</option>');
              });
            } else {
              $('#sousCategorieSelect').append('<option  value="">Aucune sous-catégorie disponible</option>');
            }
          }
        });
      });
    });
  </script>



<script>
    $(document).ready(function() {
      $('#sousCategorieSelect').change(function() {
        var marqueId = $(this).val();
        console.log(marqueId);
        console.log("h");

        // Faire une requête AJAX vers le serveur Laravel
        $.ajax({
          url: '{{route('modele')}}', // URL de la route Laravel qui renvoie les sous-catégories
          type: 'POST',
          data: {
            "marqueId": marqueId,
            "_token": "{{ csrf_token() }}"
        },
          success: function(response) {
            // Supprimer les anciennes options
            $('#modeleSelect').empty();

            // Ajouter les nouvelles options en fonction de la réponse du serveur
            if (response.length > 0) {
              $.each(response, function(key, value) {
                $('#modeleSelect').append('<option value="' + value.id + '">' + value.nom + '</option>');
              });
            } else {
              $('#modeleSelect').append('<option  value="">Aucun modele disponible</option>');
            }
          }
        });
      });
    });
  </script>
@endsection
