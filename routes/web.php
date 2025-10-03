<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HolderController;

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
