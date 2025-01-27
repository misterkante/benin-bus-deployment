<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Trajet
 *
 * @property int $id
 * @property int $duree
 * @property float $prix
 * @property int $depart_id
 * @property int $arrivee_id
 * @property int $ligne_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Arret $arret
 * @property Ligne $ligne
 * @property Collection|Voyage[] $voyages
 *
 * @package App\Models
 */
class Trajet extends Model
{
    use HasFactory;

	protected $table = 'trajets';

	protected $casts = [
		'duree' => 'int',
		'prix' => 'float',
		'depart_id' => 'int',
		'arrivee_id' => 'int',
		'ligne_id' => 'int'
	];

	protected $fillable = [
		'duree',
		'prix',
		'depart_id',
		'arrivee_id',
		'ligne_id'
	];

	public function arret()
	{
		return $this->belongsTo(Arret::class, 'depart_id');
	}


	// Relation avec l'arrêt de départ
	public function depart()
	{
		return $this->belongsTo(Arret::class, 'depart_id');
	}



	// Relation avec l'arrêt d'arrivée
	public function arrivee()
	{
		return $this->belongsTo(Arret::class, 'arrivee_id');
	}



	public function ligne()
	{
		return $this->belongsTo(Ligne::class);
	}

	public function voyages()
	{
		return $this->hasMany(Voyage::class);
	}
}
