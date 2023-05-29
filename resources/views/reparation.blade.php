<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
  
<div class="container">
    
    
    <br>

    <div class="alert alert-primary" role="alert">
  Reparations 
    </div>
    <div class="container row">
      @foreach($reparation->photos()->get() as $photo)
      <div class="card" style="width: 18rem;">
        <div class="col-1"> <img width="100" src="{{asset($photo->path)}}"></div>
      </div>
        @endforeach
    </div>
    <div class="container row">
        <div class="col-1"><a target="_blank"  href="{{route('ticket',$reparation->id)}}" class="btn btn-success"><i class="fa-regular fa-ticket"></i>Ticket</a></div>

    </div>
    <br>

<div class="row">
        
    
    <div class="col-6">
        <div class="card" style="">
            <div class="card-header">
            <i class="fa-regular fa-user"></i>Client 



            </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><i class="fa-solid fa-user"></i>Nom : {{$client->nom}} </li>
            <li class="list-group-item"><i class="fa-solid fa-user"></i>Prenom : {{$client->nom}}</li>
            <li class="list-group-item"><i class="fa-solid fa-passport"></i>Passeport :</li>
            <li class="list-group-item"><i class="fa-solid fa-envelope"></i>Email : {{$client->email}}</li>
            <li class="list-group-item"><i class="fa-solid fa-phone"></i>Phone : {{$client->phone}}
          
          </li>
            <li class="list-group-item"><i class="fa-solid fa-address-card"></i>Adresse : {{$client->adresse}}</li>
        </ul>
        </div>
        <br>
        
        
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
          <div class="col mb-3">
                                    <label for="recipient-name" class="col-form-label">premio de los componentes:</label>
                                    <input value="{{$reparation->price_components}}" name="price_components" type="number" class="form-control" id="recipient-name">
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
            <li class="list-group-item">ID : R-{{$reparation->id}} </li>

                <li class="list-group-item">Categorie : {{App\Models\Categorie::find($reparation->categorie_id)->nom}} </li>
                <li class="list-group-item">Marque : {{App\Models\Marque::find($reparation->marque_id)->nom}}</li>
                <li class="list-group-item">Modele : {{App\Models\Modele::find($reparation->model_id)->nom}}</li>
                <li class="list-group-item"><i class="fa-solid fa-barcode"></i>Code\IMEI : {{$reparation->code}}</li>
                <li class="list-group-item"><i class="fa-solid fa-tag"></i>Label : {{$reparation->label}}</li>
                <li class="list-group-item"><i class="fa-solid fa-comment"></i>Description : {{$reparation->description}}</li>
                <li class="list-group-item"><i class="fa-solid fa-calendar-days"></i>Date : {{$reparation->created_at}}</li>
                <li class="list-group-item"><i class="fa-solid fa-dollar-sign"></i>premio de los componentes : {{$reparation->price_components}} €</li>
                <li class="list-group-item"><i class="fa-solid fa-dollar-sign"></i>Prix : {{$reparation->prix}} €</li>

              </ul>
        </div>
    </div>

      
</div>    
    </div>
</div>

</body>
</html>  