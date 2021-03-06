<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//TEST ENVOI MAIL 
Route::get('/testmail','TestController@testmail');
Route::post('/testmail','TestController@testmail1')->name('envoi.mail');

// ROUTE FRONT-END
Route::get('/', 'IndexController@index');
Route::get('/tri-categorie-{id_categorie}-produit-{libelle_categorie}', 'IndexController@tri_produit_par_categorie')->name('tri.produit.categorie');

Route::get('/tri-sous-categorie-{id_categorie}-produit-{id_sous_categorie}-{libelle_sous_categorie}', 'IndexController@tri_produit_par_sous_categorie')->name('tri.produit.sous_categorie');

Route::get('/detail-produit /{id}','ProduitController@detail_produit')->name('detail-produit.produit');

Route::post('/recherche','IndexController@recherche_produit')->name('recherche.produit');
Route::get('/recherche','IndexController@recherche_produit');

Route::get('/contact','IndexController@page_contact');

Route::get('/condition-general','IndexController@condition_general');

Route::get('/politique-confidentialite','IndexController@politique_confidentialite');

Route::get('/login','ConnexionController@index');

Route::get('/inscription','ConnexionController@register');

Route::get('/deconnexion','ConnexionController@deconnection');

Route::get('/histotique-achats', 'CommandeController@historique_achat');

Route::get('/meilleurs-ventes','CommandeController@meileurs_ventes_clients');

Route::get('/mot-de-passe-oublier','InscriptionController@passe_oublier');

Route::get('/nouveau-mot-de-passe/{id}','ForgetPasseController@edit');



/****************************

	ROUTE BACKEND

****************************/
Route::group(['middleware' => ['connexion']], function () {

    // Route pour le client
    
    Route::get('/detail-profil-client','InscriptionController@show_profil_client')->name('profil.client');

    Route::get('/info_personel','InscriptionController@show_profil_client')->name('info.client');
    
    Route::get('/detail-info-client','InscriptionController@show_info_client')->name('info.perso');
    
    Route::get('/changer-passe','InscriptionController@passe_client')->name('client.page_passe');
    
    Route::put('/mot-de-passe-client/{id}','InscriptionController@update_passe_client')->name('client.passe_update');
    
    Route::get('/mes-adresses','AdresseController@liste_adresse_client');
    
    Route::get('/ajouter-adresse','AdresseController@show_adresse_client');

    Route::get('/détail_historique/{id}/{reference_commande}', 'CommandeController@detail_historique')->name('voir.detail');
    
    Route::get('/modifier-adresse/{id}','AdresseController@modifier_adresse_client')->name('client.adresse');


Route::get('/admin', 'AdminController@index');
//Boutique
Route::get('/add/boutique', 'FournisseurController@create');
Route::get('/list/boutique', 'FournisseurController@getBoutique');

//Categorie
Route::get('/list/categorie', 'CategorieController@getAllCategorie');
Route::get('/list/sous/categorie', 'CategorieController@getAllSousCategorie');
Route::post('/add/sous/categorie', 'CategorieController@store_sous_categorie')->name('sous_categorie.store');
Route::put('/update/sous/{id}categorie', 'CategorieController@update_sous_categorie')->name('sous_categorie.update');

//Produits
Route::get('/add/produit', 'ProduitController@create');
Route::get('/list/produit', 'ProduitController@getAllProduit');
Route::post('/promotion/produit', 'ProduitController@promotionProduit')->name('promotion.produit');
Route::delete('delete/promotion/produit/{id}', 'ProduitController@destroyPromotion')->name('delete.promotion');
Route::put('update/promotion/produit/{id}', 'ProduitController@updatePromotion')->name('update.promotion');
Route::put('update/stock/produit/{id}', 'ProduitController@updateStock')->name('update.stock');
Route::put('update/image/produit/{id}', 'ProduitController@update_produit_image')->name('update.produit.image');
Route::delete('delete/image/produit/{id}', 'ProduitController@delete_produit_image')->name('delete.produit.image');
Route::post('/image/produit', 'ProduitController@ajouter_produit_image')->name('ajouter.produit.image');

//Commande
Route::get('/list/commande/attente', 'CommandeController@getAllCommandeUser');
Route::get('/list/commande/valider', 'CommandeController@getAllCommandeValider');
Route::get('/list/client', 'CommandeController@getAllUser');
Route::get('/commande/download/facture/{id}/pdf/{reference_commande}', 'CommandeController@download_facture')->name('download.facture');
Route::get('/commande/voir/facture/{id}/{reference_commande}', 'CommandeController@vOIRfACTURE')->name('voir.facture');
Route::get('/statistique/stock', 'StockController@index');

//Paiement


//Slider
Route::get('/list/slider', 'SliderController@getAllSlider');

//Ville
Route::get('/list/ville', 'VilleController@getAllVille');

//Role
Route::get('/list/role', 'RoleController@getAllRole');

//Utilisateur
Route::get('/list/utilisateur', 'UtilisateurController@getAllUtilisateur');
Route::get('/affecte/role/{id}', 'UtilisateurController@utilisateurRole')->name('affecte.role');

//Emailing
Route::get('/list/email', 'EmailingController@getAllEmail');
Route::get('/envoi/email/{id}', 'EmailingController@reenvoiMail')->name('reenvoi.mail');
Route::post('/envoi/email/personnaliser', 'EmailingController@EmailPersonnaliser');

});



//cart
Route::get('/empty', 'CartController@emptyCart');
Route::get('/panier', 'CartController@getAll');
Route::get('/checkout','CommandeController@checkout');

//LES RESOURCES
Route::resource('fournisseur', 'FournisseurController');
Route::resource('ville', 'VilleController');
Route::resource('utilisateur', 'UtilisateurController');
Route::resource('role', 'RoleController');
Route::resource('email', 'EmailingController');
Route::resource('paiement', 'PaiementController');
Route::resource('commentaire', 'CommentaireController');
Route::resource('cart', 'CartController');
Route::resource('categorie', 'CategorieController');
Route::resource('produit', 'ProduitController');
Route::resource('stock', 'StockController');
Route::resource('commande', 'CommandeController');
Route::resource('client', 'InscriptionController');
Route::resource('slider', 'SliderController');
Route::resource('connexion', 'ConnexionController');
Route::resource('remise', 'RemiseController');
Route::resource('news', 'NewsController');
Route::resource('adresse', 'AdresseController');
Route::resource('message', 'ContactController');
Route::resource('password', 'ForgetPasseController');
Route::resource('affectation', 'AffecterRoleController');

