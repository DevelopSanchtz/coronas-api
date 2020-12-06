<?php

use App\Http\Controllers\CRUD_objetoventaController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\registryController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/registry', [registryController::class, 'Registry']);

Route::post('/login', [loginController::class, 'Login']);

Route::post('/registryProduct', [CRUD_objetoventaController::class, 'CreateProduct']);

Route::get('/showProduct', [CRUD_objetoventaController::class, 'ReadProduct']);

Route::post('/comprar', [CRUD_objetoventaController::class, 'comprar']);