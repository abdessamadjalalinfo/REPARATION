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
                    <p><strong>------------------------------------</strong></p>
                    <p><strong>ID: </strong>V-{{$vente->id}}</p>
                    <p><strong>Nombre</strong> {{$vente->client->nom}} {{$vente->client->prenom}}</p>
                    <p><strong>NIF/CIF:</strong> {{$vente->client->dni}}</p>
                    <p><strong>Teléfono:</strong> {{$vente->client->phone}}</p>
                    <p><strong>Dirección:</strong>{{$vente->client->adresse}}</p>
                    <p><strong>------------------------------------</strong></p>
                    <p><strong>Fecha</strong> {{$vente->created_at}}</p>
                    <p><strong>Tipo:</strong> {{$vente->categorie->nom}}</p>
                    <p><strong>Marca:</strong> {{$vente->marque->nom}}</p>
                    
                    <p><strong>Modelo:</strong>{{$vente->modele->nom}}</p>
                    <p><strong>Prix unitaire:</strong>{{$vente->prix}} € </p>
                    <p><strong>Quantite :</strong>{{$vente->quantite}} </p>
                    <p><strong>Totale :</strong>{{$vente->totale}} € </p>
                    <p><strong>------------------------------------</strong></p>
                    <p><strong 
>{{$store->email}}</strong> </p>

<p><strong >{{$store->localisation}} {{$store->zip}} {{$store->pays}}</strong> </p>

                </div>
            </div> 
            
              
            
            
        

        

    </div>
</body>
</html>