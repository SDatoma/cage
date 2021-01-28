
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
						<a href="/">Accueil</a>
						<i>|</i>
					</li>
					<li>Détail produit</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->

	<!-- fourth section (noodles) --><br/>
	<div class="featured-section" id="projects">
		<div class="container">
					<div class="product-sec1">
						<h3 class="heading-tittle" style="font-size:25px">Les meilleures ventes</h3>
                        @foreach($meilleurs_ventes as $meilleurs_vente)
						<div class="col-md-3 product-men">
							<div class="men-pro-item simpleCart_shelfItem">
								<div class="men-thumb-item">
									<img src="/{{$meilleurs_vente->image_produit}}"  height=150 width=200  alt="">
									<div class="men-cart-pro">
										<div class="inner-men-cart-pro">
											<a href="{{route('detail-produit.produit', $meilleurs_vente->id_produit)}}" class="link-product-add-cart">Detail</a>
										</div>
									</div>
								</div>
								<div class="item-info-product ">
									<h4 class="mb">
										<a href="">{{$meilleurs_vente->nom_produit}}</a>
									</h4><hr>
									<?php
									 $nbres_ventes = \App\Models\LigneCommande::where(['id_produit' =>$meilleurs_vente->id_produit])
									 ->count('id_produit');
									?>
									
									<span class="item_price" style="font-size:17px;color:#146cda"><b> Nombre vendu : {{$nbres_ventes}} </b> </span>
									</br><hr>
									@if($meilleurs_vente->quantite_produit>3)
									<i class="fa fa-check" aria-hidden="true"></i> <span class="item_price" style="font-size:15px;color:black"><b>Etat du produit : En Stock</b> </span>
									@else
									<span class="item_price" style="font-size:15px;color:red"><b>Etat du produit : En rupture</b> </span>
									@endif
                               </div>
							</div>
						</div>
						@endforeach
						<div class="clearfix"></div>
					</div>
					</div>
					</div>
	<!-- //fourth section (noodles) -->
	
	<!-- footer --><div class="product-single-w3l"></div>
	<footer>
		<div class="container">
			<!-- footer second section -->
			
	@include('footer/footer_frontend')
	
	<!-- js-files -->
	<!-- jquery -->
	<script src="{{asset('css_frontend/js/jquery-2.1.4.min.js')}}"></script>
	<!-- //jquery -->

	<!-- popup modal (for signin & signup)-->
	<script src="{{asset('css_frontend/js/jquery.magnific-popup.js')}}"></script>
	<script>
		$(document).ready(function () {
			$('.popup-with-zoom-anim').magnificPopup({
				type: 'inline',
				fixedContentPos: false,
				fixedBgPos: true,
				overflowY: 'auto',
				closeBtnInside: true,
				preloader: false,
				midClick: true,
				removalDelay: 300,
				mainClass: 'my-mfp-zoom-in'
			});

		});
	</script>
	<!-- Large modal -->
	<!-- <script>
		$('#').modal('show');
	</script> -->
	<!-- //popup modal (for signin & signup)-->

	<!-- cart-js -->
	
	<!-- smoothscroll -->
	<script src="{{asset('css_frontend/js/SmoothScroll.min.js')}}"></script>
	<!-- //smoothscroll -->

	<!-- start-smooth-scrolling -->
	<script src="{{asset('css_frontend/js/move-top.js')}}"></script>
	<script src="{{asset('css_frontend/js/easing.js')}}"></script>
	<script>
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();

				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<!-- //end-smooth-scrolling -->

	<!-- smooth-scrolling-of-move-up -->
	<script>
		$(document).ready(function () {
			/*
			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
			};
			*/
			$().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
	</script>
	<!-- //smooth-scrolling-of-move-up -->

	<!-- imagezoom -->
	<script src="{{asset('css_frontend/js/imagezoom.js')}}"></script>
	<!-- //imagezoom -->

	<!-- FlexSlider -->
	<script src="{{asset('css_frontend/js/jquery.flexslider.js')}}"></script>
	<script>
		// Can also be used with $(document).ready()
		$(window).load(function () {
			$('.flexslider').flexslider({
				animation: "slide",
				controlNav: "thumbnails"
			});
		});
	</script>
	<!-- //FlexSlider-->

	<!-- flexisel (for special offers) -->
	<script src="{{asset('css_frontend/js/jquery.flexisel.js')}}"></script>
	<script>
		$(window).load(function () {
			$("#flexiselDemo1").flexisel({
				visibleItems: 3,
				animationSpeed: 1000,
				autoPlay: true,
				autoPlaySpeed: 3000,
				pauseOnHover: true,
				enableResponsiveBreakpoints: true,
				responsiveBreakpoints: {
					portrait: {
						changePoint: 480,
						visibleItems: 1
					},
					landscape: {
						changePoint: 640,
						visibleItems: 2
					},
					tablet: {
						changePoint: 768,
						visibleItems: 2
					}
				}
			});

		});
	</script>
	<!-- //flexisel (for special offers) -->

	<!-- for bootstrap working -->
	<script src="{{asset('css_frontend/js/bootstrap.js')}}"></script>
	<!-- //for bootstrap working -->
	<!-- //js-files -->