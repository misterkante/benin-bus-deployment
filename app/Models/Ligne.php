<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use App\Events\LigneCreated;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class Ligne
 *
 * @property int $id
 * @property string $nom
 * @property int|null $compagnie_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property User|null $user
 * @property Collection|Arret[] $arrets
 * @property Collection|Trajet[] $trajets
 *
 * @package App\Models
 */
class Ligne extends Model
{
    protected $table = 'lignes';

    protected $casts = [
        'compagnie_id' => 'int'
    ];

    protected $fillable = [
        'nom',
        'distance_km',
        'compagnie_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'compagnie_id');
    }

    public function arrets()
    {
        return $this->belongsToMany(Arret::class, 'arret_lignes')
            ->withPivot('id', 'ordre')
            ->withTimestamps();
    }

    public function trajets()
    {
        return $this->hasMany(Trajet::class);
    }

    
}
