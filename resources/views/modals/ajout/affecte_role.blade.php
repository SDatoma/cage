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
			
            <select name="email_user" class="form-control" disabled required="">
                <option value="{{$users_ligne->id_user}}"> {{$users_ligne->email_user}}</option>
				<input type="hidden" name="email_user" value="{{$users_ligne->id_user}}" />
            </select>
			
          </div>

          <div class="form-group">
            <label for="recipient-name" style="text-decoration : underline"class="col-form-label">Cocher les rôles à affecter </label><br/>
			
					@foreach($roles_aff as $role)
						<input style="margin-left:50px" type="checkbox" name="libelle_role[]" value="{{$role->id_role}}" />
						{{$role->libelle_role}}
						
						</br>
					@endforeach
            
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