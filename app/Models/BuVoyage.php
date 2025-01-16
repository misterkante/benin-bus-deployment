<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BuVoyage
 * 
 * @property int $id
 * @property int $places_disponibles
 * @property int $bus_id
 * @property int $voyage_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Bu $bu
 * @property Voyage $voyage
 *
 * @package App\Models
 */
class BuVoyage extends Model
{
	protected $table = 'bu_voyages';

	protected $casts = [
		'places_disponibles' => 'int',
		'bus_id' => 'int',
		'voyage_id' => 'int'
	];

	protected $fillable = [
		'places_disponibles',
		'bus_id',
		'voyage_id'
	];

	public function bu()
	{
		return $this->belongsTo(Bu::class, 'bus_id');
	}

	public function voyage()
	{
		return $this->belongsTo(Voyage::class);
	}
}
