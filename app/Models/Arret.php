<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Arret
 * 
 * @property int $id
 * @property string $nom
 * @property string $longitude
 * @property string $latitude
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Ligne[] $lignes
 * @property Collection|Ticket[] $tickets
 * @property Collection|Trajet[] $trajets
 *
 * @package App\Models
 */
class Arret extends Model
{
	protected $table = 'arrets';

	protected $fillable = [
		'nom',
		'longitude',
		'latitude'
	];

	public function lignes()
	{
		return $this->belongsToMany(Ligne::class, 'arret_lignes')
					->withPivot('id', 'ordre')
					->withTimestamps();
	}

	public function tickets()
	{
		return $this->hasMany(Ticket::class, 'depart_id');
	}

	public function trajets()
	{
		return $this->hasMany(Trajet::class, 'depart_id');
	}
}
