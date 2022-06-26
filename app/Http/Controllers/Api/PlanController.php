<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PlanRequest;
use App\Http\Resources\PlanResource;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index()
    {
        $plans = Plan::with('details')->get();

        return PlanResource::collection($plans);
    }

    public function show(string $planId)
    {
        $plan = Plan::where('id', $planId)->first();
        return new PlanResource($plan);
    }

    public function store(PlanRequest $request)
    {
        // dd($request->all());
        $plan = Plan::create($request->validated());

        return new PlanResource($plan);
    }

    public function update(string $planId, PlanRequest $request)
    {
        $plan = Plan::findOrFail($planId);
        $plan->update($request->validated());
        return new PlanResource($plan);
    }

    public function destroy(string $planId)
    {
        $plan = Plan::where('id', $planId);
        $plan->delete();

        return response()->json(['message' => 'Plano deletado com sucesso']);
    }
}
