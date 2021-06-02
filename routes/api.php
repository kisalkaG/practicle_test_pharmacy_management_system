<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ItemController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Sanctum\Sanctum;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('register-cashier',[AuthController::class, 'registerCashier']);

Route::post('log-in-user',[AuthController::class, 'logInUser']);

Route::post('log-out-user',[AuthController::class, 'logOutUser'])->middleware('auth:sanctum');



Route::get('get-all-customers',[CustomerController::class, 'getAllCustomers'])->middleware('auth:sanctum');

Route::get('get-all-items',[ItemController::class, 'getAllItems'])->middleware('auth:sanctum');

Route::get('get-customer/{id}',[CustomerController::class, 'getCustomer'])->middleware('auth:sanctum');

Route::get('get-item/{id}',[ItemController::class, 'getItem'])->middleware('auth:sanctum');



//Owner
Route::post('owner/add-customer',[CustomerController::class, 'addCustomer'])->middleware(['auth:sanctum', 'owner']);
Route::post('owner/add-item',[ItemController::class, 'addItem'])->middleware(['auth:sanctum', 'owner']);

//cashier
Route::post('cashier/edit-item/{id}',[ItemController::class, 'editItem'])->middleware(['auth:sanctum', 'cashier']);
Route::post('cashier/remove-item/{id}',[ItemController::class, 'removeItem'])->middleware(['auth:sanctum', 'cashier']);

//Manager
Route::post('manager/update-customer/{id}',[CustomerController::class, 'updateCustomer'])->middleware(['auth:sanctum','manager']);
Route::post('manager/delete-customer/{id}',[CustomerController::class, 'deleteCustomer'])->middleware(['auth:sanctum','manager']);



