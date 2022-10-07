<?php

namespace App\Repositories;

use App\Models\Property;

class PropertyRepository
{
    protected $entity;

    public function __construct(Property $model)
    {
        $this->entity = $model;
    }

    public function getAllProperties()
    {
        return $this->entity::get();
    }

    public function getProperty(string $identify)
    {
        return $this->entity::findOrFail($identify);
    }

    public function createProperty(array $data)
    {
        $property = $this->entity->create([
            'plan_id' => $data['plan_id'],
            'status' => $data['status'],
            'isCnpj' => $data['isCnpj'],
            'cnpj' => $data['cnpj'],
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'whatsapp' => $data['whatsapp'],
            'telegram' => $data['telegram'],
            'logo' => $data['logo'],
        ]);

        $property->users()->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        return  $property;
    }

    public function updateProperty(string $identify, array $data)
    {

        $property = $this->entity::findOrFail($identify);

        $property->update($data);

        return $property;

        // return $tenant->update($data);
    }
}
