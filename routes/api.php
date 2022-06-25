<?php

use App\Http\Controllers\Api\{
    ActionController,
    PlanController,
    SubtypeController,
    TenantController,
    TypeController,
    UserController
};
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Subscriptions\SubscriptionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Auth
Route::post('/auth', [AuthController::class, 'auth']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware(['auth:sanctum']);
Route::get('/me', [AuthController::class, 'me'])->middleware(['auth:sanctum']);
//User
Route::post('/user/create', [UserController::class, 'store']);
Route::post('/user/update', [UserController::class, 'update']);

//Subscription
Route::post('/subscriptions/create', [SubscriptionController::class, 'store']);

//intenção de pagamento, id de intenção para o user
Route::get('/subscriptions/intent', [SubscriptionController::class, 'getClientSecret']);

// é subscrito, é assinante?
Route::get('/subscriptions/subscribed', [SubscriptionController::class, 'userIsSubscribed']);

//Faturas do usuário
Route::get('/subscriptions/invoices', [SubscriptionController::class, 'invoices'])->middleware(['auth:sanctum']);

//download da fatura
Route::get('/subscriptions/invoices/{invoiceId}', [SubscriptionController::class, 'downloadInvoice'])->middleware(['auth:sanctum']);





//plan
Route::get('/plans', [PlanController::class, 'index']);
Route::get('/plans/{id}', [PlanController::class, 'show']);
Route::post('/plans', [PlanController::class, 'store']);
Route::put('/plans/{id}', [PlanController::class, 'update']);
Route::delete('/plans/{id}', [PlanController::class, 'destroy']);

//tenant
Route::get('/tenants', [TenantController::class, 'index']);
Route::get('/tenants/{id}', [TenantController::class, 'show']);
Route::post('/tenants', [TenantController::class, 'store']);
Route::put('/tenants/{id}', [TenantController::class, 'update']);
Route::delete('/tenants/{id}', [TenantController::class, 'destroy']);

//type imóvel
Route::get('/types', [TypeController::class, 'index']);
Route::get('/types/{id}', [TypeController::class, 'show']);
Route::post('/types', [TypeController::class, 'store']);
Route::put('/types/{id}', [TypeController::class, 'update']);
Route::delete('/types/{id}', [TypeController::class, 'destroy']);

//actions imóveis
Route::get('/subtypes', [SubtypeController::class, 'index']);
Route::get('/subtypes/{id}', [SubtypeController::class, 'show']);
Route::post('/subtypes', [SubtypeController::class, 'store']);
Route::put('/subtypes/{id}', [SubtypeController::class, 'update']);
Route::delete('/subtypes/{id}', [SubtypeController::class, 'destroy']);

//actions imóveis
Route::get('/actions', [ActionController::class, 'index']);
Route::get('/actions/{id}', [ActionController::class, 'show']);
Route::post('/actions', [ActionController::class, 'store']);
Route::put('/actions/{id}', [ActionController::class, 'update']);
Route::delete('/actions/{id}', [ActionController::class, 'destroy']);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
