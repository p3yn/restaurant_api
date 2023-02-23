<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BillController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ClientController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('/clients', [ClientController::class, 'index']);  //check
Route::post('/create/clients', [ClientController::class, 'store']);  //check
Route::get('/users',[UserController::class,'index']);  //check
Route::post('/users/create', [UserController::class, 'store']);  //check
Route::post('/users/login', [UserController::class, 'login']);  //check
Route::get('/clients/orders', [OrderController::class, 'index']);  //check
Route::post('/clients/orders/create', [OrderController::class, 'store']); //check

Route::get('/users/roles', [RoleController::class, 'index']); //check
Route::post('/users/roles/create', [RoleController::class, 'create']); //check

Route::get('/clients/bills', [BillController::class, 'index']); //check
Route::post('/clients/bills/create', [BillController::class, 'store']); //check

//Route::middleware([RoleChecker::class])->group(function () {
    //Route::patch('/clients/update', [UserController::class, 'update']);
//});