<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;

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

// User
Route::get('/users', 'UsersController@index');//Getuser
Route::post('/users', 'UsersController@store');//create
Route::put('/users/{user}', 'UsersController@update');//Update user
Route::delete('/users{user}', 'UsersController@destroy');//Delete user

