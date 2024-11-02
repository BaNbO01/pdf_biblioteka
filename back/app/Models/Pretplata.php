<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Pretplata extends Model
{
    use HasFactory;

    protected $table = 'pretplate';

    protected $fillable = [
        'brojUMesecima',
        'cena',
    ];

    public function korisnici(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'korisnik_pretplata')
                    ->withPivot('datum_pocetka', 'datum_isteka')
                    ->withTimestamps();
    }
}
