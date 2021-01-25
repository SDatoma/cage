
<?php
if (Cookie::get('id_user')== null)
  {	?>
	@include('header/header_frontend')
<?php } else{?>
	@include('header/header_frontend_con')
<?php } ?>

	<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
						Accueil
						<i>|</i>
					</li>
					<li><a href="{{route('profil.client',[Cookie::get('id_user')])}}">Mon compte </a><i>|</i> <a href="#">Historiques</a></li>
				</ul>
			</div>
		</div>
	</div>
	
<div class="offcanvas-overlay"></div>
            <!-- cart area start -->
            <div class="cart-main-area mtb-60px">
                <div class="container">
                   <center> <h3 class="cart-page-title ml-4">Historique de vos commandes</h3></center>
                    <div class="row">
					@if(count($commandes)==0)
					<center><h5 class="ml-4" style="color:red">Vous n'avez aucune commande</h5> </center>
					@else
                           <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                               <div class="table-content table-responsive cart-table-content">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Reférences Commandes</th>
                                                <th>Nombre de produits</th>
												<th>Date commande</th>
                                                <th>Etat commande</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($commandes as $commande)
											<?php

												$nombre_produits = DB::table('ligne_commande')
												 ->join('commande', 'ligne_commande.id_commande', '=', 'commande.id_commande')
												 ->join('produit', 'produit.id_produit', '=', 'ligne_commande.id_produit')
												 ->where('commande.id_user', '=', $commande->id_user)
												 ->where('commande.reference_commande', '=', $commande->reference_commande)
												  ->count('ligne_commande.id_produit');
												 
											?>
                                            <tr>
                                                <td class="product-name">{{$commande->reference_commande}}</td>
                                                <td class="product-name">{{$nombre_produits}}</td>
												<td class="product-name">
												<?php setlocale(LC_TIME, "fr_FR","French");
										        echo $date = utf8_encode(strftime("%d %B %Y", strtotime($commande->date_commande))); ?>
												</td>
												<td class="product-name">
												@if($commande->etat_commande != 0 )  
													<span class="badge" style="background-color:#06d755; font-size:15px;color:#fff"><b>Livrer</b> </span>
												@else 
													<span class="item_price" style="background-color:#a12626; font-size:15px;color:#fff"><b>En attente</b> </span>
												@endif </td>
                                                <td class="product-name">
													<a href="{{route('voir.detail',[Cookie::get('id_user'),$commande->reference_commande])}}">
														<button style="color:#0079ba; text-decoration: underline overline #FF3028;" title="Voir détail" data-toggle="modal" data-target="#">
														<i class="glyphicon glyphicon-eye-open"></i> Voir détails
														</button> 
													</a>
												</td>
                                            </tr>
                                            @endforeach
                                          </tbody>
                                    </table>
                                </div>
                           </div>
						   @endif
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
	