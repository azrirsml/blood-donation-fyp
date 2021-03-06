<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\BloodCampController;
use App\Http\Controllers\BloodStockController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('/blood-camps', BloodCampController::class);
Route::resource('/blood-stocks', BloodStockController::class);
Route::resource('/appointments', AppointmentController::class);

require __DIR__.'/auth.php';
