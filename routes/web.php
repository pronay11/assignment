<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserInfoController;

Route::get('/', function () {
    return view('welcome');
});


Route::controller(UserInfoController::class)->group(function () {
    Route::get('/show/userinfo','ShowUserInfo')->name('show.userinfo'); //http://127.0.0.1:8000/show/userinfo ; list of show data
    Route::get('/userinfo','index')->name('userinfo'); //http://127.0.0.1:8000/userinfo ; main page
    Route::post('/store/userinfo','StoreUserInfo')->name('store.userinfo');
    Route::get('/edit/userinfo/{id}','EditUserInfo')->name('edit.userinfo');
    Route::post('/update/userinfo/{id}','UpdateUserInfo')->name('update.userinfo');
    Route::get('/delete/userinfo/{id}','DeleteUserInfo')->name('delete.userinfo');
});