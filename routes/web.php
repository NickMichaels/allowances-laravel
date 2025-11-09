<?php

use App\Models\User;
use App\Models\Holder;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HolderController;
use App\Http\Controllers\AccountController;

Route::get('/', function () {
    $users = [];
    $holders = [];
    if (auth()->check()) {
        $users = User::where('id', '!=' , 1)->get();
    }
    return view('home', ['users' => $users]);
});

// User registration routes
Route::get('/create-user', [UserController::class, 'showCreateScreen']);
Route::post('/register', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/login', [UserController::class, 'login']);


// Account Holder creation related routes
Route::get('/create-holder', [HolderController::class, 'showCreateScreen']);
Route::get('/edit-holder/{holder}', [HolderController::class, 'showEditScreen']);
Route::post('/edit-holder/{holder}', [HolderController::class, 'updateHolder']);
Route::post('/create-holder', [HolderController::class, 'createHolder']);
Route::get('/view-holder/{holder}', [HolderController::Class, 'viewHolder']);

Route::get('/create-account', [AccountController::class, 'showCreateScreen']);
Route::get('/edit-account', [AccountController::class, 'showEditScreen']);
Route::post('/create-account', [AccountController::class, 'createHolder']);
