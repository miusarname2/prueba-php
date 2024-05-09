<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\DocumentsController;
use App\Http\Controllers\Api\V1\OperationsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});
Route::get('/new', function () {
    return view('newReport');
});
Route::get('/edit', function () {
    return view('edit');
});

