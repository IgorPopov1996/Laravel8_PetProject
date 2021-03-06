<?php

use Illuminate\Support\Facades\Route;
use app\Models\User;


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


Route::get('category/all', [\App\Http\Controllers\CategoryController::class, 'AllCat'])->name('all.category');

Route::post('category/add', [\App\Http\Controllers\CategoryController::class, 'AddCat'])->name('store.category');

Route::get('/very-long-name-just-for-practice', [\App\Http\Controllers\ContactController::class, 'index'])->name('con') ;

Route::get('category/edit/{id}', [\App\Http\Controllers\CategoryController::class, 'Edit']);
Route::post('category/update/{id}', [\App\Http\Controllers\CategoryController::class, 'Update']);

Route::get('/about', function () {
    return view('about');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $users = User::all();
    return view('dashboard',compact('users'));
})->name('dashboard');
