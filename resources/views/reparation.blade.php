<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
  
<div class="container">
    
    
    <br>

  
   
    <br>

<div class="row">
        
    
    <div class="col-6">
        <div class="card" style="">
           
        @if($client->id !=1)<div class="card-header">
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
        @endif
        </div>
        <br>

        <div class="card" style="">
            <div style="color:red" class="card-header">
            <i class="fa-regular fa-user"></i>
mensaje al cliente 



            </div>
           
        <ul class="list-group list-group-flush">
            <li class="list-group-item" ><i class="fa-solid fa-user"></i>Mensaje  : {{$reparation->description}} </li>
           </ul>
       
        </div>
        <br>
        
        
        <br>

     
        <br>
        <div class="card" style="color:red">
            <div class="card-header">
              <strong>Status</strong>  
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

       


            </div>
            <ul class="list-group list-group-flush">
            <li class="list-group-item">ID : R-{{$reparation->id}} </li>

                <li class="list-group-item">Categorie : {{App\Models\Categorie::find($reparation->categorie_id)->nom}} </li>
                <li class="list-group-item">Marque : {{App\Models\Marque::find($reparation->marque_id)->nom}}</li>
                <li class="list-group-item">Modele : {{App\Models\Modele::find($reparation->model_id)->nom}}</li>
                <li class="list-group-item"><i class="fa-solid fa-barcode"></i>Code\IMEI : {{$reparation->code}}</li>
                <li class="list-group-item"><i class="fa-solid fa-tag"></i>Label : {{$reparation->label}}</li>
                
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