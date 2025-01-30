<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Escale
 * 
 * @property int $id
 * @property time without time zone $heure_depart
 * @property time without time zone $heure_arrivee
 * @property int|null $places_disponibles
 * @property int $arret_id
 * @property int $voyage_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Arret $arret
 * @property Voyage $voyage
 *
 * @package App\Models
 */
class Escale extends Model
{
	protected $table = 'escales';

	protected $casts = [
		'heure_depart' => 'time without time zone',
		'heure_arrivee' => 'time without time zone',
		'places_disponibles' => 'int',
		'arret_id' => 'int',
		'voyage_id' => 'int'
	];

	protected $fillable = [
		'heure_depart',
		'heure_arrivee',
		'places_disponibles',
		'arret_id',
		'voyage_id'
	];

	public function arret()
	{
		return $this->belongsTo(Arret::class);
	}

	public function voyage()
	{
		return $this->belongsTo(Voyage::class);
	}
}
