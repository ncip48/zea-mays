<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('desa', 'App\Http\Controllers\DesaController@index');
Route::get('desa/{id}', 'App\Http\Controllers\DesaController@detail');
Route::post('desa', 'App\Http\Controllers\DesaController@create');
Route::put('desa/{id}', 'App\Http\Controllers\DesaController@update');
Route::delete('desa/{id}', 'App\Http\Controllers\DesaController@delete');
