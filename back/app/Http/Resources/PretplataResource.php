<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PretplataResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'broj_u_mesecima' => $this->brojUMesecima,
            'cena' => $this->cena,
        ];
    }
}
