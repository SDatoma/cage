<?php
if (Cookie::get('id_user')== null)
  {	?>
	@include('header/header_frontend')
<?php } else{?>
	@include('header/header_frontend_con')
<?php } ?>

   <!-- page -->
	<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
						<a href="/">ACCUEIL</a>
						<i>|</i>
					</li>
					<li>CONTACT</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->
            <!-- contact area start -->
            <div class="contact-area" style="margin-top:20px; margin-bottom:-150px">
                <div class="container">
                    <div class="custom-row-2">
                        <div class="col-lg-4 col-md-4">
							<div class="contact-info-wrap">
                                <div class="single-contact-info" style="margin-top:-20px">
                                    <div class="contact-icon">
                                        <i class="ion-android-call"></i>
                                    </div>
                                    <div class="contact-info-dec">
                                        <p><a href="tel://+228 70453785">+228 70 45 37 85 </a></p>
                                        <p><a href="tel://+228 90904903">+228 90 90 49 03</a></p>
                                    </div>
                                </div>
                                <div class="single-contact-info">
                                    <div class="contact-icon">
                                        <i class="ion-android-globe"></i>
                                    </div>
                                    <div class="contact-info-dec">
                                        <p><a href="mailto://cagetogo@gmail.com">cagetogo@gmail.com</a></p>
                                        <p><a href="mailto://cagetogo@yahoo.fr">cagetogo@yahoo.fr</a></p>
                                    </div>
                                </div>
                                <div class="single-contact-info">
                                    <div class="contact-icon">
                                        <i class="ion-android-pin"></i>
                                    </div>
                                    <div class="contact-info-dec">
                                        <p>Au Togo, Ville Lomé</p>
                                        <p>Quartier Agoè Démakpoè.</p>
                                    </div>
                                </div>
                                <div class="contact-social">
                                    <h3>Partager sur</h3>
                                    <div class="social-info">
                                        <ul>
                                            <li>
                                                <!-- Facebook -->
													   <a target="_blank" title="Facebook" href="https://www.facebook.com/sharer.php?u={{url()->current()}}" rel="nofollow" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=500,width=700');return false;"><img src="{{asset('css_frontend/iconrs/facebook_icon.png')}}" alt="Facebook" /></a>
												<!-- //Facebook -->
                                            </li>
                                            <li>
                                                <!-- Twitter -->
														<a target="_blank" title="Twitter" href="https://twitter.com/share?url={{url()->current()}}" rel="nofollow" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=700');return false;"><img src="{{asset('css_frontend/iconrs/twitter_icon.png')}}" alt="Twitter" /></a>
												<!-- //Twitter -->
                                            </li>
                                            <li>
                                                <!-- Google + -->
														<a target="_blank" title="Google +" href="https://plus.google.com/share?url={{url()->current()}}" rel="nofollow" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=450,width=650');return false;"><img src="{{asset('css_frontend/iconrs/gplus_icon.png')}}" alt="Google Plus" /></a>
												<!-- //Google + -->
                                            </li>
                                            <li>
                                                <!-- Linkedin -->
														<a target="_blank" title="Linkedin" href="https://www.linkedin.com/shareArticle?mini=true&amp;url={{url()->current()}}" rel="nofollow" onclick="javascript:window.open(this.href, '','menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=450,width=650');return false;"><img src="{{asset('css_frontend/iconrs/linkedin_icon.png')}}" alt="Linkedin" /></a>
												<!-- //Linkedin -->
                                            </li>
                                            <li>
                                                <!-- Email -->
														<a target="_blank" title="Envoyer par mail" href="mailto:?Subject=Regarde cette plateforme de CAGE BAT, ça c'est cool !&amp;Body=regarde%20cet%20article%20c'est%20super !%20 {{url()->current()}}" rel="nofollow"><img src="{{asset('css_frontend/iconrs/email_icon.png')}}" alt="email" /></a>
												<!-- //Email -->
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8">
                            <div class="contact-form">
                                <div class="contact-title mb-30">
                                    <h2>Contacter Nous...</h2>
                                </div>
								
								@if (Session::has('succes'))
									<div class="form-group">
										<div class="alert alert-success">
											<center>{{ Session::pull('succes') }}</center>
										</div>
									</div>
								@endif
                                <form class="contact-form-style" id="contact-form" action="{{route('message.store')}}" method="post">
                                     {{ csrf_field() }}
									<div class="row">
                                        <div class="col-lg-6">
                                            <input name="nom" placeholder="Nom*" type="text" />
                                        </div>
                                        <div class="col-lg-6">
                                            <input name="email" placeholder="Email*" type="email" />
                                        </div>
                                        <div class="col-lg-12">
                                            <input name="objet" placeholder="Objet*" type="text" />
                                        </div>
                                        <div class="col-lg-12">
                                            <textarea name="message" placeholder="Votre message*"></textarea>
                                            <button class="submit" type="submit">Envoyer</button>
                                        </div>
                                    </div>
                                </form>
                                <p class="form-messege"></p>
                            </div>
                        </div>
                    </div> <br/>
					<div class="contact-map mb-10">
                        <div><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1983.073573475856!2d1.194249658040794!3d6.244330998870033!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwMTQnMzkuNiJOIDHCsDExJzQzLjIiRQ!5e0!3m2!1sfr!2stg!4v1609349209163!5m2!1sfr!2stg" 
						width="100%" 
						height="500" frameborder="1" style="border:1;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe></div>
                    </div>
                    
                </div>
            </div>
            <!-- contact area end -->
        	<footer>
		<div class="container">
			<!-- footer second section -->
			
	@include('footer/footer_frontend')
	