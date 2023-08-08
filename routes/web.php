<?php

use App\Http\Controllers\Crime;
use App\Http\Controllers\CrimeController;
use App\Http\Controllers\ProfileController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/home', [CrimeController::class, 'index']);
Route::get('/report/crime', [CrimeController::class, 'indexReportCrime']);
Route::get('/mail', [CrimeController::class, 'indexMail']);
Route::post('/store/crime', [CrimeController::class, 'storeReportedCrime']);


require __DIR__.'/auth.php';
