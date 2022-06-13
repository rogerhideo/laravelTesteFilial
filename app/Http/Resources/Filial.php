<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;

class Filial extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'nome' => $this->nome,
            'cidade' => $this->cidade,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude
        ];
    }
}
