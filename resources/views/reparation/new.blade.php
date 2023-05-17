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
                                <li><a class="dropdown-item" href="{{route('clients')}}">Lista de clientes</a></li>
                                
                            
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
    <div class="row justify-content-center">
        <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Reparaciones</div>
                    <div class="card-body">
                    <form>
                        
                        <div class="mb-3">
                        <div class="form-check">
                            <input   class="form-check-input" type="radio" name="client" id="anonyme" value="anonyme" checked>
                            <label class="form-check-label" for="exampleRadios1">
                               Anonyme
                            </label>
                        </div>
                        <div class="form-check">
                            <input  class="form-check-input" type="radio" name="client" id="nouveau" value="nouveau">
                            <label  class="form-check-label" for="exampleRadios2">
                                Creer Client
                            </label>
                            
                        </div>
                        <div class="form-check">
                            <input  class="form-check-input" type="radio" name="client" id="creer" value="creer">
                            <label  class="form-check-label" for="exampleRadios2">
                                Client existant
                            </label>
                        </div>
                        </div>
                        <div id="shownouveau" style="display:none" class="myDiv">
                       
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">Nom:</label>
                                        <input name="nom"type="text" class="form-control" id="recipient-name">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">Prenom:</label>
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
                                        <label for="recipient-name" class="col-form-label">Phone:</label>
                                        <input name="phone" type="text" class="form-control" id="recipient-name">
                                    </div>
                                </div>
                            </div>
                           
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Adresse:</label>
                                <input name="adresse" type="text" class="form-control" id="recipient-name">
                            </div>
          
      
                        </div>
                        <div  style="display:none"  id="showcreer" class="myDiv">
                            <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Please Choose:</label>
                            <select class="form-select" aria-label="Default select example">
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
                                    <label for="recipient-name" class="col-form-label">Libelle:</label>
                                    <input name="phone" type="text" class="form-control" id="recipient-name">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Description:</label>
                                    <input name="phone" type="text" class="form-control" id="recipient-name">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Categorie:</label>
                                    <input name="phone" type="text" class="form-control" id="recipient-name">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Marque:</label>
                                    <input name="phone" type="text" class="form-control" id="recipient-name">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Modele:</label>
                                    <input name="phone" type="text" class="form-control" id="recipient-name">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Code/IMEI:</label>
                                    <input name="phone" type="text" class="form-control" id="recipient-name">
                                </div>
                            </div>
                        </div>
                        <div class="alert alert-secondary" role="alert">
                          Photos
                        </div>
                        <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Images:</label>
                                    <input name="images" type="file" class="form-control" id="recipient-name">
                        </div>
                        <div class="alert alert-secondary" role="alert">
                          Components
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Components:</label>
                            <select class="form-select" aria-label="Default select example">
                               
                                <option value="" selected></option>
                                
                               
                            </select>   
                        </div>
                        <div class="alert alert-secondary" role="alert">
                          Checking
                        </div>
                        <div class="row">
                            <div class="col">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
  <label class="form-check-label" for="flexCheckDefault">
    Default checkbox
  </label>
                            </div>
                            <div class="col">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
  <label class="form-check-label" for="flexCheckDefault">
    Default checkbox
  </label>
                            </div>
                            <div class="col">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
  <label class="form-check-label" for="flexCheckDefault">
    Default checkbox
  </label>
                            </div>
                            <div class="col">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
  <label class="form-check-label" for="flexCheckDefault">
    Default checkbox
  </label>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
  <label class="form-check-label" for="flexCheckDefault">
    Default checkbox
  </label>
                            </div>
                            <div class="col">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
  <label class="form-check-label" for="flexCheckDefault">
    Default checkbox
  </label>
                            </div>
                            <div class="col">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
  <label class="form-check-label" for="flexCheckDefault">
    Default checkbox
  </label>
                            </div>
                            <div class="col">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
  <label class="form-check-label" for="flexCheckDefault">
    Default checkbox
  </label>
                            </div>
                        </div>  
                        
                        <div class="col mb-3">
                                    <label for="recipient-name" class="col-form-label">Prix:</label>
                                    <input name="prix" type="text" class="form-control" id="recipient-name">
                        </div>
                        
                       
                        <button type="submit" class="btn btn-primary">Ajouter</button>
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
        if (this.value == 'creer') {
            
            $("div.myDiv").hide();
            $("#show"+demovalue).show();
        }
    });
});
    </script>
@endsection
