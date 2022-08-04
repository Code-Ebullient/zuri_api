<?php

use App\Models\User;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::resource('schools', [SchoolsController::class, 'index']);
//Route::resource('users', [UsersController::class, 'index']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



// User
//Route::get('users', 'UsersController@index');
// UsersController seems not to work

Route::get('/users', function() {//Get all user
    return User::all();
});
Route::post('/users', function() {//Create/Register user
    request()->validate([
        'name' => 'required',
        'email' => 'required',
        'password' => 'required',
        'password2' => 'required',
    ]);

    return User::create([
        'name' => request('name'),
        'email' => request('email'),
        'password' => request('password'),
        'password2' => request('password2')
    ]);
});
Route::put('/users/{user}', function(User $user) {//Update user
    request()->validate([
        'name' => 'required',
        'email' => 'required',
        'password' => 'required',
        'password2' => 'required',
    ]);

    $success = $user->update([
        'name' => request('name'),
        'email' => request('email'),
        'password' => request('password'),
        'password2' => request('password2')
    ]);

    return [
        'success' => $success
    ];
});
Route::delete('/users/{user}', function(User $user) {//Delete user
    $success = $user->delete();

    return [
        'success' => $success
    ];
});


// Route::group(
//     [
//       'namespace'=>'Auth',
//       'middleware'=>'api', 
//       'prefix' => 'auth', 
//       'as'=> 'user.auth.'
//     ]
//     , function () {
//      Route::post('register', 'AuthController@register');
//      Route::post('login', 'AuthController@login');
//      Route::post('logout', 'AuthController@logout');
//      Route::post('refresh', 'AuthController@refresh');
//      Route::post('me', 'AuthController@me');
//  });