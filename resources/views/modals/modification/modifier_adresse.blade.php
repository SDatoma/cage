<div class="modal fade" id="ma{{$adresse->id_adresse}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><strong>
        Modifier l'adresse
        </h5></br></br>
      </div>
      <div class="modal-body">
		<div class="tab-content">
           <form class="form-horizontal" method="POST" action="{{route('adresse.update',$adresse->id_adresse)}}" >
							{{ method_field('PUT') }}
							{{ csrf_field() }}
													 
             <div class="col-lg-4">Ville : </div> <div class="col-lg-8"> <input required type="text" value="{{$adresse->ville_adresse}}" name="ville" /> </div>
               <div class="col-lg-4">Pays : </div> <div class="col-lg-8"> <input required type="text" name="pays" value="TOGO" /> </div>
               <div class="col-lg-4">Description précise : </div> <div class="col-lg-8"> <input required value="{{$adresse->description_adresse}}" name="description" type="numeric" /> </div>
                    <div class="modal-footer">
                       <button type="submit" class="btn btn-primary" >Modifier</button>
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                    </div>
           </form>
                                            
          </div>
  </div>
</div>
</div>
</div>
