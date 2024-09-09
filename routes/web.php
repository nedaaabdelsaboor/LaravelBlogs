<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/',[WelcomeController::class,'index']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/add_blog',[BlogController::class,'create'])->name('add_blog');
Route::post('/blog/create',[BlogController::class,'store'])->name('store');
Route::get('/blog/index',[BlogController::class,'index'])->name('index');
Route::get('/blog/archive/{id}',[BlogController::class,'archive'])->name('archive');
Route::get('/blog/reweet/{id}',[BlogController::class,'reweet'])->name('reweet');
Route::get('/blog/destroy/{id}',[BlogController::class,'destroy'])->name('destroy');
Route::get('/blog/trash',[BlogController::class,'trash'])->name('trash');
Route::get('/blog/edit/{id}',[BlogController::class,'edit'])->name('edit');
Route::post('/blog/update/{id}',[BlogController::class,'update'])->name('update');
