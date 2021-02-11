<!-- Central Modal Small -->
<div class="modal fade" id="ar{{$utilisateur->id_affecter_roles}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<form class="form-horizontal" method="POST" action="{{route('affectation.destroy',$utilisateur->id_affecter_roles)}}">
  @method('DELETE')
     @csrf
   <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          
          <!--Body-->
          <div class="modal-body">
           <strong><p>Supprimer ce role ? </strong></p>
           <strong style="font-size:20px">@foreach($roles as $role)
											@if($role->id_role == $utilisateur->id_role)
												{{$role->libelle_role}}
											@endif
											@endforeach</strong>
          </div>
          <!--Footer-->
               <div class="modal-footer">
                    <button type="submit" class="btn btn-danger btn-sm">Oui</button>
                    <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Non</button>
                </div>
        </div>

        </form>
        <!--/.Content-->
      </div>
    </div>
  