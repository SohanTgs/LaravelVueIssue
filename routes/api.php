<?php

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


Route::resource('category',  'CategoryController');

Route::post('sohan', [App\Http\Controllers\SpaController::class, 'index']);
Route::get('getData', [App\Http\Controllers\SpaController::class, 'getData']);
Route::get('edit/{id}', [App\Http\Controllers\SpaController::class, 'edit']);
Route::post('edit', [App\Http\Controllers\SpaController::class, 'editPost']);
Route::post('delete', [App\Http\Controllers\SpaController::class, 'delete']);

Route::post('addProduct', [App\Http\Controllers\SpaController::class, 'addProduct']);
Route::get('getProduct', [App\Http\Controllers\SpaController::class, 'getProduct']);
Route::get('getSingleProduct/{id}', [App\Http\Controllers\SpaController::class, 'getSingleProduct']);
Route::post('productUpdate', [App\Http\Controllers\SpaController::class, 'productUpdate']);
Route::get('deleteProduct/{id}', [App\Http\Controllers\SpaController::class, 'deleteProduct']);