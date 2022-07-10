<?php

namespace App\Repositories;

use App\Models\Tenant;

class TenantRepository
{
    protected $entity;

    public function __construct(Tenant $model)
    {
        $this->entity = $model;
    }

    public function getAllTenants()
    {
        return $this->entity::get();
    }

    public function getTenant(string $identify)
    {
        return $this->entity::findOrFail($identify);
    }

    public function createTenant(array $data)
    {


        $tenant = $this->entity->create([
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

        $tenant->users()->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        return  $tenant;
    }

    public function updateTenant(string $identify, array $data)
    {

        $tenant = $this->entity::findOrFail($identify);

        $tenant->update($data);

        return $tenant;

        // return $tenant->update($data);
    }
}
