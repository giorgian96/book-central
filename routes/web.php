<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookClubController;
use App\Http\Controllers\BookWebController;
use App\Models\User;

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
  return view('welcome');
});

Route::get('/dashboard', function () {
  $books = auth()->user()->books;

  return view('dashboard')->with('books', $books);
})->middleware(['auth'])->name('dashboard');

Route::get('/add-book', function () {
  return view('add-book');
})->middleware(['auth'])->name('add-book');

Route::post('book_clubs', [BookClubController::class, 'store']);
Route::post('books', [BookWebController::class, 'store']);
Route::delete('books/{id}', [BookWebController::class, 'destroy']);

require __DIR__ . '/auth.php';
