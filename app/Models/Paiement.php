<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Paiement
 * 
 * @property int $id
 * @property float $montant
 * @property Carbon $date_paiement
 * @property int $ticket_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Ticket $ticket
 *
 * @package App\Models
 */
class Paiement extends Model
{
	protected $table = 'paiements';

	protected $casts = [
		'montant' => 'float',
		'date_paiement' => 'datetime',
		'ticket_id' => 'int'
	];

	protected $fillable = [
		'montant',
		'date_paiement',
		'ticket_id'
	];

	public function ticket()
	{
		return $this->belongsTo(Ticket::class);
	}
}
