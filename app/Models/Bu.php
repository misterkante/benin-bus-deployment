<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Bu
 *
 * @property int $id
 * @property string $immatriculation
 * @property string $places
 * @property string $statut
 * @property int $compagnie_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property User $user
 * @property Collection|Voyage[] $voyages
 *
 * @package App\Models
 */
class Bu extends Model
{
    use HasFactory;

	protected $table = 'bus';

	protected $casts = [
		'compagnie_id' => 'int',
		'places' => 'string',
	];

	protected $fillable = [
		'immatriculation',
		'places',
		'statut',
		'compagnie_id'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'compagnie_id');
	}

	public function voyages()
	{
		return $this->belongsToMany(Voyage::class, 'bu_voyages', 'bus_id')
					->withPivot('id', 'places_disponibles')
					->withTimestamps();
	}
}
