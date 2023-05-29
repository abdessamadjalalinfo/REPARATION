<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Etiqutte</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
    p{
        margin-bottom: 0px;
        
         margin-left: 18px;

    }
    

</style>    

<body >

    <div class="container mt-2">

              <div class="row">
                <div class="col-1S">
                  <img width="90" src="{{ asset('images/'.$store->logo) }}" />
                </div>
                <div class="col-2 offset-9">
                <p>{{$store->cif}}</p>
                <p>{{$store->nombre_social}}</p>
                <p>{{$store->localisation}}</p>
                <p>{{$store->zip}}</p>
                <p>{{$store->pays}}</p>
                <p>Tel: {{$store->phone}}</p>
                <p>Whatssap: {{$store->whatssap}}</p>
                <p> {{$store->email}}</p>
                <p> {{$store->site}}</p>
                </div>
              </div>
              <div class="row">
                <div class="col-5 offset-3">
                    <h3>RESGUARDO DE DEPÓSITO R-{{$reparation->id}}  </h3>
                </div>
                
              </div>
              

              
              <div class="row">
                <div class="col-6">
                    <p> <strong>FECHA</strong>   {{$reparation->created_at}}      </p>
                    <p> <strong>TIENDA</strong> Calle Manuel de falla 31        </p>
                    <p> <strong>CLIENTE</strong>   {{$reparation->client->nom}}    {{$reparation->client->prenom}}    </p>
                    <p> <strong>TELÉFONO</strong>    {{$reparation->client->phone}}       </p>
                    <p> <strong>NIF</strong>     {{$reparation->client->dni}}      </p>
                    <p> <strong>MODELO</strong>  {{$reparation->modele->nom}}         </p>
                    <p> <strong>SN/IMEI</strong>    {{$reparation->code}}     </p>
                    <p> <strong>FALLO</strong>         </p>
                    <p> <strong>Precios de los componentes:</strong>  {{$reparation->price_components}}€    </p>
                    <p> <strong>COSTE ESTIMADO:</strong>  {{$reparation->prix}}€       </p>
                    <p> <strong>OBSERVACIONES</strong>    {{$reparation->description}}      </p>
                </div>
                <div class="col-6">
                    <div class="card">
                        <div style="text-align: center;" class="card-body">
                                <h6>Test de control</h6>
                        </div>
                        <ul class="list-group list-group-flush">
                            @foreach($checks as $check)
                            <li class="list-group-item"> <i style="color:green"class="fa-solid fa-check"></i>{{$check->description}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
              </div>
<div class="row">
              <div class="col-3 offset-4">
              <div class="card">
                    <div class="card-header">
                    Firma del cliente:
                    </div>
                        <div class="card-body">
                            <h5 class="card-title"> </h5>
                            <p class="card-text"></p>
                            
                        </div>
                </div>
                

                    
              </div>
              <div class="col-3 ">
              <div class="card">
                    <div class="card-header">
                    Sello establecimiento:
                    </div>
                        <div class="card-body">
                            <h5 class="card-title"> </h5>
                            <p class="card-text"></p>
                            
                        </div>
                </div>
                
                </div>
                    
              </div>
            
            
        

        

    </div>
</body>
</html>