@extends('layouts.app')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
                                <li><a class="dropdown-item" href="#">Lista de reparaciones</a></li>
                            
                              </ul>
                            </div>
                        </div>
                        <div class="col">
                            <div class="dropdown">
                            <a class="btn btn-primary dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-screwdriver-wrench"></i>Clientes
                            </a>
                             <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Lista de clientes</a></li>
                                
                            
                              </ul>
                            </div>
                        </div>

                        <div class="col">
                            <div class="dropdown">
                            <a class="btn btn-primary dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-screwdriver-wrench"></i>Ventas
                            </a>
                             <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Añadir una Ventas</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                            
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

    <table class="table">
  <thead>
    <tr>
      <th scope="col">Client</th>
      <th scope="col">Categorie</th>
      <th scope="col">Marque</th>
      <th scope="col">Modele</th>
      <th scope="col">Code</th>
      <th scope="col">Status</th>
      <th scope="col">Update</th>
      <th scope="col">Prix</th>
      <th scope="col">Date</th>
      <th scope="col">Option</th>
    </tr>
  </thead>
  <tbody>
  @foreach($reparations as $reparation) 
  <tr>
      <th scope="row">{{App\Models\Client::find($reparation->client_id)->nom}}</th>
      <td>{{App\Models\Categorie::find($reparation->categorie_id)->nom}}</td>
      <td>{{App\Models\Marque::find($reparation->marque_id)->nom}}</td>
      <td>{{App\Models\Modele::find($reparation->model_id)->nom}}</td>
      <td>{{$reparation->code}}</td>
      <td>
        
        <select name="status" class="colonne-select" data-id="{{ $reparation->id }}">
        <option @if($reparation->status=="non resolu") style="color:red" selected @endif value="non resolu">non resolu</option>
        <option @if($reparation->status=="done") style="color:green" selected @endif value="done">done</option>
        <option @if($reparation->status=="reparation") style="color:red" selected @endif value="reparation">reparation</option>

      </select>
      <td>
                        <button class="btn btn-success update-btn"><i class="fa-solid fa-pen-to-square"></i></button>
        </td>
      </td>
      <td>{{$reparation->prix}}</td>
      <td>{{$reparation->created_at}}</td>
      <td> 
        <a href="{{route('checkreparation',$reparation->id)}}"class="btn btn-success"><i class="fa-solid fa-magnifying-glass"></i></a>
      </td>

    </tr>
    @endforeach
    
  </tbody>
</table>
    </div>
</div>


<script>
        $(document).ready(function() {
            $('.update-btn').click(function() {
                var selectElement = $(this).closest('tr').find('.colonne-select');
                var valeur = selectElement.val();
                var id = selectElement.data('id');
                var url = "{{ route('colonne.update', ':id') }}";
                url = url.replace(':id', id);
                console.log(url,id,valeur);
                $.ajax({
                    url: url,
                    type: "post",
                    data: {valeur: valeur,
                    "_token":"{{ csrf_token() }}"},
                    success: function(response) {
                        alert('Changed!');
                    },
                    error: function(xhr) {
                        alert('Une erreur s\'est produite lors de la mise à jour de la colonne.');
                    }
                });
            });
        });
    </script>
@endsection