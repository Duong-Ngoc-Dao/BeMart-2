<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\DashboadContrller;
use App\Http\Controllers\Admin\GroupUserController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\ConfigController;
use App\Http\Controllers\Admin\CategoriBlogController;
use App\Http\Controllers\Admin\ContactContrller;
use App\Http\Controllers\Admin\OrderContrller;
use App\Http\Controllers\Admin\BlogsController;
use App\Http\Controllers\Admin\SaleController;
use App\Http\Controllers\Admin\SessionController as AdminSessionController;
use App\Http\Controllers\RegisteredStoreController;
use App\Http\Controllers\Client\ClientController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('cp-login', [AdminSessionController::class, 'create'])->name('login');
Route::post('cp-login', [AdminSessionController::class, 'store'])->name('submitLogin');
Route::get('cp-logout', [ClientController::class, 'logout'])->name('logout');
Route::get('cp-register', [ClientController::class, 'register'])->name('register');
Route::post('cp-register', [ClientController::class, 'registerCreate'])->name('registerCreate');
Route::get('quen-mat-khau', [ClientController::class, 'forgetPassword'])->name('forgetPassword');
Route::post('quen-mat-khau', [ClientController::class, 'SentPassword'])->name('SentPassword');
Route::get('doi-mat-khau', [ClientController::class, 'ChangePassword'])->name('ChangePassword');
Route::post('doi-mat-khau', [ClientController::class, 'SentChangePassword'])->name('SentChangePassword');
Route::get('registered/store', [RegisteredStoreController::class, 'create'])->name('registered_shop');
Route::post('registered/store', [RegisteredStoreController::class, 'save']);
Route::name('cp-admin.')->middleware('AdminLogin')->prefix('cp-admin/')->group(function () { 
    Route::get('/', [DashboadContrller::class, 'index'])->name('dashboad');
 });  