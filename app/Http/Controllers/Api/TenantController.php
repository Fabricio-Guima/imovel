<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TenantRequest;
use App\Http\Resources\TenantResource;
use App\Models\Tenant;
use App\Repositories\TenantRepository;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    protected $repository;

    public function  __construct(TenantRepository $tenantRepository)
    {
        $this->repository = $tenantRepository;
    }

    public function index()
    {
        return Tenant::get();
    }

    public function show(string $id)
    {
        $tenant = $this->repository->getTenant($id);
        return new TenantResource($tenant);
    }

    public function store(TenantRequest $request)
    {
        $tenant = $this->repository->createTenant($request->all());
        return  new TenantResource($tenant);
    }

    public function update(string $tenantId, TenantRequest $request)
    {

        $tenant = $this->repository->updateTenant($tenantId, $request->validated());

        return new TenantResource($tenant);
    }

    public function destroy(string $id)
    {
        $tenant = Tenant::findOrFail($id);

        $tenant->delete();

        return response()->json(['message' => 'Tenant deletado com sucesso']);
    }
}
