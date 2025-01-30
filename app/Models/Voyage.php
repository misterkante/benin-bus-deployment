<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * Class Voyage
 *
 * @property int $id
 * @property Carbon $date_voyage
 * @property Carbon $heure_depart
 * @property int $trajet_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Trajet $trajet
 * @property Collection|Bu[] $bus
 * @property Collection|Ticket[] $tickets
 *
 * @package App\Models
 */
class Voyage extends Model
{
    use HasFactory, HasApiTokens, Notifiable;
	protected $table = 'voyages';

	protected $casts = [
		'date_voyage' => 'datetime',
		'heure_depart' => 'datetime',
		'ligne_id' => 'int'
	];

	protected $fillable = [
		'date_voyage',
		'heure_depart',
		'ligne_id'
	];

	public function ligne()
	{
		return $this->belongsTo(Ligne::class);
	}

	public function bus()
	{
		return $this->belongsToMany(Bu::class, 'bu_voyages', 'voyage_id', 'bus_id')
					->withPivot('id', 'places_disponibles')
					->withTimestamps();
	}

	public function tickets()
	{
		return $this->hasMany(Ticket::class);
	}
}
