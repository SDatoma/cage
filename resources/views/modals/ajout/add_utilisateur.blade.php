<div class="modal fade" id="utilisateur" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><strong>Creer un utilisateur</strong></h5></br></br>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form  method="POST"  action="{{route('utilisateur.store')}}">
         {{csrf_field()}}
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nom</label>
            <input type="text" class="form-control" id="recipient-name" name="username" required="">
          </div>
        
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Prenom</label>
            <input type="text" class="form-control" id="recipient-name" name="userprenom" required="">
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Adresse mail</label>
            <input type="email" class="form-control" id="recipient-name" name="useremail" required="">
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Role</label>
            <select name="id_role" class="form-control" required="">
                <option value=""> Choisissez le role </option>
                <option value="1"> Comptable</option>
                <option value="2"> Commerciaux</option>
                <option value="2"> Gestionnaire de stock</option>
            </select>
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Mot de passe</label>
            <input type="password" class="form-control" id="recipient-name" name="userpassword" required="">
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