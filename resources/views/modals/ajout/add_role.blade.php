<div class="modal fade" id="role" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><strong>Ajouter un role</strong></h5></br></br>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form  method="POST"  action="{{route('role.store')}}">
      {{csrf_field()}}
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Libelle</label>
            <input type="text" class="form-control" id="recipient-name" name="libelle_role" required="">
          </div>
		
		<div class="form-group">
            <label for="recipient-name" class="col-form-label">Code rôle</label>
            <input type="text" class="form-control" id="recipient-name" name="code_role" required="">
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