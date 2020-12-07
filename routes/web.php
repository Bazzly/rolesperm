<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;

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

// use App\Http\Controllers\UserController;

// Route::get('/user', [UserController::class, 'index']);

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/admin/home',[AdminController::class,'index']);
Route::get('/create_admin',[AdminController::class,'index']);

// Route::middleware(['first', 'second'])->group(function () {
//     Route::get('/', function () {
//         // Uses first & second middleware...
//     });

// Route::get('create_admin','App\Http\Controllers\AdminController','index');

// Route::middleware(['auth:sanctum', 'verified'])->get('/adminHome', function () {
    // Route::get('/adminHome',[AdminController::class,'adminDashboard']);

// });
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['namespace' => 'Admin',
            'prefix' => 'admin',
            'middleware' => 'auth:sanctum', 'verified'], function() {
     Route::get('home',[AdminController::class,'adminDashboard']);
});
