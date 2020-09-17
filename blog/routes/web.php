<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('helloworld', function () {
    return "<h1>Hello World</h1>";
});

Route::get('users', function() {
    dd(App\User::all());
});

Route::get('users/{id}', function($id) {
    dd(App\User::findOrFail($id));
});