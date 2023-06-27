<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;

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

Route::get('', [UserController::class, 'getHome']);
Route::get('/login', [UserController::class, 'showLogin']);
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::get('logout', [UserController::class, 'getLogout']);


Route::middleware(['auth'])->group(function () {
    Route::get('index', [UserController::class, 'index']);
    Route::get('/create', [UserController::class, 'create']);
    Route::post('/create', [UserController::class, 'store']);
    Route::get('index/{id}',[UserController::class,'show']);
    Route::get('index/{id}/edit',[UserController::class,'edit']);
    Route::post('index/{id}',[UserController::class,'update']);
    Route::get('index/delete/{id}',[UserController::class,'delete']);

    Route::get('contacts',[ContactController::class,'index']);
    Route::get('contacts/create',[ContactController::class,'create']);
    Route::post('contacts',[ContactController::class,'store']);
    Route::get('contacts/{id}/edit',[ContactController::class,'edit']);
    Route::get('contacts/{id}/edit',[ContactController::class,'edit']);
    Route::get('contacts/{id}',[ContactController::class,'update']);
    Route::get('contacts/delete/{id}',[ContactController::class,'destroy']);
});






