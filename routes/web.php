<?php

use App\Http\Controllers\NotesController;
use App\Http\Controllers\UserSessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('viewLogin');
});


Route::get('/login', [UserSessionController::class, 'viewLogin'])->name('viewLogin');
Route::get('/register', [UserSessionController::class, 'viewRegister'])->name('viewRegister');

Route::resource('notes', NotesController::class);
