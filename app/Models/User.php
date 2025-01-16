<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;


/**
 * Class User
 *
 * @property int $id
 * @property string|null $nom
 * @property string|null $prenom
 * @property string|null $nom_compagnie
 * @property string|null $telephone
 * @property string|null $image
 * @property string $longitude
 * @property string $latitude
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $created_by
 *
 * @property Collection|Bu[] $bus
 * @property Collection|Ligne[] $lignes
 * @property Collection|Ticket[] $tickets
 *
 * @package App\Models
 */
class User extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;

	protected $table = 'users';

	protected $casts = [
		'email_verified_at' => 'datetime'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'nom',
		'prenom',
		'nom_compagnie',
		'telephone',
		'image',
		'longitude',
		'latitude',
		'email',
		'email_verified_at',
		'password',
		'remember_token',
		'created_by'
	];

	public function bus()
	{
		return $this->hasMany(Bu::class, 'compagnie_id');
	}

	public function lignes()
	{
		return $this->hasMany(Ligne::class, 'compagnie_id');
	}

	public function tickets()
	{
		return $this->hasMany(Ticket::class);
	}
}
