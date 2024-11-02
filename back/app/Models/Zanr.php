<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Zanr extends Model
{
    use HasFactory;

    protected $table = 'zanrovi';

    protected $fillable = [
        'naziv',
    ];

    public function knjige(): BelongsToMany
    {
        return $this->belongsToMany(Knjiga::class, 'knjiga_zanr');
    }
}
