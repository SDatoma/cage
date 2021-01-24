<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Produit;
use App\Models\Commande;
use App\Models\adresse;
use App\Models\Remise;
use App\Models\LigneCommande;
use ShoppingCart;
use Mail;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use PDF;
use Alert;

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
        
         $user = User::where(['id_user' =>$id_user])->first() ;
         
         Mail::to($user->email_user)->send(new TestMail($user->nom_user, $user->prenom_user, $user->email_user,$user->telephone_user));
         
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
         $commande = new Commande();
         
         $commande->reference_commande= $code;
         $commande->date_commande= $date_jour;
         $commande->etat_commande= 0;
         $commande->id_adresse= $request->id_adresse;
         $commande->numero_facture=  $numero;
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

        ShoppingCart::destroy();
         //return back()->with('success', 'Sous categorie enregistrement effectuer avec succè');
         return redirect()->to('/')->with('success', 'Conmande effectuée avec succè');
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
	
	public function detail_historique($id,$reference_commande)
    {
        $user = User::where(['id_user' =>$id])->first() ;

        $commande = Commande::where(['reference_commande' =>$reference_commande])->first() ;
         
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

        return view('pages_frontend/details-historique-achats',compact('commandes','user','prix_total','adresse','commande'));

    }
 

    public function getAllUser()
    {
          $users = DB::table('user')->get();

        return view('pages_backend/commande/list_client',compact('users'));
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
