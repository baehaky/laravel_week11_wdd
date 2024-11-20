<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('login');
// });

use App\Http\Controllers\Users;

Route::get('/', [Users::class, 'index'])->name('login');
Route::post('/users/login', [Users::class, 'login_action'])->name('users.login');
Route::post('/logout', [Users::class, 'logout_action'])->name('logout');
