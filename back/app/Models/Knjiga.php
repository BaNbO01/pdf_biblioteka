<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Knjiga extends Model
{
    use HasFactory;

    protected $table = 'knjige';

    protected $fillable = [
        'naziv',
        'putanja_slike',
        'putanja_pdf',
    ];


    public function autori(): BelongsToMany
    {
        return $this->belongsToMany(Autor::class, 'autor_knjiga');
    }

    
    public function zanrovi(): BelongsToMany
    {
        return $this->belongsToMany(Zanr::class, 'knjiga_zanr');
    }
}
