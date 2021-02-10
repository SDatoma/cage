<div class="modal fade" id="add-image" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><strong>Ajouter une image du produit</strong></h5></br></br>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form  method="POST"  action="{{route('ajouter.produit.image')}}" enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Photos</label>
            <input type="file" class="form-control" required="" name="file">
          </div>
          <input type="hidden" class="form-control" value="{{$produit->id_produit}}" name="id_produit">
        </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" >Enregistrer</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
      </div>
    </div>

    </form>

  </div>
</div>