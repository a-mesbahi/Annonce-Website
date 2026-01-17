<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\AnnonceController;

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

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/home', function () {
    return view('home');
})->name('home');


Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');

Route::get('/register',[RegisterController::class, 'index'])->name('register');
Route::post('/register',[RegisterController::class, 'store']);

Route::post('/logout',[LogoutController::class, 'store'])->name('logout');

Route::get('/login',[LoginController::class, 'index'])->name('login');
Route::post('/login',[LoginController::class, 'store']);

Route::get('/Annonces',[AnnonceController::class, 'index'])->name('Annonces');
Route::get('/Annonces/offer',[AnnonceController::class, 'offer'])->name('Annonces.offer');
Route::get('/Annonces/request',[AnnonceController::class, 'request'])->name('Annonces.request');
Route::post('/Annonces',[AnnonceController::class, 'store']);
Route::delete('/Annonces/{annonce}',[AnnonceController::class, 'destroy'])->name('Annonces.destroy');
Route::get('/Annonces/{annonce}',[AnnonceController::class, 'edit'])->name('Annnoces.edit');
Route::put('/Annonces/{id}/update',[AnnonceController::class,'update'])->name('Annoce.update');



