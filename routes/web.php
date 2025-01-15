<?php

use App\Http\Controllers\UserController;
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



Route::get('/users/data', [UserController::class, 'getData'])->name('getData');
Route::get('/users', [UserController::class, 'index'])->name('users');
Route::get('/users', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::post('/users/{id}/update', [UserController::class, 'update'])->name('users.update');
Route::post('/users/{id}', [UserController::class, 'destroy'])->name('users.delete');
Route::post('/users/status/{id}', [UserController::class, 'changeStatus'])->name('users.status');
Route::get('/users/{id}', [UserController::class, 'show']);
Route::get('/users/{id}/edit', [UserController::class, 'edit']);
Route::get('/', [UserController::class, 'count']);
// Route::post('/users/update', [UserController::class, 'update']);


Route::post('/users/restoreall', [UserController::class, 'restoreAll'])->name('users.restoreAll');



