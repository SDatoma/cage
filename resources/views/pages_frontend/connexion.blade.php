
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
						<a href="/">Accueil</a>
						<i>|</i>
					</li>
					<li>Connexion </li>
				</ul>
			</div>
		</div>
	</div>
    <!-- Breadcrumb Area End-->
            <!-- login area start -->
            <div class="login-register-area" style="background: linear-gradient(#146cda, white)">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                            <div class="login-register-wrapper">
                                <div class="tab-content">
								@if (Session::has('error'))
									<div class="form-group">
										<div class="alert alert-danger">
											<center>{{ Session::pull('error') }}</center>
										</div>
									</div>
								@endif
                                     <br/><br/>
									 <div style="background-color:#fff">
									 <center><h4 class="mt-4">Connexion</h4></center>
                                        <div class="login-form-container">
                                            <div class="login-register-form"  style="color:#000; text-align : right;">
                                                <form action="{{route('connexion.store')}}" method="post">
                                                     {{csrf_field()}}
													<div class="col-lg-4">Adresse email : </div> <div class="col-lg-8"> <input type="text" name="username" placeholder="Nom d'utilisateur" required=""/> </div>
                                                    <div class="col-lg-4">Mot de passe : </div> <div class="col-lg-8"> <input type="password" name="userpassword" placeholder="Mot de passe" required="" /> </div>
                                                    <div class="col-lg-4"><a href="/mot-de-passe-oublier" style="color:blue">Mot de passe oublié ? </a></div> <div class="col-lg-8"> Pas encore inscrit, <a href="/inscription" style="color:blue">créer un compte </a></div>
                                                    <div class="button-box">
                                                        <button type="submit" style="margin-top:40px"><span>Connexion</span></button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			

	<footer>
		<div class="container">
			<!-- footer second section -->
			<div class="w3l-grids-footer">
				<div class="col-xs-5 offer-footer">
					<div class="col-xs-3 icon-fot">
						<span class="fa fa-map-marker" aria-hidden="true"></span>
					</div>
					<div class="col-xs-9 text-form-footer">
						<h3 style="font-size:20px">Togo, Lomé, quatier Agoè Démakpoè</h3>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="col-xs-3 offer-footer">
					<div class="col-xs-3 icon-fot">
						<span class="fa fa-refresh" aria-hidden="true"></span>
					</div>
					<div class="col-xs-9 text-form-footer">
						<h3 style="font-size:20px">Simple et facile</h3>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="col-xs-4 offer-footer">
					<div class="col-xs-4 icon-fot">
						<span class="fa fa-times" aria-hidden="true"></span>
					</div>
					<div class="col-xs-8 text-form-footer">
						<h3 style="font-size:20px">Satisfait ou rembousser </h3>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
			</div>
			<!-- //footer second section -->
			
	@include('footer/footer_frontend')