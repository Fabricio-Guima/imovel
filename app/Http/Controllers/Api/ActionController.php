<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ActionRequest;
use App\Http\Resources\ActionResource;
use App\Models\Action;
use Illuminate\Http\Request;

class ActionController extends Controller
{
    public function index()
    {
        return ActionResource::collection(Action::get());
    }

    public function show(string $actionId)
    {
        return new ActionResource(Action::findOrFail($actionId));
    }

    public function store(ActionRequest $request)
    {
        $type = Action::create($request->validated());
        return new ActionResource($type);
    }

    public function update(string $actionId, ActionRequest $request)
    {
        $type = Action::findOrFail($actionId);
        $type->update($request->validated());
        return $type;
    }

    public function destroy(string $actionId)
    {
        $type = Action::findOrFail($actionId);
        $type->delete();
        return $type;
    }
}
