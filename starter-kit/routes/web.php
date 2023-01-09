<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaterkitController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Middleware\LoggedIn;
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

Route::get('/', [StaterkitController::class, 'home'])->name('home');
Route::get('home', [StaterkitController::class, 'home'])->name('home');
// Route Components
Route::get('layouts/collapsed-menu', [StaterkitController::class, 'collapsed_menu'])->name('collapsed-menu');
Route::get('layouts/full', [StaterkitController::class, 'layout_full'])->name('layout-full');
Route::get('layouts/without-menu', [StaterkitController::class, 'without_menu'])->name('without-menu');
Route::get('layouts/empty', [StaterkitController::class, 'layout_empty'])->name('layout-empty');
Route::get('layouts/blank', [StaterkitController::class, 'layout_blank'])->name('layout-blank');


// locale Route
Route::get('lang/{locale}', [LanguageController::class, 'swap']);

//Route::middleware('loggedin')->group(function() {
    //Route::get('login', [AuthController::class, 'loginView'])->name('login.index');
    //Route::post('login', [AuthController::class, 'login'])->name('login.check');
    //Route::get('register', [AuthController::class, 'registerView'])->name('register.index');
    //Route::post('register', [AuthController::class, 'register'])->name('register.store');
//});
/* Route Authentication Pages */
//Route::group(['prefix' => 'auth'], function () {
    //Route::get('login-basic', [AuthenticationController::class, 'login_basic'])->name('auth-login-basic');
    //Route::get('login-cover', [AuthenticationController::class, 'login_cover'])->name('auth-login-cover');
    //Route::get('register-basic', [AuthenticationController::class, 'register_basic'])->name('auth-register-basic');
    //Route::get('register-cover', [AuthenticationController::class, 'register_cover'])->name('auth-register-cover');
    //Route::get('forgot-password-basic', [AuthenticationController::class, 'forgot_password_basic'])->name('auth-forgot-password-basic');
    //Route::get('forgot-password-cover', [AuthenticationController::class, 'forgot_password_cover'])->name('auth-forgot-password-cover');
    //Route::get('reset-password-basic', [AuthenticationController::class, 'reset_password_basic'])->name('auth-reset-password-basic');
    //Route::get('reset-password-cover', [AuthenticationController::class, 'reset_password_cover'])->name('auth-reset-password-cover');
    //Route::get('verify-email-basic', [AuthenticationController::class, 'verify_email_basic'])->name('auth-verify-email-basic');
   // //Route::get('verify-email-cover', [AuthenticationController::class, 'verify_email_cover'])->name('auth-verify-email-cover');
    //Route::get('two-steps-basic', [AuthenticationController::class, 'two_steps_basic'])->name('auth-two-steps-basic');
   // Route::get('two-steps-cover', [AuthenticationController::class, 'two_steps_cover'])->name('auth-two-steps-cover');
    //Route::get('register-multisteps', [AuthenticationController::class, 'register_multi_steps'])->name('auth-register-multisteps');
    //Route::get('lock-screen', [AuthenticationController::class, 'lock_screen'])->name('auth-lock_screen');
//});
/* Route Authentication Pages */

   
//Route::group(['middleware' => 'auth'], function () {

// Route::middleware('auth')->group(function() {
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('login', [AuthController::class, 'loginView'])->name('login.index');
    Route::post('login', [AuthController::class, 'login'])->name('login.check');
    Route::get('register', [AuthController::class, 'registerView'])->name('register.index');
    Route::post('register', [AuthController::class, 'register'])->name('register.store');
    Route::get('/', [DashboardController::class, 'index'])->name('dashboardindex');
    Route::get('/create', [DashboardController::class, 'create'])->name('dashboardcreate');
    Route::post('/create', [DashboardController::class, 'store'])->name('dashboardstore');
    Route::get('/edit/{id}', [DashboardController::class, 'edit'])->name('dashboardedit');
    Route::put('/update/{id}', [DashboardController::class, 'update'])->name('dashboardupdate');
    Route::delete('/destroy/{id}', [DashboardController::class, 'destroy'])->name('dashboardestroy');

    //});

// Auth::routes();

// Route::get('/', [DashboardController::class, 'index'])->name('dashboardindex');
// Route::get('/create', [DashboardController::class, 'create'])->name('dashboardcreate');
// Route::post('/create', [DashboardController::class, 'store'])->name('dashboardstore');
// Route::get('/edit/{id}', [DashboardController::class, 'edit'])->name('dashboardedit');
// Route::put('/update/{id}', [DashboardController::class, 'update'])->name('dashboardupdate');
// Route::delete('/destroy/{id}', [DashboardController::class, 'destroy'])->name('dashboardestroy');
