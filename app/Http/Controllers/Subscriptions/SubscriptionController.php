<?php

namespace App\Http\Controllers\Subscriptions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }
    public function store(Request $request)
    {
        $user = $request->user();

        //mensal 150
        $user->newSubscription('default', "price_1LDtwkEtM4SDePgcDPCgMG7q")->create($request->token);

        return response()->json(['message' => 'Assinatura feita com sucesso']);
    }

    public function getClientSecret(Request $request)
    {
        // dd($request->user());
        return [
            'data' => [
                'client_secret' => $request->user()->createSetupIntent()->client_secret,
            ]
        ];
    }
}
