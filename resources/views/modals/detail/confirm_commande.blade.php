<div class="modal fade" id="cm{{$produit->id_produit}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
        <strong><img src="/{{$produit->image_produit}}" alt="" width="80px" height="50px"> {{$produit->nom_produit}}</strong>
        </h5></br></br>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form  method="POST"  action="{{route('cart.store')}}">
      {{csrf_field()}}
          <div class="form-group">
            <label for="recipient-name" class="text-left"><strong style="color:black;">Quantité</strong></label>
            <input type="number" class="form-control" min="1" value="1" id="recipient-name" name="quantite" required="">
          </div>
          <input type="hidden" name="id_produit" value="{{$produit->id_produit}}"/>
		  <input type="hidden" name="nom_produit" value="{{$produit->nom_produit}}"/>
		  <input type="hidden" name="business" value=" " />
			<input type="hidden" name="item_name" value="Almonds, 100g" />
			@if($promotion)
			 <?php 
			$reduction= ($produit->prix_ttc*$promotion->pourcentage_promotion)/100 ; 
			$prix_ht_promo= $produit->prix_ttc - $reduction;
			?>
             @endif
			<input type="hidden" name="prix_produit" value="@if($promotion) {{$prix_ht_promo}} @else {{$produit->prix_ttc}} @endif"/>

        </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" >Ajouter au panier</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
      </div>
    </div>

    </form>

  </div>
</div>