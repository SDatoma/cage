<div class="modal fade" id="aq{{$produit->id_produit}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><strong>Approvisionnement du stock<b style="color:red"> {{$produit->nom_produit}}</b></strong></h5></br></br>
      </div>
      <div class="modal-body">
      <form  method="POST" action="{{route('update.stock',$produit->id_produit)}}">
      {{ method_field('PUT') }}
      {{ csrf_field() }}
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Quantité a ajouter</label>
            <input type="number" class="form-control" id="recipient-name" min="1" name="quantite" required="">
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