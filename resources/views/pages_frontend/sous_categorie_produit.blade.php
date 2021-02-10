
<?php
if (Cookie::get('id_user')== null)
  {	?>
	@include('header/header_frontend')
<?php } else{?>
	@include('header/header_frontend_con')
<?php } ?>

<div class="header-menu ">
                <div class="container"><br/>
                <div class="product-sec1">
                    <div class="row mt-2">
                        <!--div class="col-md-2">
                            <div class="header-menu-vertical bg-blue">
                                <h4 class="menu-title be-af-none">Catégories</h4>
                                <ul class="menu-content display-block">
                                  @foreach($categories as $categorie)
								           <?php
                                              $sous_categories = \App\Models\SousCategorie::where(['id_categorie' =>$categorie->id_categorie])->get();
                                             ?>
                                    <li class="menu-item">
                                        <a href="{{route('tri.produit.categorie',[$categorie->id_categorie,$categorie->libelle_categorie])}}" @if($categorie->id_categorie==$id_categorie)style="color:red" @endif >{{$categorie->libelle_categorie}} @if(count($sous_categories)>0)<i class="ion-ios-arrow-right"></i> @endif</a>
										   
										<ul class="sub-menu sub-menu-2">
                                            <li>
                                                <ul class="submenu-item">
												@foreach($sous_categories as $sous_categorie)
                                                    <li><a href="{{route('tri.produit.sous_categorie',[$categorie->id_categorie,$sous_categorie->id_sous_categorie,$sous_categorie->libelle_sous_categorie])}}">{{$sous_categorie->libelle_sous_categorie}}</a></li>
												@endforeach
                                                </ul>
                                            </li>
                                        </ul>
                                      
                                    </li>
								  @endforeach
								   
                                </ul>
                             
                            </div>
                        
                        </div-->
                        <div class="col-md-12">
                        <h3 class="tittle-w3l1" style="font-size:20px; margin-bottom:-10px">
						{{$categoriee->libelle_categorie}} ===>>
						<strong style="color:blue">{{$sous_categoriee->libelle_sous_categorie}}</strong> </h3>
						<img src="{{$sous_categoriee->image_sous_categorie}}" height=150 width=200 class="thumbnail" alt=""> 
						<div class="product-single-w3l"></div>
						<br/><h3 class="tittle-w3l1" style="font-size:15px;  margin-bottom:-10px">
						<strong style="color:blue;">Il y a {{count($produits)}} produit(s)</strong></h3>
                           <!-- <div class="pull-right">
                               <input type="text" id="recherche" class="col-md-8 ml-2 form" placeholder="Rechercher...">
                           </div> -->
                           <!-- Slider Start -->
                           <div class="row" id="documents">
						   @foreach($produits as $produit)
						<div class="col-md-3 product-men">
							<div class="men-pro-item simpleCart_shelfItem">
								<div class="men-thumb-item">
									<img src="/{{$produit->image_produit}}"  height=150 width=200  alt="">
									<div class="men-cart-pro">
										<div class="inner-men-cart-pro">
											<a href="{{route('detail-produit.produit', $produit->id_produit)}}" class="link-product-add-cart">Detail</a>
										</div>
									</div>
								</div>
								<div class="item-info-product ">
									<h4 class="mb">
										<a href="single.html">{{$produit->nom_produit}}</a>
									</h4>
									<?php
									 $promotion = \App\Models\Promotion::where(['id_produit' =>$produit->id_produit])->first();
									?>
									<div class="info-product-price">
									   @if($promotion)
										 <?php 
										   $reduction= ($produit->prix_ttc*$promotion->pourcentage_promotion)/100 ; 
										   $prix_ht_promo= $produit->prix_ttc - $reduction;
										 ?>
										<span class="item_price" style="font-size:15px;color:red">{{$prix_ht_promo}} F CFA</span>
										<del> <span class="item_price" style="font-size:15px;color:red">{{$produit->prix_ttc}} F CFA</span></del>
										@else
									   <span class="item_price" style="font-size:15px;color:red">{{$produit->prix_ttc}} F CFA</span>
									    @endif
									</div>
									<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
									<i class="fa fa-cart-arrow-down"></i><input type="submit" data-toggle="modal"   data-target="#cm{{$produit->id_produit}}"  style="font-size:10px" value="Ajouter au panier" class="button cart-resp"/>
									@include('modals/detail/confirm_commande')
									</div> </br>
									@if($produit->stock_produit=="En stock")
									<i class="fa fa-check" aria-hidden="true"></i> <span class="item_price" style="font-size:15px;color:black"><b>{{$produit->stock_produit}}</b> </span>
									@else
									<span class="item_price" style="font-size:15px;color:red"><b>{{$produit->stock_produit}}</b> </span>
									@endif
                               </div>
							</div>
						</div>
						@endforeach
                         </div>
                            <!-- Slider End -->
                        </div>
                        
                    </div>
                    <!-- row -->
                </div>
                </div>
                <!-- container -->
               
            <div class="product-single-w3l"></div>
	<footer>
		<div class="container">
			<!-- footer second section -->
			
	@include('footer/footer_frontend')
	
