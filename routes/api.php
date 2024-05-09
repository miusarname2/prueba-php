<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\DocumentsController;
use App\Http\Controllers\Api\V1\EstadosController;
use App\Http\Controllers\Api\V1\NumeracionController;
use App\Http\Controllers\Api\V1\OperationsController;

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


Route::get('/action/1',[OperationsController::class, 'getFailedCompanies']);
Route::get('/action/2',[OperationsController::class, 'documentosPorEmpresaEntreFechas']);
Route::get('/action/3',[OperationsController::class,'documentosPorEmpresaPorEstado']);
Route::get('/action/4', [OperationsController::class, 'empresasConDocumentosNoExitosos']);
Route::get('/action/5', [OperationsController::class, 'documentosFueraDelRangoPorEmpresa']);
Route::get('/action/6', [OperationsController::class, 'totalDineroRecibido']);
Route::get('/action/7', [OperationsController::class, 'numerosCompletosRepetidos']);
Route::get('/documents', [DocumentsController::class,'index']);
Route::post('/documents', [DocumentsController::class,'store']);
Route::delete('/documents/{id}', [DocumentsController::class,'destroy']);
Route::put('/documents/{id}', [DocumentsController::class,'update']);
Route::get('/documents/{id}',[DocumentsController::class,'show']);
Route::get('/estados',[EstadosController::class,'index']);
Route::get('/numeracion',[NumeracionController::class,'index']);
//Route::update('/documents/{id}',[DocumentsController::class,'destroy']);
