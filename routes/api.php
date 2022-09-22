<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserContoller;

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

Route::apiResource('/user', App\Http\Controllers\UserContoller::class, ['except' => ['update']]);
Route::get('/user/{user}', [UserContoller::class, 'find'])->name('user.find');
Route::post('user/{user}', [UserContoller::class, 'update'])->name('user.update');
