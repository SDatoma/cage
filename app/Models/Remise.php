<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Promotion
 * 
 * @property int $id_remise
 *
 *  
 * @package App\Models
 */
class Remise extends Model
{
	protected $table = 'remise';
	protected $primaryKey = 'id_remise';
	public $timestamps = false;

	protected $casts = [
		'pourcentage_remise' => 'int',
		'id_produit' => 'int'
	];

	protected $fillable = [
		'pourcentage_promotion',
		'code_promotion',
		'date_debut_promotion',
		'date_fin_promotion',
		'id_produit'
	];

	public function produit()
	{
		return $this->belongsTo(Produit::class, 'id_produit');
	}
}
