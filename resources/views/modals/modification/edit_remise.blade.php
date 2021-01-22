<div class="modal fade" id="edit-remise" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><strong>Modification du remise</strong></h5></br></br>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form  method="POST" action="{{route('remise.update',$remise->id_remise)}}">
      {{ method_field('PUT') }}
      {{ csrf_field() }}
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Remise (%)</label>
            <input type="numbre" class="form-control" value="{{$remise->pourcentage_remise}}" name="remise">
          </div>
        </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" >Enregistrer</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
      </div>
    </div>

    </form>

  </div>
</div>