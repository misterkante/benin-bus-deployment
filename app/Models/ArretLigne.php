<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ArretLigne
 * 
 * @property int $id
 * @property int $ordre
 * @property int $ligne_id
 * @property int $arret_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Arret $arret
 * @property Ligne $ligne
 *
 * @package App\Models
 */
class ArretLigne extends Model
{
	protected $table = 'arret_lignes';

	protected $casts = [
		'ordre' => 'int',
		'ligne_id' => 'int',
		'arret_id' => 'int'
	];

	protected $fillable = [
		'ordre',
		'ligne_id',
		'arret_id'
	];

	public function arret()
	{
		return $this->belongsTo(Arret::class);
	}

	public function ligne()
	{
		return $this->belongsTo(Ligne::class);
	}
}
