<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\EmployeeController;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;




/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'admin'], function () {
    Route::group(['middleware' => 'auth'], function () {
        Route::resource('employee', EmployeeController::class);
        Route::get('attendance', [AttendanceController::class, 'index'])->name('attendance.index');
        Route::get('/', [EmployeeController::class, 'index'])->name('home');
    });

    Auth::routes([
        'register' => false,
        'password.request' => false,
        'reset' => false,
        'password.confirm' => false
    ]);
});





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

Route::get('/', [AttendanceController::class, 'create'])->name('attendance.create');
Route::post('/attendance', [AttendanceController::class, 'store'])->name('attendance.store');