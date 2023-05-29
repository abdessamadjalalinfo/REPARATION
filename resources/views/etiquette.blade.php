<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Etiqutte</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
</head>

<body onload="window.print()">

    <div class="container mt-2">

        <div class="row">
            <div class="col-1">
                <div >
                    {!! QrCode::size(50)->generate($reparation->id) !!}
                
                </div>
            </div> 
            <div  class="col-2">
                <p style="font-size: 7px;margin-top: 0px;margin-bottom: 0px;">{{$reparation->created_at}}</p>
                <p  style="font-size: 7px;margin-top: 0px;margin-bottom: 0px;">{{App\Models\Categorie::find($reparation->categorie_id)->nom}}\{{App\Models\Marque::find($reparation->marque_id)->nom}}</p>
                <p  style="font-size: 7px;margin-top: 0px;margin-bottom: 0px;">{{App\Models\Modele::find($reparation->model_id)->nom}}</p> 
                <p  style="font-size: 7px;margin-top: 0px;margin-bottom: 0px;">{{$reparation->client->nom}} {{$reparation->client->prenom}}</p>   
            </div> 
        </div>
                
            

           
              
            
            
        

        

    </div>
</body>
</html>