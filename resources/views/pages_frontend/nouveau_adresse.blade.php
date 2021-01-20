
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
					<li><a href="{{route('profil.client',[Cookie::get('id_user')])}}">Mon compte </a><i>|</i> <a href="/mes-adresses">Mes Adresses</a><i>|</i> <a href="#">Ajout</a></li>
				</ul>
			</div>
		</div>
	</div>
    <!-- login area start -->
            <div class="login-register-area mtb-60px">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 col-md-12 ml-auto mr-auto">
                            <div class="login-register-wrapper">
                                <div class="login-register-tab-list nav">
                                    <a class="active" data-toggle="tab" href="#lg1">

                                        <h4>AJOUTER UNE ADRESSE</h4>

                                    </a>
                                </div>
                                <div class="tab-content">
                                    <div id="lg1" class="tab-pane active">
									
                                        <div class="login-form-container">
                                            <div class="login-register-form" style="color:#000;">

											<div class="button-box">
											@include('modals/ajout/ajouter_adresse')
											<a href="#" data-toggle="modal" data-target="#aa">
												<button type="submit"><span>Ajouter</span></button><br/>
												</a>
											</div>

                                        <table class="table table-striped table-bordered">
										<thead>
											<tr>
												<th> Ville </th>
												<th> Pays </th>
												<th> Description </th>
												<th> Action </th>
											</tr>
										</thead>
										<tbody>
										@foreach($adresses as $adresse)
											<tr>
												<td>{{$adresse->ville_adresse}}</td>
												<td>{{$adresse->pays_adresse}}</td>
												<td>{{$adresse->description_adresse}}</td>
												<td>
													<a href="#" data-toggle="modal" data-target="#ma{{$adresse->id_adresse}}">
														<button style="color:#0079ba; size: 17px; text-decoration: underline overline ;" title="Voir détail" data-toggle="modal" data-target="#">
															<i class="glyphicon glyphicon-pencil"></i>  Modifier
														</button> 
													</a> 
													<a href="" data-toggle="modal" data-target="#sa{{$adresse->id_adresse}}">
														<button style="margin-left: 20px; color:#0079ba; size: 17px; text-decoration: underline overline #FF3028;" title="Voir détail" data-toggle="modal" data-target="#">
															<i class="glyphicon glyphicon-trash"></i>  Supprimer
														</button> 
													</a>
												</td>
											</tr>
														@include('modals/suppression/supprimer_adresse')
														
											@include('modals/modification/modifier_adresse')
										@endforeach
										</tbody>
										</table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
							
                        </div>
                    </div>
                </div>
            </div>
            <!-- login area end --><div class="product-single-w3l"></div>

	<footer>
		<div class="container">
			<!-- footer second section -->
			
			<!-- //footer second section -->
			
	@include('footer/footer_frontend')