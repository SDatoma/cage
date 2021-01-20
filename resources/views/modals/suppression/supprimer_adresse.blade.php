<div class="modal fade" id="sa{{$adresse->id_adresse}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form class="form-horizontal" method="POST"  action="{{route('adresse.destroy',$adresse->id_adresse)}}" enctype="multipart/form-data">
		@method('DELETE')
		@csrf
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><strong>
        Suppression de l'adresse {{$adresse->ville_adresse}}
        </h5></br></br>
      </div>
	  
      <div class="modal-body">
		<div class="tab-content">
                                    
				<strong><p syle="color:red">Supprimer cette adresse ? </strong></p>
													
           <p style="font-size:20px">Ville {{$adresse->ville_adresse}} </p><br/>
		   <p style="font-size:20px">Description : {{$adresse->description_adresse}} </p>
          </div>
          </div>
		 <div class="modal-footer">
                    <button type="submit" class="btn btn-danger btn-sm">Oui</button>
                    <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Non</button>
                </div>
                                                
                                            
                               
  </div>
</div>
</div>
  </form>
</div>
