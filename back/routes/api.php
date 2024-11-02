<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ZanrController;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\KnjigaController;
use App\Http\Controllers\PretplataController;
use App\Http\Controllers\UserController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');




Route::middleware('auth:sanctum')->group(function () {
    // Rute za autore
    Route::get('autori', [AutorController::class, 'index']);
    Route::get('autori/{id}', [AutorController::class, 'show']);
    Route::post('autori', [AutorController::class, 'store']);
    Route::put('autori/{id}', [AutorController::class, 'update']);
    Route::delete('autori/{id}', [AutorController::class, 'destroy']);


     // Rute za žanrove
     Route::get('zanrovi', [ZanrController::class, 'index']);
     Route::get('zanrovi/{id}', [ZanrController::class, 'show']);
     Route::post('zanrovi', [ZanrController::class, 'store']);
     Route::put('zanrovi/{id}', [ZanrController::class, 'update']);
     Route::delete('zanrovi/{id}', [ZanrController::class, 'destroy']);

    // Rute za knjige
    Route::get('knjige', [KnjigaController::class, 'index']);
    Route::get('knjige/{id}', [KnjigaController::class, 'show']);
    Route::post('knjige', [KnjigaController::class, 'store']);
    Route::put('knjige/{id}', [KnjigaController::class, 'update']);
    Route::delete('knjige/{id}', [KnjigaController::class, 'destroy']);

    // Rute za pretplate
    Route::get('pretplate', [PretplataController::class, 'index']);
    Route::get('pretplate/{id}', [PretplataController::class, 'show']);
    Route::post('pretplate', [PretplataController::class, 'store']);
    Route::put('pretplate/{id}', [PretplataController::class, 'update']);
    Route::delete('pretplate/{id}', [PretplataController::class, 'destroy']);

    Route::get('korisnici', [UserController::class, 'index']);
    Route::get('korisnici/{id}', [UserController::class, 'show']);
    Route::put('korisnici/{id}', [UserController::class, 'update']);
    Route::delete('korisnici/{id}', [UserController::class, 'destroy']);
    Route::get('korisnici/{id}/pretplate', [UserController::class, 'getPretplate']);
});






