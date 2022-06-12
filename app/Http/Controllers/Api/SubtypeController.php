<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubtypeRequest;
use App\Http\Resources\SubtypeResource;
use App\Models\Subtype;
use Illuminate\Http\Request;

class SubtypeController extends Controller
{
    public function index()
    {
        return SubtypeResource::collection(Subtype::get());
    }

    public function show(string $subtypeId)
    {
        return new SubtypeResource(Subtype::findOrFail($subtypeId));
    }

    public function store(SubtypeRequest $request)
    {
        $subtype = Subtype::create($request->validated());
        return new SubtypeResource($subtype);
    }

    public function update(string $subtypeId, SubtypeRequest $request)
    {
        $subtype = Subtype::findOrFail($subtypeId);
        $subtype->update($request->validated());
        return $subtype;
    }

    public function destroy(string $subtypeId)
    {
        $subtype = Subtype::findOrFail($subtypeId);
        $subtype->delete();
        return $subtype;
    }
}
