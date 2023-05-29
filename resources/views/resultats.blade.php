@foreach($reparations as $reparation) 
  <tr>
  <th scope="row">R-{{$reparation->id}}</th>

      <th scope="row">{{App\Models\Client::find($reparation->client_id)->dni}}: {{App\Models\Client::find($reparation->client_id)->nom}} {{App\Models\Client::find($reparation->client_id)->prenom}}</th>
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
        <a href="{{route('deletereparation',$reparation->id)}}"class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
      
      </td>

    </tr>
    @endforeach