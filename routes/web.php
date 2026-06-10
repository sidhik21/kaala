
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaalaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/kaala',   [KaalaController::class, 'showLogin'])->name('login');
Route::post('/kaala',  [KaalaController::class, 'login']);  // ← changed to /kaala

Route::get('/feed',    [KaalaController::class, 'showFeed'])->name('feed');
Route::post('/feed',   [KaalaController::class, 'submitFeed']);
Route::get('/thankyou',[KaalaController::class, 'thankYou'])->name('thankyou');
Route::post('/logout', [KaalaController::class, 'logout'])->name('logout');
Route::get('/list',    [KaalaController::class, 'show'])->name('list');
