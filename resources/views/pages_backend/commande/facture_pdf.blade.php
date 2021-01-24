<!doctype html>
<html class="no-js " lang="fr">

<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="" content="">

<title>CAGE E-Commerce - Administration</title>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body class="theme-blush">

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

<section class="content">

   <div class="page-header">
     
    </div>
   
       <div class="row" id="dataTable">
            <div class="col-md-12 body-main">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4"> <img class="img" alt="Invoce Template" src="{{asset('css_frontend/images/logo2.png')}}" /><p style="margin-left:20px;font-size:15px">CAGE BAT E-commerce</p>
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
                          $numero= $annee."/CAGE-BAT/0000".$commande->numero_facture;
                        ?>
                        <div class="col-md-12 text-center float">
                            <h2><u>FACTURE N° {{$numero}}</u></h2> 
                        </div>
                        <div class="col-md-6 text-left">
                            <h4 style="color: black;"><strong>{{$user->nom_user}} {{$user->prenom_user}}</strong></h4>
                            <p>{{$user->email_user}}</p>
                            <p>(+228) {{$user->telephone_user}}</p>
                        </div>

                        <div class="col-md-6 text-left">
                            <h4 style="color: black;"><strong><u>Adresse de livraison</u></strong></h4>
                            <p> Ville : {{$adresse->ville_adresse}}</p>
                            <p> Pays : {{$adresse->pays_adresse}}</p>
                            <p> Description : {{$adresse->description_adresse}}</p>
                        </div>

                    </div> <br />
                    <div>
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>
                                       Libelle
                                    </th>
									<th>
                                        Quantite
                                    </th>
									<th>
                                        Prix Unitaire
                                    </th>
                                    <th>
                                        Total
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
							@foreach($commandes as $commande)
                                <tr>
                                    <td>{{$commande->nom_produit}}</td>
									<td>{{$commande->quantite_commande}}</td>
									<td>{{$commande->prix_ht_produit}}</td>
                                    <td>{{$commande->prix_ht_produit*$commande->quantite_commande}}</td>
                                </tr>
                            @endforeach 
                               
                                <tr scope="col" colspan="5" rowspan="1" class="text-center">
									<th colspan="3"  style="font-size:17px;"> SOUS TOTAL</th>
									<th colspan="2"  style="font-size:17px;"> <?php echo $prix_total?> F CFA</th>
								</tr>

                                <tr scope="col" colspan="5" rowspan="1" class="text-center">
									<th colspan="3"  style="font-size:17px;">FRAIS DE LIVRAISON</th>
									<th colspan="2"  style="font-size:17px;"> 0 F CFA</th>
								</tr>
                              
                                <tr scope="col" colspan="5" rowspan="1" class="text-center">
									<th colspan="3"  style="font-size:17px;">REMISE</th>
									<th colspan="2"  style="font-size:17px;">0 %</th>
								</tr>

                                <tr scope="col" colspan="5" rowspan="1" class="text-center">
									<th colspan="3"  style="font-size:20px; color:red"> TOTAL A PAYER</th>
									<th colspan="2"  style="font-size:20px;"> <?php echo $prix_total?> F CFA</th>
								</tr>
                               
                            </tbody>
                        </table>
                    </div>
                    <div>
                        <div class="col-md-12">
                            <p  class="text-left" style="font-size:18px; text-align: right; margin-top:40px">
									 <i>La présente facture est arrêtée à la somme de <b style="font-size:20px;color:red"><?php echo int2str($prix_total)?> F CFA</b> </i></p>
										
									<p  class="text-right" style="text-align: right; margin-top:40px">
									 Fait à Lomé, le <?php setlocale(LC_TIME, "fr_FR","French");
										echo $date = utf8_encode(strftime("%d %B %Y", strtotime($commande->date_commande))); ?> </p>
									<p class="text-right" style="text-align: right; margin-top:40px"><b>Signature</b></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
</section>

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

