<?php

namespace App\Http\Controllers\Subscriptions;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }
    public function store(Request $request)
    {

        if (auth()->user()->subscribed('default')) {
            return response()->json(['message' => 'já é subscrito']);
        }
        //plan
        $plan = Plan::where('slug', $request->plan_slug)->first();

        $user = $request->user();

        //mensal 150
        $user->newSubscription('default', $plan->stripe_id)->create($request->token);

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

    public function userIsSubscribed()
    {
        if (!auth()->user()->subscribed('default')) {
            return response()->json(['message' => 'não é subscrito']);
        }

        return  response()->json(['message' => 'é subscrito, tem assinatura']);
    }

    //faturas do usuário
    public function invoices()
    {
        $invoices = auth()->user()->invoices();

        return response()->json(['invoices' => $invoices]);
    }

    //download das faturas
    public function downloadInvoice($invoice)
    {
        return auth()->user()->downloadInvoice($invoice, [
            'vendor' => config('app.name'),
            'product' => 'Assinatura Vip'
        ]);
    }

    //cancelar assinatura recorrente
    public function cancelSubscription()
    {
        return auth()->user()->subscription('default')->cancel();
    }

    //reativar assinatura se ela estiver no prazo
    public function reactivateSubscription()
    {
        return auth()->user()->subscription('default')->resume();
    }
}
