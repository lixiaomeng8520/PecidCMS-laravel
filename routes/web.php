<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::name('user.')->group(function () {
    Route::get('/users', [UserController::class, 'list'])->name('list');
    Route::get('/user/{id}', [UserController::class, 'one'])->name('one');
    Route::post('/user/add', [UserController::class, 'add'])->name('add');
    Route::post('/user/edit', [UserController::class, 'edit'])->name('edit');
    Route::post('/user/delete', [UserController::class, 'delete'])->name('delete');
});

