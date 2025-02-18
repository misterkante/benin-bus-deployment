<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Bus;

/**
 * Class Ticket
 *
 * @property int $id
 * @property int $code_ticket
 * @property float $prix
 * @property int $siege
 * @property string $statut
 * @property int $depart_id
 * @property int $arrivee_id
 * @property int $user_id
 * @property int $voyage_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Arret $arret
 * @property User $user
 * @property Voyage $voyage
 *
 * @package App\Models
 */
class Ticket extends Model
{
    protected $table = 'tickets';

    protected $casts = [
        'prix' => 'float',
        'trajet_id' => 'int',
        'user_id' => 'int',
        'voyage_id' => 'int',
        'bus_id'  => 'int'
    ];

    protected $fillable = [
        'code_ticket',
        'prix',
        'siege',
        'statut',
        'trajet_id',
        'user_id',
        'bus_id',
        'voyage_id'
    ];

    public function trajet()
    {
        return $this->belongsTo(Trajet::class);
    }

    public function bus()
    {
        return $this->belongsTo(Bus::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function voyage()
    {
        return $this->belongsTo(Voyage::class);
    }
}
