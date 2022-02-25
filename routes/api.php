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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login' , [\App\Http\Controllers\authController::class , 'login']);
Route::post('/admin/create' , [\App\Http\Controllers\authController::class , 'register_admin']);
Route::middleware('admin')->post('/logout' , [\App\Http\Controllers\authController::class , 'logout']);

Route::middleware('admin')->post('/destination/create' , [\App\Http\Controllers\destinationController::class , 'create']);
Route::middleware('admin')->post('/destination/update/{id}' , [\App\Http\Controllers\destinationController::class , 'update']);
Route::middleware('admin')->delete('/destination/delete/{id}' , [\App\Http\Controllers\destinationController::class , 'delete']);
Route::get('/destination/' , [\App\Http\Controllers\destinationController::class , 'getAllData']);
Route::get('/destination/{id}' , [\App\Http\Controllers\destinationController::class , 'getDataId']);

Route::middleware('admin')->post('/facility/create' , [\App\Http\Controllers\facilityController::class , 'create']);
Route::middleware('admin')->post('/facility/update/{id}' , [\App\Http\Controllers\facilityController::class , 'update']);
Route::middleware('admin')->delete('/facility/delete/{id}' , [\App\Http\Controllers\facilityController::class , 'delete']);
Route::middleware('admin')->get('/facility/' , [\App\Http\Controllers\facilityController::class , 'getAllData']);

Route::post('/user/create' , [\App\Http\Controllers\userController::class , 'register_user']);
Route::post('/user/login' , [\App\Http\Controllers\userController::class , 'login']);
Route::middleware('user')->post('/user/logout' , [\App\Http\Controllers\userController::class , 'logout']);
Route::middleware('user')->post('/user/review' , [\App\Http\Controllers\userController::class , 'review']);
Route::get('/user/review/get' , [\App\Http\Controllers\userController::class , 'get_review']);
Route::get('/user/review/{id}' , [\App\Http\Controllers\userController::class , 'getReviewById']);
Route::middleware('user')->post('/user/search' , [\App\Http\Controllers\userController::class , 'search']);

