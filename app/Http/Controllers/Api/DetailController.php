<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DetailResource;
use App\Models\Detail;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index()
    {
        $details = Detail::get();

        return DetailResource::collection($details);
    }

    public function show($detailId)
    {
        $detail = Detail::findOrFail($detailId);

        return new DetailResource($detail);
    }

    public function update(string $detailId, Request $request)
    {
        $detail = Detail::findOrFail($detailId);
        $detail->update($request->validated());

        return new DetailResource($detail);
    }

    public function destroy(string $detailId)
    {
        $detail = Detail::findOrFail($detailId);
        $detail->delete();

        return response()->json(['message' => 'Detalhe deletado com sucesso']);
    }
}
