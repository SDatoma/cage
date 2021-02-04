<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Produit;
use App\Models\Commande;
use App\Models\Adresse;
use App\Models\Remise;
use App\Models\Ville;
use App\Models\LigneCommande;
use ShoppingCart;
use Mail;
use App\Mail\EnvoiFacture;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use PDF;
use Alert;
use CinetPay\CinetPay;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // Recupration de la date du jour
         $date_jour=date('Y-m-d');
         $id_user= Cookie::get('id_user');
         $total=ShoppingCart::total();

         $user = User::where(['id_user' =>$id_user])->first() ;
         
        // Mail::to($user->email_user)->send(new EnvoiFacture($user->nom_user, $user->prenom_user, $user->email_user,$user->telephone_user));

        // Mail::to("cagebat@gmail.com")->send(new TestMail($user->nom_user, $user->prenom_user, "null","null"));
            //     $e_nom = "Commande de $user->nom_user  $user->prenom_user" ;
            //     $email = "fofanabilali2014@gmail.com"; 
            //     // titre du mail
            //     $titre ="Alert Commande"; 
				
            //     $description ="Une commande vient d'etre passee merci de prendre en compte" ; 

            //     $contact = "Contact: +228 70 45 37 85 | 96 35 80 90 | 90 90 49 03 </br> Email: cagetogo@gmail.com </br>  Site Web : www.cagebatiment.com" ;

            //     $contenu = $e_nom . '<br /><br />' . $description .'<br /><br /><br />'.$contact ;


            //     // envoi du mail HTML
            //     $from = "From: CAGE Bâtiment <cagetogo@gmail.com>\nMime-Version:";
            //     $from .= " 1.0\nContent-Type: text/html; charset=ISO-8859-1\n";
            //     // envoie du mail
            //    mail($email,$titre,$contenu,$from);
         
         $chars = "abcdefghijkmnopqrstuvwxyz023456789";
         srand((double)microtime()*1000000);
         $i = 0 ;
         $code = '' ;
         while ($i <= 4) {
             $num = rand() % 33;
             $tmp = substr($chars, $num, 1);
             $code = $code . $tmp;
             $i++;
         }

         $dernier_numero = DB::table('commande') ->latest('numero_facture') ->first();
          
         if($dernier_numero==null){
             $numero=1;
         }else{
            $numero=$dernier_numero->numero_facture+1;
         }
         
         if( $total > 100000 || $request->mode=="magasin"){
           $frais_livraison=0;
         }else{
            $frais_livraison=1000; 
         }
        
         $commande = new Commande();
         
         $commande->reference_commande= $code;
         $commande->date_commande= $date_jour;
         $commande->etat_commande= 0;
         $commande->id_adresse= $request->id_adresse;
         $commande->numero_facture=  $numero;
         $commande->frais_livraison= $frais_livraison;
         $commande->id_user= Cookie::get('id_user');
    
         $commande->save();

         $items = ShoppingCart::all();

         foreach($items as $item){
           
            $ligne_commande = new LigneCommande();
         
         $ligne_commande->reference_commande= $code;
         $ligne_commande->quantite_commande= $item->qty;
         $ligne_commande->prix_commande= $item->total;
         $ligne_commande->id_commande= $commande->id_commande;
         $ligne_commande->id_produit= $item->id;
    
         $ligne_commande->save();

         }

        if($request->mode=="domicile" || $request->mode=="magasin")
         {
         ShoppingCart::destroy();
         return redirect()->to('/')->with('success', 'Conmande effectuée avec succè');
         }
         else{
            $apiKey = "12912847765bc0db748fdd44.40081707"; //Veuillez entrer votre apiKey
            $site_id = "445160"; //Veuillez entrer votre siteId
            $id_transaction = CinetPay::generateTransId(); // Identifiant du Paiement
            $description_du_paiement = sprintf('Mon produit de ref %s', $id_transaction); // Description du Payment
            $date_transaction = date("Y-m-d H:i:s"); // Date Paiement dans votre système
            $montant_a_payer = ShoppingCart::total(); // Montant à Payer : minimun est de 100 francs sur CinetPay
            $devise = 'XOF'; // Montant à Payer : minimun est de 100 francs sur CinetPay
            $identifiant_du_payeur = Cookie::get('id_user'); // Mettez ici une information qui vous permettra d'identifier de façon unique le payeur
            $formName = "goCinetPay"; // nom du formulaire CinetPay
            $notify_url = ''; // Lien de notification CallBack CinetPay (IPN Link)
            $return_url = ''; // Lien de retour CallBack CinetPay
            $cancel_url = ''; // Lien d'annulation CinetPay
            // Configuration du bouton
            $btnType = 2;//1-5xwxxw
            $btnSize = 'large'; // 'small' pour reduire la taille du bouton, 'large' pour une taille moyenne ou 'larger' pour  une taille plus grande
            
            // Paramétrage du panier CinetPay et affichage du formulaire
            $cp = new CinetPay($site_id, $apiKey);
            try {
                $cp->setTransId($id_transaction)
                    ->setDesignation($description_du_paiement)
                    ->setTransDate($date_transaction)
                    ->setAmount($montant_a_payer)
                    ->setCurrency($devise)
                    ->setDebug(true)// Valorisé à true, si vous voulez activer le mode debug sur cinetpay afin d'afficher toutes les variables envoyées chez CinetPay
                    ->setCustom($identifiant_du_payeur)// optional
                    ->setNotifyUrl($notify_url)// optional
                    ->setReturnUrl($return_url)// optional
                    ->setCancelUrl($cancel_url)// optional
                    ->displayPayButton($formName, $btnType, $btnSize);
            } catch (Exception $e) {
                print $e->getMessage();
            }

            ShoppingCart::destroy();
         }

    }


    public function getAllCommandeUser()
    {
          $commandes = DB::table('commande')
          ->where('commande.etat_commande', '=', 0)
          ->get();

        return view('pages_backend/commande/list_commande_attente',compact('commandes'));
    }


    public function getAllCommandeValider()
    {
          $commandes = DB::table('commande')
          ->where('commande.etat_commande', '=', 1)
          ->get();

        return view('pages_backend/commande/list_commande_valider',compact('commandes'));
    }
	
	//historique commande client
	public function historique_achat()
    {
		$id_user= Cookie::get('id_user');
		
          $commandes = DB::table('commande')
          ->where('commande.id_user', '=', $id_user)
          ->get();
		  
        return view('pages_frontend/mes_achats',compact('commandes'));
    }
	
	//les meileurs ventes
	public function meileurs_ventes_clients(){

		$id_categorie=0 ;
		
		$meilleurs_ventes = DB::table('ligne_commande')
        ->join('produit', 'produit.id_produit', '=', 'ligne_commande.id_produit')
		//->orderBy('ligne_commande.id_produit', 'desc')
		->groupBy('ligne_commande.id_produit')
		->take(6)
        ->get();
		
		return view('pages_frontend/plus_vendu',compact('meilleurs_ventes','id_categorie'));

	}
	
	
	public function detail_historique($id,$reference_commande)
    {
        $user = User::where(['id_user' =>$id])->first() ;

        $commande = Commande::where(['reference_commande' =>$reference_commande])->first() ;

        $remise = Remise::where(['reference_commande' =>$reference_commande])->first() ;
         
        $adresse = Adresse::where(['id_adresse' =>$commande->id_adresse])->first() ;

        $commandes = DB::table('ligne_commande')
        ->join('commande', 'ligne_commande.id_commande', '=', 'commande.id_commande')
        //->join('user', 'user.id_user', '=', 'commande.id_user')
        ->join('produit', 'produit.id_produit', '=', 'ligne_commande.id_produit')
        ->where('commande.id_user', '=', $id)
        ->where('commande.reference_commande', '=', $reference_commande)
        ->get();

        $prix_total = DB::table('ligne_commande')
        ->join('commande', 'ligne_commande.id_commande', '=', 'commande.id_commande')
        //->join('user', 'user.id_user', '=', 'commande.id_user')
        ->join('produit', 'produit.id_produit', '=', 'ligne_commande.id_produit')
        ->where('commande.id_user', '=', $id)
        ->where('commande.reference_commande', '=', $reference_commande)
        ->sum('ligne_commande.prix_commande');

        return view('pages_frontend/details-historique-achats',compact('commandes','user','prix_total','adresse','commande','remise'));

    }
 

    public function getAllUser()
    {
          $users = DB::table('user')->get();
          $villes = Ville::where(['etat_ville' =>1])->get() ;

        return view('pages_backend/commande/list_client',compact('users','villes'));
    }

    public function checkout(){
        
        $id_user = $id_user= Cookie::get('id_user');
        $adresses = Adresse::where(['id_user' =>$id_user,'etat_adresse' =>1])->get() ;
		$id_categorie=0 ;
		
		return view('pages_frontend/checkout',compact('id_categorie','adresses'));
	}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }


    public function voirFacture($id,$reference_commande)
    {
        $user = User::where(['id_user' =>$id])->first() ;

        $commande = Commande::where(['reference_commande' =>$reference_commande])->first() ;

        $remise = Remise::where(['reference_commande' =>$reference_commande])->first() ;

        $adresse = Adresse::where(['id_adresse' =>$commande->id_adresse])->first() ;
        // si la commande n'est pas encore valider
        if($commande->etat_commande == 0)
        {
        $commandes = DB::table('ligne_commande')
        ->join('commande', 'ligne_commande.id_commande', '=', 'commande.id_commande')
        //->join('user', 'user.id_user', '=', 'commande.id_user')
        ->join('produit', 'produit.id_produit', '=', 'ligne_commande.id_produit')
        ->where('commande.id_user', '=', $id)
        ->where('commande.reference_commande', '=', $reference_commande)
        ->where('commande.etat_commande', '=', 0)
        ->get();

        $prix_total = DB::table('ligne_commande')
        ->join('commande', 'ligne_commande.id_commande', '=', 'commande.id_commande')
        //->join('user', 'user.id_user', '=', 'commande.id_user')
        ->join('produit', 'produit.id_produit', '=', 'ligne_commande.id_produit')
        ->where('commande.id_user', '=', $id)
        ->where('commande.reference_commande', '=', $reference_commande)
        ->where('commande.etat_commande', '=', 0)
        ->sum('ligne_commande.prix_commande');

        return view('pages_backend/commande/facturation',compact('commandes','user','prix_total','adresse','commande','remise'));

        // si la commande est deja valider

        }else{

        $commandes = DB::table('ligne_commande')
        ->join('commande', 'ligne_commande.id_commande', '=', 'commande.id_commande')
        //->join('user', 'user.id_user', '=', 'commande.id_user')
        ->join('produit', 'produit.id_produit', '=', 'ligne_commande.id_produit')
        ->where('commande.id_user', '=', $id)
        ->where('commande.reference_commande', '=', $reference_commande)
        ->where('commande.etat_commande', '=', 1)
        ->get();

        $remise = Remise::where(['reference_commande' =>$reference_commande])->first() ;

        $prix_total = DB::table('ligne_commande')
        ->join('commande', 'ligne_commande.id_commande', '=', 'commande.id_commande')
        //->join('user', 'user.id_user', '=', 'commande.id_user')
        ->join('produit', 'produit.id_produit', '=', 'ligne_commande.id_produit')
        ->where('commande.id_user', '=', $id)
        ->where('commande.reference_commande', '=', $reference_commande)
        ->where('commande.etat_commande', '=', 1)
        ->sum('ligne_commande.prix_commande');

        return view('pages_backend/commande/facturation',compact('commandes','user','prix_total','adresse','commande','remise'));

        }
    }


    public function download_facture($id,$reference_commande)
    {    
        $user = User::where(['id_user' =>$id])->first() ;

        $commande = Commande::where(['reference_commande' =>$reference_commande])->first() ;

        $remise = Remise::where(['reference_commande' =>$reference_commande])->first() ;

        $adresse = Adresse::where(['id_adresse' =>$commande->id_adresse])->first() ;
        // si la commande n'est pas encore valider
        $commandes = DB::table('ligne_commande')
        ->join('commande', 'ligne_commande.id_commande', '=', 'commande.id_commande')
        //->join('user', 'user.id_user', '=', 'commande.id_user')
        ->join('produit', 'produit.id_produit', '=', 'ligne_commande.id_produit')
        ->where('commande.id_user', '=', $id)
        ->where('commande.reference_commande', '=', $reference_commande)
        ->where('commande.etat_commande', '=', 0)
        ->get();

        $prix_total = DB::table('ligne_commande')
        ->join('commande', 'ligne_commande.id_commande', '=', 'commande.id_commande')
        //->join('user', 'user.id_user', '=', 'commande.id_user')
        ->join('produit', 'produit.id_produit', '=', 'ligne_commande.id_produit')
        ->where('commande.id_user', '=', $id)
        ->where('commande.reference_commande', '=', $reference_commande)
        ->where('commande.etat_commande', '=', 0)
        ->sum('ligne_commande.prix_commande');


         $pdf = PDF::loadView('pages_backend/commande/facture_pdf',['user'=>$user,'prix_total'=>$prix_total,'commandes'=>$commandes,'commande'=>$commande,'adresse'=>$adresse])->setPaper('a4', 'landscape');

        return $pdf->stream('facture.pdf');
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     // Validation de la commande
    public function destroy($id)
    {
         $date_jour=date('Y-m-d');
         $commande = Commande::where(['id_commande' =>$id])->first() ;

         $commande->etat_commande=1;
         $commande->date_livraison=$date_jour;
         $commande->save();

        return redirect()->back()->with('success', 'Conmande validée avec succè');;
    }
}
