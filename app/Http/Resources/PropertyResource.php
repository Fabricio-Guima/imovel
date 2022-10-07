<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PropertyResource extends JsonResource
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
            'id' => $this->id,
            'total_bathrooms' => $this->total_bathrooms,
            'total_area' => $this->total_area,
            'total_suites' => $this->total_suites,
            'total_garages' => $this->total_garages,
            'sale_value' => $this->sale_value,
            'total_garages' => $this->total_garages,
            'condo' => $this->condo,
            'iptu_value' => $this->iptu_value,
            'description' => $this->description,
        ];
    }
}
