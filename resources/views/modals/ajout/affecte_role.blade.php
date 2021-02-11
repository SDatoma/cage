<div class="modal fade" id="Afrole" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" 
aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><strong>Affectation des rôles</strong></h5></br></br>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form  method="POST"  action="{{route('affectation.store')}}">
         {{csrf_field()}}
          
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Email</label>
			
            <select name="email_user" class="form-control" required="">
                <option value=""> Choisissez un mail </option>
                @foreach($users_aff as $user)
					<option value="{{$user->id_user}}"> {{$user->email_user}}</option>
				@endforeach
            </select>
			
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Rôle</label>
			
            <select name="libelle_role" class="form-control" required="">
                <option value=""> Choisissez le rôle </option>
					@foreach($roles_aff as $role)
						<option value="{{$role->id_role}}"> {{$role->libelle_role}}</option>
					@endforeach
            </select>
			
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