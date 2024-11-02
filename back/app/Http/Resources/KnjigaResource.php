<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class KnjigaResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'naziv' => $this->naziv,
            'autori' => AutorResource::collection($this->autori), 
            'zanrovi' => ZanrResource::collection($this->zanrovi), 
            'ikonica' => $this->putanja_slike,
            'putanja_pdf' => $this->putanja_pdf,
        ];
    }
}
