<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TypeRequest;
use App\Http\Resources\TypeResource;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index()
    {
        return TypeResource::collection(Type::get());
    }

    public function show(Type $typeId)
    {
        return new TypeResource($typeId);
    }

    public function store(TypeRequest $request)
    {
        $type = Type::create($request->validated());
        return new TypeResource($type);
    }

    public function update(string $typeId, TypeRequest $request)
    {
        $type = Type::findOrFail($typeId);
        $type->update($request->validated());
        return $type;
    }

    public function destroy(string $typeId)
    {
        $type = Type::findOrFail($typeId);
        $type->delete();
        return $type;
    }
}
