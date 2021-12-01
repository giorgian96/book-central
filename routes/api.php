<?php

use App\Http\Controllers\BookApiController;
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

// Public routes

// Protected routes
Route::group(['middleware' => ['auth:sanctum']], function(){
  Route::get('/books', [BookApiController::class, 'index']);
  Route::get('/books/{id}', [BookApiController::class, 'show']);
  Route::put('/books/{id}', [BookApiController::class, 'update']);
});
