<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Etiqutte</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
</head>
<style>
    p{
        margin-bottom: 0px;
        
         margin-left: 18px;
         font-size: 10px;

    }
    

</style>    

<body onload="window.print()">

    <div class="container mt-2">

        
                
            
            <div syle="text-align: center;"  class="col-4"  syle="text-align: center;">
                <div syle="text-align: center;  font-size: 7px;" >
                
                
                
                
                

                <p>{{$store->cif}}</p>
                <p>{{$store->nombre_social}}</p>
                <p>Tel: {{$store->phone}}</p>
                <p>Whatssap: {{$store->whatssap}}</p>
                <p> </p>
                    <p><strong>------------------------------------</strong></p>
                    <p><strong>ID</strong> R-{{$reparation->id}}</p>

                    <p><strong>Nombre</strong> {{$reparation->client->nom}}{{$reparation->client->prenom}}</p>
                    <p><strong>NIF/CIF:</strong> {{$reparation->client->dni}}</p>
                    <p><strong>Teléfono:</strong> {{$reparation->client->phone}}</p>
                    <p><strong>Dirección:</strong>{{$reparation->client->adresse}}</p>
                    <p><strong>------------------------------------</strong></p>
                    <p><strong>Fecha</strong> {{$reparation->created_at}}</p>
                    <p><strong>Tipo:</strong> {{$reparation->categorie->nom}}</p>
                    <p><strong>Marca:</strong> {{$reparation->marque->nom}}</p>
                    <p><strong>IMEI/SN:</strong>{{$reparation->code}}</p>
                    <p><strong>Modelo:</strong>{{$reparation->modele->nom}}</p>
                    <p><strong>Premio de los componentes:</strong>{{$reparation->price_components}} €</p>
                    <p><strong>Coste estimado:</strong>{{$reparation->prix}}€ </p>
                    <p><strong>para consultar el seguimiento de la reparación consulta este enlace: </strong> {{route('reparation_client',$reparation->id)}} </p>
                    <p><strong>------------------------------------</strong></p>
                    <p><strong 
>{{$store->email}}</strong> </p>

<p><strong >{{$store->localisation}} {{$store->zip}} {{$store->pays}}</strong> </p>

                </div>
            </div> 
            
              
            
            
        

        

    </div>
</body>
</html>