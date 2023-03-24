<?php

use App\Http\Controllers\cloudinary;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\ProfileController;
use App\Models\Books;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    $books = Books::with('favourites')->sortable()->paginate(4);
    return view('welcome',[
        'books' => $books,
    ]);
});
Route::get('/favourite', [ProfileController::class, 'favourites'])->middleware(['auth', 'verified'])->name('favourite');

Route::get('/dashboard', [dashboardController::class , 'index'])->middleware(config('filament.middleware.auth'))->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home', function () {
    $books = Books::with('favourites')->sortable()->paginate(4);
    return view('home',[
        'books' => $books,
    ]);
})->middleware(['auth', 'verified'])->name('home');

Route::get('/galery', [App\Http\Controllers\booksController::class, 'galery'])->middleware(['auth', 'verified'])->name('galery');
Route::post('/galery', [App\Http\Controllers\booksController::class, 'galery'])->middleware(['auth', 'verified'])->name('galery');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::resource('/books', App\Http\Controllers\booksController::class);
Route::post('rating-store', [App\Http\Controllers\booksController::class, 'ratingstore'])->name('rating.store');
Route::get('/search/', 'booksController@search')->name('search');
Route::resource('/groups', App\Http\Controllers\groupsController::class);
Route::resource('/categories', App\Http\Controllers\CategoriesController::class);
Route::resource('/comments', App\Http\Controllers\commentsController::class);
Route::resource('/likes', App\Http\Controllers\likesController::class);
Route::resource('/dislikes', App\Http\Controllers\dislikesController::class);
Route::resource('/favourites', App\Http\Controllers\favouritesController::class);
Route::get('/group/{group}', [App\Http\Controllers\groupsController::class , 'getSingle'])->middleware(['auth', 'verified'])->name('group');


Route::get('/cloud' ,[cloudinary::class , 'getsignature']);
Route::get('/upload' ,[cloudinary::class , 'getsignature']);

require __DIR__.'/auth.php';
