<?php
if (Cookie::get('id_user')== null)
  {	?>
	@include('header/header_frontend')
<?php } else{?>
	@include('header/header_frontend_con')
<?php } ?>

<style>
.body-main {
     background: #ffffff;
     border-bottom: 15px solid #1E1F23;
     border-top: 15px solid #1E1F23;
     margin-top: 30px;
     margin-bottom: 30px;
     padding: 40px 30px !important;
     position: relative;
     font-size: 10px
 }
</style>

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
                   <center> 
                   <h3 class="cart-page-title">Détail historique de la commande</h3>
                    <div class="row">
                    </center>
                     
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
		<div class="container"><br/>
        <div class="product-sec1">
        <div class="container">
        <div class="row" id="dataTable">
            <div class="col-md-12 body-main">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4"> 
							<img class="img" alt="Invoce Template" src="{{asset('files_upload/logo.jpeg')}}"  width="120px" height="120px"/><p style="margin-left:20px;font-size:15px">E-commerce</p>
						</div>
                         <div class="col-md-4">
                        @if($commande->etat_commande != 0 )  
						<span class="badge" style="background-color:#06d755; font-size:15px;color:black"><b> Commande livrée le <?php setlocale(LC_TIME, "fr_FR","French");
						 echo $date = utf8_encode(strftime("%d %B %Y", strtotime($commande->date_livraison))); ?> 
                         </b> </span>
						 @endif 
                         </div>
                        <div class="col-md-4 text-right">
                            <h4 style="color: #F81D2D;"><strong>CAGE - BATIMENT</strong></h4>
                            <p>Togo, Lomé, Agoè Démakpoè</p>
                            <p>+228 70 45 37 85 | 96 35 80 90</p>
                            <p>	cagetogo@gmail.com</p>
                        </div>
                    </div> <br />
                    <div class="row">
                       <?php  $annee=date('Y');
                          $numero= $annee."/CAGE-BAT/000".$commande->numero_facture;
                        ?>
                        <div class="col-md-12 text-center float">
                            <h2><u>FACTURE N° {{$numero}}</u></h2> 
                        </div><br />
						
						<div class="col-md-12" style="margin-top:10px">
						
                        <div class="col-md-6 text-left">
                            <h4 style="color: black;"><strong>{{$user->nom_user}} {{$user->prenom_user}}</strong></h4>
                            <p>
                            @foreach($villes as $ville)
                                @if($ville->id_ville==$user->id_ville)
                                  {{$ville->libelle_ville}} 
                                @endif
                            @endforeach
                            , {{$user->quartier_user}}</p>
                            <p>{{$user->email_user}}</p>
                            <p>(+228) {{$user->telephone_user}}</p>
                        </div>

                        <div class="col-md-6 text-right">
                            <h4 style="color: black;"><strong><u>Adresse de livraison</u></strong></h4>
                            <p> Ville : {{$adresse->ville_adresse}}</p>
                            <p> Pays : {{$adresse->pays_adresse}}</p>
                            <p> Description : {{$adresse->description_adresse}}</p>
                        </div>
                        </div>

                    </div> <br />
                    <div><br />
                        <table class="table table-bordered" style="font-size:17px">
                            <thead>
                                <tr>
                                    <th>
                                       Libelle
                                    </th>
									<th>
                                        Quantité
                                    </th>
									<th>
                                        Prix Unitaire
                                    </th>
                                    <th>
                                        Montant
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
							@foreach($commandes as $commande)
                                <tr>
                                    <td>{{$commande->nom_produit}}</td>
									<td>{{$commande->quantite_commande}}</td>
									<td>{{$commande->prix_ttc}}</td>
                                    <td>{{$commande->prix_ttc*$commande->quantite_commande}}</td>
                                </tr>
                            @endforeach 
                               
                                <tr scope="col" colspan="5" rowspan="1" class="text-center">
									<th colspan="3">TOTAL</th>
									<th colspan="2"> <?php echo ceil($prix_total)?> F CFA</th>
								</tr>

                                <tr scope="col" colspan="5" rowspan="1" class="text-center">
									<th colspan="3"> MONTANT HORS TAXE</th>
									<th colspan="2"> <?php echo ceil($prix_total_ht)?> F CFA</th>
								</tr>

                                @if($remise)
                                <?php
                                  $remisee= ($prix_total*$remise->pourcentage_remise)/100 ;
                                  $prix_revient= ($prix_total - $remisee)+$commande->frais_livraison ;
                                 ?>
                                <tr scope="col" colspan="5" rowspan="1" class="text-center">
									<th colspan="3">REMISE</th>
									<th colspan="2">{{$remise->pourcentage_remise}} %</th>
								</tr>
                                @endif

                                <tr scope="col" colspan="5" rowspan="1" class="text-center">
									<th colspan="3">MONTANT TVA</th>
									<th colspan="2">{{$prix_total_tva}} FCFA</th>
								</tr>
                                @if($remise)
                                <?php
                                 $remisee= ($prix_total*$remise->pourcentage_remise)/100 ;
                                  $prix_revient= ($prix_total - $remisee) ;
                                 ?>
                                <tr scope="col" colspan="5" rowspan="1" class="text-center">
									<th colspan="3">NET A PAYER</th>
									<th colspan="2"> <?php echo (round($prix_revient,0))?> F CFA </th>
								</tr>
                                @else
                               
                                <tr scope="col" colspan="5" rowspan="1" class="text-center">
									<th colspan="3">NET A PAYER</th>
									<th colspan="2"> <?php echo (round($prix_total,0))?> F CFA </th>
								</tr>

                                @endif
                                <tr scope="col" colspan="5" rowspan="1" class="text-center">
									<th colspan="3">FRAIS DE LIVRAISON</th>
									<th colspan="2"> {{$commande->frais_livraison ?? '0'}} F CFA</th>
								</tr>
                                
                                @if($remise)
                                <?php
                                  $remisee= ($prix_total*$remise->pourcentage_remise)/100 ;
                                  $prix_revient= ($prix_total - $remisee)+$commande->frais_livraison ;
                                 ?>
                                <tr scope="col" colspan="5" rowspan="1" class="text-center">
									<th colspan="3" style="color:red"> TOTAL A PAYER</th>
									<th colspan="2" style="color:red"> <?php echo (round($prix_revient,0))?> F CFA</th>
								</tr>
                                @else
                                <tr scope="col" colspan="5" rowspan="1" class="text-center">
									<th colspan="3" style="color:red"> TOTAL A PAYER</th>
									<th colspan="2" style="color:red"> <?php echo (round($prix_total+$commande->frais_livraison+$prix_total_tva,0)) ?> F CFA</th>
								</tr>
                                @endif

                              </tbody>
                        </table>
                    </div>
                    <div>
                        <div class="col-md-12">
                              
                                     <p  class="text-left" style="font-size:18px; text-align: right; margin-top:40px">
									 La présente facture est arrêtée à la somme de <b style="font-size:20px;color:red; ">
                                     @if($remise)
                                     <?php
                                      $remisee= ($prix_total*$remise->pourcentage_remise)/100 ;
                                      $prix_revient= ($prix_total - $remisee)+$commande->frais_livraison ;
                                      echo int2str((round($prix_revient,0)))
                                      ?> F CFA</b>
                                     @else
                                     <?php echo int2str((round($prix_total+$commande->frais_livraison,0)))?> F CFA</b>
                                     </p>
									 @endif	

                                    <p  class="text-right" style="text-align: right; margin-top:40px">
									 Fait à Lomé, le <?php setlocale(LC_TIME, "fr_FR","French");
									echo $date = utf8_encode(strftime("%d %B %Y", strtotime($commande->date_commande))); ?>b</p>
									<p class="text-right" style="text-align: right; margin-top:40px"><b>Signature</b></p>

                                @if($commande->etat_commande != 0 )  
						        <span class="text-right" style="background-color:#06d755; font-size:15px;color:black"><b> Commande livrée le <?php echo $newDate = date("d/n/Y", strtotime($commande->date_livraison));?> 
                                    </b> 
                                </span>
						        @endif 
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
	
	
<?php

 function int2str($a)
{
$convert = explode('.',$a);
if (isset($convert[1]) && $convert[1]!=''){
return int2str($convert[0]).'Dinars'.' et '.int2str($convert[1]).'Centimes' ;
}
if ($a<0) return 'moins '.int2str(-$a);
if ($a<17){
switch ($a){
//case 0: return 'zero';
case 1: return 'un';
case 2: return 'deux';
case 3: return 'trois';
case 4: return 'quatre';
case 5: return 'cinq';
case 6: return 'six';
case 7: return 'sept';
case 8: return 'huit';
case 9: return 'neuf';
case 10: return 'dix';
case 11: return 'onze';
case 12: return 'douze';
case 13: return 'treize';
case 14: return 'quatorze';
case 15: return 'quinze';
case 16: return 'seize';
}
} else if ($a<20){
return 'dix-'.int2str($a-10);
} else if ($a<100){
if ($a%10==0){
switch ($a){
case 20: return 'vingt';
case 30: return 'trente';
case 40: return 'quarante';
case 50: return 'cinquante';
case 60: return 'soixante';
case 70: return 'soixante-dix';
case 80: return 'quatre-vingt';
case 90: return 'quatre-vingt-dix';
}
} elseif (substr($a, -1)==1){
if( ((int)($a/10)*10)<70 ){
return int2str((int)($a/10)*10).'-et-un';
} elseif ($a==71) {
return 'soixante-et-onze';
} elseif ($a==81) {
return 'quatre-vingt-un';
} elseif ($a==91) {
return 'quatre-vingt-onze';
}
} elseif ($a<70){
return int2str($a-$a%10).'-'.int2str($a%10);
} elseif ($a<80){
return int2str(60).'-'.int2str($a%20);
} else{
return int2str(80).'-'.int2str($a%20);
}
} else if ($a==100){
return 'cent';
} else if ($a<200){
return int2str(100).' '.int2str($a%100);
} else if ($a<1000){
return int2str((int)($a/100)).' '.int2str(100).' '.int2str($a%100);
} else if ($a==1000){
return 'mille';
} else if ($a<2000){
return int2str(1000).' '.int2str($a%1000).' ';
} else if ($a<1000000){
return int2str((int)($a/1000)).' '.int2str(1000).' '.int2str($a%1000);
}
else if ($a==1000000){
return 'millions';
}
else if ($a<2000000){
return int2str(1000000).' '.int2str($a%1000000).' ';
}
else if ($a<1000000000){
return int2str((int)($a/1000000)).' '.int2str(1000000).' '.int2str($a%1000000);
}
}

?>
	<script>
        function printContent(id){
           $("#print").hide();
           $("#retour").hide();
            var restorepage = document.body.innerHTML;
            var printContent = document.getElementById(id).innerHTML;
            document.body.innerHTML = printContent;
            window.print();
            document.body.innerHTML = restorepage;
            $("#print").show();
            $("#retour").show();
        }
    </script>