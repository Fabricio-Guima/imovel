<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'email' => $this->email,
            'isSubscribed' => $this->subscribed('default') ?? false,
            'onGracePeriod' => $this->subscription('default') ? $this->subscription('default')->onGracePeriod() : false,
            'cancelled' =>  $this->subscription('default') ? $this->subscription('default')->cancelled() : false
        ];
    }
}
