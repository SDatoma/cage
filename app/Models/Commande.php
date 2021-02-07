<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Commande
 * 
 * @property int $id_commande
 * @property Carbon|null $date_commande
 * @property int|null $etat_commande
 * @property string|null $reference_commande
 * @property int|null $id_user
 * @property int|null $id_adresse
 * @property int|null $frais_livraison
 * @property string|null $numero_facture
 * @property Carbon|null $date_livraison
 *
 * @package App\Models
 */
class Commande extends Model
{
	protected $table = 'commande';
	protected $primaryKey = 'id_commande';
	public $timestamps = false;

	protected $casts = [
		'etat_commande' => 'int',
		'id_user' => 'int',
		'id_adresse' => 'int',
		'frais_livraison' => 'int'
	];

	protected $dates = [
		'date_commande',
		'date_livraison'
	];

	protected $fillable = [
		'date_commande',
		'etat_commande',
		'reference_commande',
		'id_user',
		'id_adresse',
		'frais_livraison',
		'numero_facture',
		'date_livraison'
	];
}
