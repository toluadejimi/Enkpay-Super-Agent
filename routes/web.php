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













Route::group(['middleware' => ['auth', 'user', 'session.timeout']], function () {


    Route::any('set-device',  [HomeController::class,'set_device']);
    Route::any('home',  [HomeController::class,'home']);
    Route::any('report', [HomeController::class, 'report']);

    Route::any('device', [HomeController::class, 'device']);

    
    Route::any('update-on',  [HomeController::class,'update_on']);
    Route::any('update-off',  [HomeController::class,'update_off']);



});





























//admin
Route::get('admin',  [AdminController::class,'index']);

Route::get('admin-dashboard',  [AdminController::class,'admin_dashboard']);

Route::get('caterogies',  [AdminController::class,'categories']);

Route::post('add-new-cat',  [AdminController::class,'add_new_cat']);
Route::get('delete-cat',  [AdminController::class,'delete_cat']);

Route::get('products',  [AdminController::class,'index_product']);
Route::post('delete-product',  [AdminController::class,'delete_product']);

Route::post('add-new-pr',  [AdminController::class,'add_new_pr']);
Route::post('delete-pr',  [AdminController::class,'delete_pr']);

Route::get('delete-front-pr',  [AdminController::class,'delete_front_pr']);

Route::get('delete-pr',  [AdminController::class,'delete_pro']);

Route::get('delete-main',  [AdminController::class,'delete_main']);


Route::post('search-user',  [AdminController::class,'search_user']);
Route::post('search-username',  [AdminController::class,'search_username']);












Route::get('users',  [AdminController::class,'index_user']);
Route::get('view-user',  [AdminController::class,'view_user']);
Route::post('update-user',  [AdminController::class,'update_user']);
Route::post('remove-user',  [AdminController::class,'remove_user']);




Route::post('edit-front-pr',  [AdminController::class,'edit_front_product']);


Route::get('manual-payment',  [AdminController::class,'manual_payment_view']);
Route::any('verify-payment',  [AdminController::class,'approve_payment']);
Route::post('update-acct-name',  [AdminController::class,'update_acct_name']);
Route::any('delete-payment',  [AdminController::class,'delete_payment']);









Route::post('admin-login',  [AdminController::class,'admin_login']);

















//product

Route::post('buy-now',  [ProductController::class,'buy_now']);
Route::post('item-view',  [ProductController::class,'item_view']);

Route::get('item-view',  [ProductController::class,'i_view']);

Route::get('allcatproduct',  [ProductController::class,'view_all_product']);

Route::post('add-new-product',  [ProductController::class,'add_new_product']);

Route::post('add-front-product',  [ProductController::class,'add_front_product']);

Route::get('detete-front-product',  [ProductController::class,'delete_front_product']);


Route::any('do-search',  [ProductController::class,'search']);





Route::post('edit-new-product',  [ProductController::class,'edit_front_product']);


//Route::get('view-all',  [ProductController::class,'view_all_product']);


Route::post('/telegram', 'TelegramBotController@handle');
































