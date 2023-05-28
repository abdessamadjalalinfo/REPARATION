@extends('layouts.app')
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
    
    <br>

    <div class="alert alert-primary" role="alert">
  Reparations
    </div>
    <div class="container row">
        <div class="col-1"><a href="{{route('facture',$reparation->id)}}" target="_blank" class="btn btn-success"><i class="fa-solid fa-ticket"></i>Facture</a></div>
        <div class="col-1"><a target="_blank"  href="{{route('ticket',$reparation->id)}}" class="btn btn-success"><i class="fa-regular fa-ticket"></i>Ticket</a></div>
        <div class="col-1"><a target="_blank" href="{{route('etiquette',$reparation->id)}}" class="btn btn-success"><i class="fa-solid fa-qrcode"></i>Etiqueta_R</a></div>
    </div>
    <br>

<div class="row">
        
    
    <div class="col-6">
        <div class="card" style="">
            <div class="card-header">
            <i class="fa-regular fa-user"></i>Client <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#e{{$client->id}}" data-bs-whatever="@getbootstrap"><i class="fa-solid fa-pen-to-square"></i></button>

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
  <input name="id"type="hidden" value="{{$client->id}}" class="form-control" id="recipient-name">

    <label for="recipient-name" class="col-form-label">Nom:</label>
    <input name="nom"type="text" value="{{$client->nom}}" class="form-control" id="recipient-name">
  </div>
  <div class="mb-3">
    <label for="recipient-name" class="col-form-label">Prenom:</label>
    <input name="prenom"type="text" value="{{$client->prenom}}"  class="form-control" id="recipient-name">
  </div>
  <div class="mb-3">
    <label for="recipient-name" class="col-form-label">Email:</label>
    <input name="email" type="email"value="{{$client->email}}"  class="form-control" id="recipient-name">
  </div>
  <div class="mb-3">
    <label for="recipient-name" class="col-form-label">Phone:</label>
    <input name="phone" type="text" value="{{$client->phone}}"  class="form-control" id="recipient-name">
  </div>
  <div class="mb-3">
    <label for="recipient-name" class="col-form-label">Adresse:</label>
    <input name="adresse" type="text" value="{{$client->adresse}}"  class="form-control" id="recipient-name">
  </div>
  <div class="modal-footer">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
<button type="submit" class="btn btn-primary">Modifier</button>
</div>
</form>
      </div>
      
      
    </div>
    
  </div>
</div>


            </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><i class="fa-solid fa-user"></i>Nom : {{$client->nom}} </li>
            <li class="list-group-item"><i class="fa-solid fa-user"></i>Prenom : {{$client->nom}}</li>
            <li class="list-group-item"><i class="fa-solid fa-passport"></i>Passeport :</li>
            <li class="list-group-item"><i class="fa-solid fa-envelope"></i>Email : {{$client->email}}</li>
            <li class="list-group-item"><i class="fa-solid fa-phone"></i>Phone : {{$client->phone}}
          
            <form action="{{route('whatssap')}}">
  <div class="mb-3">
  <input type="hidden" class="form-control" name="phone" value="{{$client->phone}}">
  
  <label for="exampleInputEmail1" class="form-label">Message Whatssap</label>
    <input type="text" class="form-control" name="message">
  </div>
  <button type="submit" class="btn btn-primary"><i class="fa-brands fa-whatsapp"></i></button>
</form >
          </li>
            <li class="list-group-item"><i class="fa-solid fa-address-card"></i>Adresse : {{$client->adresse}}</li>
        </ul>
        </div>
        <br>
        
        <div class="card" style="">
            <div class="card-header">
                Component 
            </div>
            <ul class="list-group list-group-flush">
                @foreach($components as $component)
                <li class="list-group-item"> <i style="color:green"class="fa-solid fa-check"></i>{{App\Models\Component::find($component->component_id)->nom}}
              <a href="{{route('deletecomponent',$component->component_id)}}" class="btn btn-danger">-</a>
              </li>
                @endforeach
            </ul>
        </div>
        <br>

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
        <br>
        <div class="card" style="">
            <div class="card-header">
                Status
            </div>
            <ul class="list-group list-group-flush">
                @foreach($status as $stat)
                <li class="list-group-item"> <i style="color:green"class="fa-solid fa-check"></i>{{$stat->created_at}} :{{$stat->status}}</li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="col-6">
        <div class="card" style="">
            <div class="card-header">
                Reparation
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#c{{$client->id}}" data-bs-whatever="@getbootstrap"><i class="fa-solid fa-pen-to-square"></i></button>

        <div class="modal fade" id="c{{$client->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">{{$reparation->label}}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
              <form action="{{route('modifierreparation')}}">
          <div class="mb-3">
          <input name="id"type="hidden" value="{{$reparation->id}}" class="form-control" id="recipient-name">

            <label for="recipient-name" class="col-form-label">Label:</label>
            <input name="label"type="text" value="{{$reparation->label}}" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">

            <label for="recipient-name" class="col-form-label">Prix:</label>
            <input name="prix"type="text" value="{{$reparation->prix}}" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">

                <label for="recipient-name" class="col-form-label">Description:</label>
                <input name="description"type="text" value="{{$reparation->description}}" class="form-control" id="recipient-name">
            </div>
            <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">Categorie:</label>
                                        <select class="form-select" name="categorie" id="categorie" >
                                    @foreach($categories as $categorie)
                                    <option value="{{$categorie->id}}" selected>{{$categorie->nom}}</option>
                                    
                                    @endforeach
                                </select> 
            </div>
            <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Marque:</label>
                                    <select name="marque_id"  class="form-select"id="sousCategorieSelect">
                                        <option value="{{$reparation->marque_id}}">{{App\Models\Marque::find($reparation->marque_id)->nom}}</option>
                                    </select>             
            </div>
            <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">Modèle:</label>
                                        <select name="modele"  class="form-select"id="modeleSelect">
                                            <option value="{{$reparation->model_id}}">{{App\Models\Modele::find($reparation->model_id)->nom}}</option>
                                        </select> 
            </div>
            <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Code/IMEI:</label>
                                    <input name="code" value="{{$reparation->code}}"type="text" class="form-control" id="recipient-name">
            </div>
          
          
          
          
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Modifier</button>
            </div>
        </form>
              </div>
              
            </div>
          </div>
        </div>


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

      
</div>    
    </div>
</div>


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
            $('#modeleSelect').empty();

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
