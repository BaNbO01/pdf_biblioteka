<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'ime' => $this->ime,
            'prezime' => $this->prezime,
            'rola' => $this->rola,
            'datum_pretplate' => $this->pretplate->pivot->datum_pocetka ?? null,
            'datum_isteka' => $this->pretplate->pivot->datum_isteka ?? null,
            'pretplata' => new PretplataResource($this->pretplate),
        ];
    }
}
