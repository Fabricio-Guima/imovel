<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PlanResource extends JsonResource
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
            'name' => $this->name,
            'stripe_id' => $this->stripe_id,
            'slug' => $this->slug,
            'price' => $this->price,
            'description' => $this->description,
            'details' => DetailResource::collection($this->details)
        ];
    }
}
