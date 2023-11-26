<?php

use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\ClockController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ForgetPasswordController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// Authentification
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');
Route::get('/signup',[RegisterController::class,'index'])->name('register');
Route::post('/signup',[RegisterController::class,'store'])->name('register.store');
Route::get('/logout',[RegisterController::class,'logout'])->name('logout');

Route::get('/forget-password',[ForgetPasswordController::class,'forgetPassword'])->name('forget.password');
Route::post('/forget-passwords',[ForgetPasswordController::class,'forgetPasswordReset'])->name('forgetPassword.reset');
Route::get('/reset-password/{token}',[ForgetPasswordController::class,'resetPassword'])->name('reset.password');
Route::post('/reset-passwords',[ForgetPasswordController::class,'resetPasswordPost'])->name('reset.password.post');

//Dashboard
Route::middleware('auth')->group(function (){

    Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard');
    Route::get('/categories',[DashboardController::class,'categories'])->name('categories');
    Route::post('/categories',[DashboardController::class,'store'])->name('categories.store');
    Route::get('/categories/{id}',[DashboardController::class,'destroy'])->name('categories.delete');
    Route::get('/history',[DashboardController::class,'history'])->name('history');
    Route::get('/create', [UserController::class, 'create'])->name('user.create');
    Route::get('/users', [UserController::class, 'show'])->name('user.show');
    Route::post('/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/{id}/edit',[UserController::class,'edit'])->name('user.edit');
    Route::put('/user/{id}',[UserController::class,'update'])->name('user.update');
    Route::get('/user/{id}/delete', [UserController::class, 'destroy'])->name('user.destroy');


    //profile Controller Admin
    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
    Route::PATCH('/profile', [ProfileController::class, 'store'])->name('profile.store');


    //profile Controller user
    Route::get('/profile', [ProfileController::class, 'userProfile'])->name('profile.user');
    Route::PATCH('/profile', [ProfileController::class, 'userStore'])->name('profile.store.user');

    // change password
    Route::get('/change-password', [ChangePasswordController::class, 'ChangePassword'])->name('password.change');
    Route::patch('/change-password', [ChangePasswordController::class, 'store'])->name('password.store');
    
    //User
    Route::get('user/history',[DashboardController::class,'userHistory'])->name('user.history');
    Route::get('user/dashboard',[DashboardController::class,'userdasboard'])->name('user.dashboard');

    //clockin and out
    Route::post('/store', [ClockController::class, 'store'])->name('clock.store');

  
    //setting the language
    Route::get('/dashboard/{locale}', function (string $locale) {

            if (!in_array($locale,['en','fr'])) {

               abort(400);
            }
            App::setlocale($locale);
         session()->put('locale', $locale);
         return redirect()->back();

    })->name('language');

   
});



