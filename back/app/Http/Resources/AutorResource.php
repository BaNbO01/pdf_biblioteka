<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AutorResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'ime' => $this->ime,
            'prezime' => $this->prezime,
            'datum_rodjenja' => $this->datum_rodjenja,
            'datum_smrti' => $this->datum_smrti,
        ];
    }
}
