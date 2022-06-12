<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TenantResource extends JsonResource
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
            'plan_id' => $this->plan_id,
            'status' => $this->status,
            'isCnpj' => $this->isCnpj,
            'cnpj' => $this->cnpj,
            'name' => $this->name,
            'slug' => $this->slug,
            'email' => $this->email,
            'logo' => $this->logo,
        ];
    }
}
