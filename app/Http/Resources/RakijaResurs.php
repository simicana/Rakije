<?php

namespace App\Http\Resources;

use App\Models\Vrsta;
use App\Models\Destilerija;
use Illuminate\Http\Resources\Json\JsonResource;

class RakijaResurs extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $vrsta = Vrsta::find($this->vrstaId);
        $destilerija = Destilerija::find($this->destilerijaId);

        return [
            'id' => $this->id,
            'naziv' => $this->naziv,
            'ambalaza' => $this->ambalaza,
            'vrsta' => $vrsta->vrsta,
            'destilerija' => $destilerija->destilerija
        ];
    }
}
