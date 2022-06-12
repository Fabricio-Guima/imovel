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
        return $this->entity::create($data);
    }

    public function updateTenant(string $identify, array $data)
    {
        $tenant = $this->entity::findOrFail($identify);

        return $tenant->update($data);
    }
}
