<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HolderController;
use App\Http\Controllers\AccountController;

Route::get('/', function () {
    $users = [];
    if (auth()->check()) {
        $users = User::where('id', '!=' , 1)->get();
    }
    return view('home', ['users' => $users]);
});

// User registration routes
Route::post('/register', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/login', [UserController::class, 'login']);


// Account Holder creation related routes
Route::get('/create-holder', [HolderController::class, 'showCreateScreen']);
Route::post('/create-holder', [HolderController::class, 'createHolder']);

Route::get('/create-account', [AccountController::class, 'showCreateScreen']);
Route::post('/create-account', [AccountController::class, 'createHolder']);
