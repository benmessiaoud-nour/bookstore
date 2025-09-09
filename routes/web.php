<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\PublishersController;
use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\AdminsController;
use App\Http\Controllers\CartController;



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



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('Gallery');
    })->name('dashboard');
});

Route::get('/',[GalleryController::class,'index'])->name('gallery.index');
Route::get('/search',[GalleryController::class,'search'])->name('search');
Route::get('/book/{book}',[BooksController::class,'details'])->name('book.details');
Route::post('/books/{book}/rate', [BooksController::class, 'rate'])->name('books.rate');

Route::get('/categories',[CategoriesController::class,'list'])->name('gallery.categories.index');
Route::get('/categories/search',[CategoriesController::class,'search'])->name('gallery.categories.search');
Route::get('/categories/{category}',[CategoriesController::class,'result'])->name('gallery.categories.show');

Route::get('/publishers',[PublishersController::class,'list'])->name('gallery.publishers.index');
Route::get('/publishers/search',[PublishersController::class,'search'])->name('gallery.publishers.search');
Route::get('/publishers/{publisher}',[PublishersController::class,'result'])->name('gallery.publishers.show');

Route::get('/authors',[AuthorsController::class,'list'])->name('gallery.authors.index');
Route::get('/authors/search',[AuthorsController::class,'search'])->name('gallery.authors.search');
Route::get('/authors/{author}',[AuthorsController::class,'result'])->name('gallery.authors.show');


Route::prefix('/admin')->middleware('can:update-books')->group(function () {

    Route::get('/',[AdminsController::class,'index'])->name('admin.index');

    Route::resource('/books','App\Http\Controllers\BooksController');

    Route::resource('/categories','App\Http\Controllers\CategoriesController');

    Route::resource('/publishers','App\Http\Controllers\PublishersController');

    Route::resource('/authors','App\Http\Controllers\AuthorsController');
    Route::resource('/users','App\Http\Controllers\UsersController')->middleware('can:update-users');
});

Route::post('/cart',[CartController::class,'addToCart'])->name('cart.add');

Route::get('/cart',[CartController::class,'ViewCart'])->name('cart.view');
Route::post('/cart/removeOne/{book}',[CartController::class,'removeOne'])->name('cart.remove_one');
Route::post('/cart/removeAll/{book}',[CartController::class,'removeAll'])->name('cart.remove_all');
