<?php

use App\Http\Controllers\Api\ActionController;
use App\Http\Controllers\Api\PlanController;
use App\Http\Controllers\Api\TenantController;
use App\Http\Controllers\Api\TypeController;
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
Route::get('/actions', [ActionController::class, 'index']);
Route::get('/actions/{id}', [ActionController::class, 'show']);
Route::post('/actions', [ActionController::class, 'store']);
Route::put('/actions/{id}', [ActionController::class, 'update']);
Route::delete('/actions/{id}', [ActionController::class, 'destroy']);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
