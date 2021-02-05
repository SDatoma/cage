
<?php
if (Cookie::get('id_user')== null)
  {	?>
	@include('header/header_frontend')
<?php } else{?>
	@include('header/header_frontend_con')
<?php } ?>


<div class="offcanvas-overlay"></div>
            <!-- cart area start -->
            <div class="cart-main-area mtb-60px">
                <div class="container">
                           <div class="row">
                                <div class="col-lg-3 col-md-6 mb-lm-30px">
                                    <div class="cart-tax">
                                        <div class="title-wrap">
                                            <h4 class="cart-bottom-title section-bg-gray">Détails de facturation</h4>
										</div>
										<form  method="POST"  action="{{route('commande.store')}}">
										 {{ csrf_field() }}
										<div class="tax-wrapper">
                                            <div class="tax-select-wrapper">
											   <div class="tax-select mb-25px">
                                                    <label>
                                                        * Nom
                                                    </label>
                                                    <input type="text" name="" disabled="" value="{{Cookie::get('nom_user') ?? ''}}" />
												</div>
												
												<div class="tax-select mb-25px">
                                                    <label>
                                                        * Prenom
                                                    </label>
                                                    <input type="text" name="" disabled="" value="{{Cookie::get('prenom_user') ?? ''}}" />
												</div>

												<div class="tax-select mb-25px">
                                                    <label>
                                                        * Email
                                                    </label>
                                                    <input type="email" name="" disabled="" value="{{Cookie::get('email_user') ?? ''}}" />
												</div>

											   <div class="tax-select mb-25px">
                                                    <label>
                                                        * Telephone
                                                    </label>
                                                    <input type="text" name="" />
												</div>
												
                                                <!-- <button class="cart-btn-2" type="submit">Get A Quote</button> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 mb-lm-30px">
                                    <div class="discount-code-wrapper">
                                        <div class="title-wrap">
                                            <h4 class="cart-bottom-title section-bg-gray">Choisissez l'adresse de livraison</h4>
                                        </div>
                                           <div class="">
										      <div class="row">
                                              <?php $i=1 ?>
                                              @if(count($adresses)==0)
                                              <h5 style="color:red"><a href="/mes-adresses"> Veuillez ajouter une adresse</a> </h5>
                                              <input type="text" name="" disabled="" required=""/>
                                              @else
                                               @foreach($adresses as $adresse)
                                                   <div class="col-md-12">
                                                      <label for="huey" style="color:blue">Adresse {{$i}}</label>&nbsp;&nbsp;
                                                      <input type="radio" name="id_adresse" value="{{$adresse->id_adresse}}" required="">
                                                     <p ><strong style="color:black"> Ville </strong>: {{$adresse->ville_adresse}}</p>
                                                     <p><strong style="color:black"> Pays </strong>: {{$adresse->pays_adresse}}</p>
                                                     <p><strong style="color:black"> Description </strong>: {{$adresse->description_adresse}}</p>

                                                     </br></br>
                                                   </div>
                                                   <?php $i++ ?>
                                                   <hr>
                                                @endforeach
                                                @endif
                                                </div>
                                           </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-6 mb-lm-30px">
                                    <div class="discount-code-wrapper">
                                        <div class="title-wrap">
                                            <h4 class="cart-bottom-title section-bg-gray">Mode de paiement</h4>
                                        </div>
                                           <div class="">
										      <div class="row">

                                                   <div class="col-md-12">
                                                     <input type="radio" name="mode" value="domicile" required="">&nbsp;&nbsp;
                                                      <label for="huey" style="color:blue">Paiement à la livraison</label>
                                                    </div>

                                                    <div class="col-md-12">
                                                     <input type="radio" name="mode" value="magasin" required="">&nbsp;&nbsp;
                                                      <label for="huey" style="color:blue">Paiement au magasin</label>
                                                    </div>

                                                   <!-- <div class="col-md-12">
                                                     <input type="radio" name="mode" value="tmoney" required="">&nbsp;&nbsp;
                                                      <label for="huey" style="color:blue"><img src="{{asset('css_frontend/images/tmoney-logo.jpg')}}" height=30 alt=""></label>
                                                    </div>

                                                    <div class="col-md-12">
                                                     <input type="radio" name="mode" value="flooz" required="">&nbsp;&nbsp;
                                                      <label for="huey" style="color:blue"><img src="{{asset('css_frontend/images/flooz-logo.jpg')}}" height=30 alt=""></label>
                                                    </div>

                                                    <div class="col-md-12">
                                                     <input type="radio" name="mode" value="visa" required="">&nbsp;&nbsp;
                                                      <label for="huey" style="color:blue"><img src="{{asset('css_frontend/images/visa.jpg')}}" height=30 alt=""></label>
                                                    </div>

                                                    <div class="col-md-12">
                                                     <input type="radio" name="mode" value="master-cart" required="">&nbsp;&nbsp;
                                                      <label for="huey" style="color:blue"><img src="{{asset('css_frontend/images/master-logo.png')}}" height=30 alt=""></label>
                                                    </div>

                                                    <div class="col-md-12">
                                                     <input type="radio" name="mode" value="orabank" required="">&nbsp;&nbsp;
                                                      <label for="huey" style="color:blue"><img src="{{asset('css_frontend/images/orabank-logo.png')}}" height=30 width=200 alt=""></label>
                                                    </div> -->

                                                </div>
                                           </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-12 mt-md-30px">
                                    <div class="grand-totall">
									   <div class="title-wrap">
                                            <h4 class="cart-bottom-title section-bg-gray">Votre commande</h4>
                                        </div>
                                        <h5>Total Produit<span> {{ShoppingCart::countRows() ?? '0'}}</span></h5>
                                        <h5>Prix Total<span>{{ShoppingCart::total() ?? '0'}} FCFA</span></h5>
                                       
                                        <div class="total-shipping">
                                            <h5>Frais accessoirs</h5>
                                            <ul>
                                                <li> TVA <span>18 %</span></li>
                                                <li> HTTC <span> {{ShoppingCart::total() ?? '0'}} FCFA</span></li>
                                                <!-- <li> LIVRAISON <span>0 FCFA</span></li> -->
                                               
                                            </ul>
                                        </div>
										<h4 class="grand-totall-title" style="color:red">Net à payer<span>{{ShoppingCart::totalPrice() ?? '0'}} FCFA</span></h4>
                                        @if(count($adresses)>0)
										 <button class="cart-btn-2 btn-sm" type="submit"><a>Commander</a></button>
                                        </form>
                                        @else
                                        <a>Indiquer l'adresse de livraison</a>
                                        @endif
                                    </div>
                                </div>
							</div>
                       
                        </div>
                    </div>
                </div>
            </div>
            <!-- cart area end -->
        

	<!-- //fourth section (noodles) -->
	<!-- footer --><div class="product-single-w3l"></div>
	<footer>
		<div class="container">
			<!-- footer second section -->
			
	@include('footer/footer_frontend')
	