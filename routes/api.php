<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\contactsController;
use App\Http\Controllers\categoriasController;
use App\Http\Controllers\marcasController;
use App\Http\Controllers\locacionesController;
use App\Http\Controllers\productosController;
use App\Http\Controllers\existenciasController;
use App\Http\Controllers\movimientosController;






/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResource ('categorias',categoriasController::class);
Route::apiResource ('marcas',marcasController::class);
Route::apiResource ('locaciones',locacionesController::class);
Route::apiResource ('productos',productosController::class);
Route::apiResource ('existencias',existenciasController::class);
Route::apiResource ('movimientos',movimientosController::class);





Route::get('contracts/categorias',[contactsController::class,'categorias']);
Route::get('contracts/marcas',[contactsController::class,'marcas']);
Route::get('contracts/locaciones',[contactsController::class,'locaciones']);
Route::get('contracts/productos',[contactsController::class,'productos']);
Route::get('contracts/existencias',[contactsController::class,'existencias']);



