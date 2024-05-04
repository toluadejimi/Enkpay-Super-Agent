<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;


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

// Route::get('/', function () {
//     return view('welcome');
// });






//auth

Route::get('/',  [HomeController::class,'index']);


Route::get('home',  [HomeController::class,'home']);



Route::post('login',  [HomeController::class,'login']);
// Route::get('login',  [HomeController::class,'login_index']);
Route::get('login',  [HomeController::class,'login_index'])->name('login');
Route::any('add-new-customer',  [HomeController::class,'add_new_customer']);

Route::post('add-new',  [HomeController::class,'add_new']);
Route::any('all-customers',  [HomeController::class,'view_all_customers']);
Route::any('search-customer',  [HomeController::class,'search_customer']);
Route::any('view-customer',  [HomeController::class,'view_customer']);
Route::any('terminal',  [HomeController::class,'view_terminal']);
Route::any('add-terminal',  [HomeController::class,'add_terminal']);
Route::any('company',  [HomeController::class,'company']);
Route::any('edit-company',  [HomeController::class,'update_company']);





Route::any('logout',  [HomeController::class,'log_out']);











Route::any('code',  [HomeController::class,'code']);
Route::any('step2',  [HomeController::class,'step_2']);
Route::any('step3',  [HomeController::class,'step_3']);
Route::any('step4',  [HomeController::class,'step_4']);








Route::any('device-delete',  [HomeController::class,'device_delete']);







Route::any('set-password',  [HomeController::class,'set_password']);




Route::get('register',  [HomeController::class,'register_index']);





Route::get('log-out',  [HomeController::class,'logout']);
Route::post('reset-password-now',  [HomeController::class,'reset_password_now']);
Route::post('reset-password',  [HomeController::class,'reset_password']);
Route::get('expired',  [HomeController::class,'expired']);
Route::get('verify-password',  [HomeController::class,'verify_password']);
Route::get('forgot-password',  [HomeController::class,'forget_password']);
Route::get('faq',  [HomeController::class,'faq']);
Route::get('terms',  [HomeController::class,'terms']);
Route::get('policy',  [HomeController::class,'policy']);
Route::get('rules',  [HomeController::class,'rules']);
Route::post('update-password-now',  [HomeController::class,'update_password_now']);


Route::get('verify-email',  [HomeController::class,'verify_email']);






























































