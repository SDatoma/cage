<div class="modal fade" id="me{{$email->id_email}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><strong>Modification du message</strong></h5></br></br>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form  method="POST" action="{{route('email.update',$email->id_email)}}">
      {{method_field('PUT')}}
      {{csrf_field()}}
         <div class="form-group">
            <label for="recipient-name" class="col-form-label">Ville</label>
            <select name="id_ville" class="form-control show-tick ms select2" data-placeholder="Select" required >
				@foreach($villes as $ville)
                <option value="{{$ville->id_ville}}" @if($ville->id_ville==$email->id_ville) selected @endif > {{$ville->libelle_ville}} </option> 
				@endforeach
                <option value="0"> Toutes les villes </option>
				</select>
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Titre</label>
            <input type="text" class="form-control" id="recipient-name" name="titre_email" value="{{$email->titre_email}}" required="">
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Description</label>
            <textarea name="description_email" cols="30" rows="5" placeholder="Description" class="form-control no-resize summernote" required>{{$email->description_email}}</textarea>
          </div>
        </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" >Mettre à jour</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
      </div>
    </div>

    </form>

  </div>
</div>