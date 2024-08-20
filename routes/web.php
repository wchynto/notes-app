<?php

use App\Http\Controllers\ListController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\UserSessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('viewLogin');
});


Route::get('/login', [UserSessionController::class, 'viewLogin'])->name('viewLogin');
Route::post('/login', [UserSessionController::class, 'login'])->name('login');
Route::get('/register', [UserSessionController::class, 'viewRegister'])->name('viewRegister');
Route::post('/register', [UserSessionController::class, 'register'])->name('register');
Route::post('/logout', [UserSessionController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth', 'prevent-back-history']], function () {
    Route::resource('notes', NoteController::class);
    Route::resource('lists', ListController::class);
    Route::resource('lists.todos', TodoController::class)->shallow()->only('destroy');
});
