@foreach($ventes as $vente) 
  <tr>
  <td scope="col">V-{{$vente->id}}</td>
      <th scope="row">{{App\Models\Client::find($vente->client_id)->dni}}: {{App\Models\Client::find($vente->client_id)->nom}} {{App\Models\Client::find($vente->client_id)->prenom}}</th>
      <td>{{App\Models\Categorie::find($vente->categorie_id)->nom}}</td>
      <td>{{App\Models\Marque::find($vente->marque_id)->nom}}</td>
      <td>{{App\Models\Modele::find($vente->model_id)->nom}}</td>
      <td>{{$vente->label}}</td>
      
        </td>
      </td>
      <td>{{$vente->prix}}</td>
      <td>{{$vente->quantite}}</td>
      <td>{{$vente->totale}}</td>
      <td>{{$vente->methode}}</td>
      <td>{{$vente->created_at}}</td>
      <td> 
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#e{{$vente->id}}" data-bs-whatever="@getbootstrap"><i class="fa-solid fa-pen-to-square"></i></button>

<div class="modal fade" id="e{{$vente->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">{{App\Models\Categorie::find($vente->categorie_id)->nom}} : {{App\Models\Marque::find($vente->marque_id)->nom}} {{App\Models\Modele::find($vente->model_id)->nom}}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('editvente')}}">
        <input value="{{$vente->id}}"type="hidden" name="id" class="form-control" id="recipient-name">

        <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Quantite:</label>
            <input value="{{$vente->quantite}}"type="number" name="quantite" class="form-control" id="recipient-name">
          </div>  
        <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Prix:</label>
            <input value="{{$vente->prix}}"type="number" name="prix" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Methode de paiement:</label>
            <select class="form-select" name="method" id="categorie" >
                                    
                                    <option value="cash" selected>Cash</option>
                                    <option value="carte" selected>Carte</option>
                                    <option value="paypal" selected>Paypal</option>

                                    
                                    
                                </select>           </div>
                                <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">edit</button>
      </div>
        </form>
      </div>
      
    </div>
  </div>
</div>
        <a href="{{route('deletevente',$vente->id)}}"class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
      
      </td>
      <td><a href="{{route('ticketvente',$vente->id)}}" target="_blank"><i class="fa-solid fa-ticket"></i></a></td>

    </tr>
    @endforeach