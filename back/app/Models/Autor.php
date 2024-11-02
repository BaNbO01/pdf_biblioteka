<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Autor extends Model
{
    use HasFactory;

    protected $table = 'autori';

    protected $fillable = [
        'ime',
        'prezime',
        'datum_rodjenja',
        'datum_smrti',
    ];

    /**
     * Relacija sa knjigama koje je autor napisao
     */
    public function knjige(): BelongsToMany
    {
        return $this->belongsToMany(Knjiga::class, 'autor_knjiga');
    }
}
