<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login',function(){
    return view('login');
});

Route::get('/register',function(){
    return view('register');
});

Route::get('/allusers',[UserController::class,'showUsers']);

Route::post('/registeruser',[UserController::class,'registerUser'])->name('registeruser');

Route::get('/udpate/{id}',[UserController::class,'update']);

Route::post('/updateuser/{id}',[UserController::class,'updateuser']);
