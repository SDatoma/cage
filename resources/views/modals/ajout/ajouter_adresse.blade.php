<div class="modal fade" id="aa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><strong>
        Ajouter une adresse
        </h5></br></br>
      </div>
      <div class="modal-body">
		<div class="tab-content">
                                    <form class="form-horizontal" method="POST"  action="{{route('adresse.store')}}" enctype="multipart/form-data">
													{{ csrf_field() }}
													 
                                                    <div class="col-lg-4">Ville : </div> <div class="col-lg-8"> <input required type="text" name="ville" /> </div>
                                                    <div class="col-lg-4">Pays : </div> <div class="col-lg-8"> <input required type="text" name="pays" value="TOGO" /> </div>
                                                    <div class="col-lg-4">Description précise : </div> <div class="col-lg-8"> <input required name="description" type="numeric" /> </div>
         <div class="modal-footer">                                           
        <button type="submit" class="btn btn-primary" >Ajouter</button>
        <button type="button" style="background-color:#c82333" class="btn btn-danger" data-dismiss="modal">Fermer</button>
      </div>
                                                </form>
                                            
                                </div>
  </div>
</div>
</div>
</div>
