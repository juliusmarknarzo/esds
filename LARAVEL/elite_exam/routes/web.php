<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;

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

Route::middleware('session.checker')->group(function () {
    Route::get('/', function () {
        return view('register');
    });
    
    Route::get('/login', function () {
        return view('login');
    });
    
    Route::get('dashboard', [DashboardController::class , 'viewDashboard']);
});

Route::post('login_user', [UserController::class , 'loginUser']);

Route::post('register_user', [UserController::class , 'registerUser']);
Route::get('logout_user', [UserController::class , 'logoutUser']);

