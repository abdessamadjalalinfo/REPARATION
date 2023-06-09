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
    <form action="{{route('addingmodele')}}">
    <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Categorie</label>
                <select id="categorie"  name="categorie_id"  class="form-select">
                @foreach($categories as $categorie)
                <option value="{{$categorie->id}}">{{$categorie->nom}}</option>
                 @endforeach    
            </select> 
    </div>
    <div class="mb-3">
    
    <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Modèle:</label>
                                    <select name="mrk"  class="form-select" id="sousCategorieSelect">
                                        <option value="">Sélectionnez le modèle</option>
                                    </select> 
    </div>
                                <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Marque</label>
    <input name="nom" type="text" class="form-control" >
  </div>
  </div>
  
  
  <button type="submit" class="btn btn-primary">Add</button>
</form>
    </div>
    <div class="col-8">
        <h6>Modele</h6>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Categorie</th>
      <th scope="col">Mark</th>
      <th scope="col">Modele</th>
      
      <th scope="col">número de ventas</th>
      <th scope="col">Número de reparación</th>
      <th scope="col">Option</th>
     
      
    </tr>
  </thead>
  <tbody>
    @foreach($modeles as $modele)
  <tr>
      <th scope="row">{{$modele->id}}</th>
      <td>{{$modele->marque->categorie->nom}}</td>
      <td>{{$modele->marque->nom}}</td>
      <td>{{$modele->nom}}</td>
      <td>{{$modele->ventes()->count()}}</td>
      <td>{{$modele->reparations()->count()}}</td>
      <td>
      @if($modele->reparations()->count() +$modele->ventes()->count()  ==0)

        <a class="btn btn-danger"  href="{{route('deletemodele',$modele->id)}}"><i class="fa-solid fa-x"></i></a>
        @else
        <a disabled class="btn btn-danger"  href="#">no puedes borrar</a>

        @endif
        </td>
      
      
    </tr>
    @endforeach
  </tbody>
</table>
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
@endsection
