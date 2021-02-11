<div class="modal fade" id="mu{{$utilisateur->id_user}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><strong>Modification</strong></h5></br></br>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form  method="POST"  action="{{route('utilisateur.update',$utilisateur->id_user)}}">
      {{ method_field('PUT') }}
      {{ csrf_field() }}
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nom</label>
            <input type="text" class="form-control" id="recipient-name" value="{{$utilisateur->nom_user}}" name="username" required="">
          </div>
        
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Prenom</label>
            <input type="text" class="form-control" id="recipient-name" value="{{$utilisateur->prenom_user}}" name="userprenom" required="">
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Adresse mail</label>
            <input type="email" class="form-control" value="{{$utilisateur->email_user}}" id="recipient-name" name="useremail" required="">
          </div>

         <div class="form-group">
            <label for="recipient-name" class="col-form-label">Mot de passe</label>
            <input type="password" class="form-control" value="{{$utilisateur->password_visible}}" id="recipient-name" name="userpassword" required="">
          </div>

        </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" >Mettre a jour</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
      </div>
    </div>

    </form>

  </div>
</div>