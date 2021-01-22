<div class="modal fade" id="remise" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><strong>Appliquer une remise à la facture</strong></h5></br></br>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form  method="POST"  action="{{route('remise.store')}}" enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Remise (%)</label>
            <input type="numbre" class="form-control" id="recipient-name" name="remise">
          </div>
          <input type="hidden" class="form-control" value="{{$commande->id_commande}}" name="id_commande">
          <input type="hidden" class="form-control" value="{{$commande->reference_commande}}" name="reference_commande">
        </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" >Enregistrer</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
      </div>
    </div>

    </form>

  </div>
</div>