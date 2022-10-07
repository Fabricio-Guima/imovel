<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PropertyResource;
use App\Repositories\PropertyRepository;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    protected $repository;

    public function __construct(PropertyRepository $propertyRepository)
    {
        $this->repository = $propertyRepository;
    }

    public function index()
    {
        $proporties = $this->repository->getAllProperties();
        return  PropertyResource::collection($proporties);
    }

    public function show()
    {
    }

    public function store(Request $request)
    {
        dd($request->all());
    }

    public function update()
    {
    }

    public function delete()
    {
    }
}
