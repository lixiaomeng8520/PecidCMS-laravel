<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::name('user.')->group(function () {
    Route::get('/users', [UserController::class, 'list'])->name('list');
    Route::get('/user/{id}', [UserController::class, 'one'])->name('one');
    Route::post('/user/add', [UserController::class, 'add'])->name('add');
    Route::post('/user/edit', [UserController::class, 'edit'])->name('edit');
    Route::post('/user/delete', [UserController::class, 'delete'])->name('delete');
});
