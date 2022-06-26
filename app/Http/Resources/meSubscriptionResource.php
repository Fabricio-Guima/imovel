<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class meSubscriptionResource extends JsonResource
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
            'stripe_status' => $this->stripe_status,
            'ends_at' => $this->ends_at,
            'created_at' => $this->created_at,
        ];
    }
}
