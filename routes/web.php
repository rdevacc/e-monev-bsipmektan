<?php

use App\Http\Controllers\ActivitiesFilterController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\UserController;
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


Route::get('/app/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::get('/app/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/app/login', [LoginController::class, 'authenticate']);
Route::get('/app/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');

Route::get('/app/forgot-password', [LoginController::class, 'forgot_password'])->middleware('guest')->name('forgot-password');
Route::post('/app/forgot-password-submit', [LoginController::class, 'forgot_password_submit'])->name('forgot-password-submit');

Route::get('/app/reset-password/{token}', [LoginController::class, 'reset_password'])->middleware('guest')->name('reset-password');
Route::post('/app/reset-password/', [LoginController::class, 'reset_password_submit'])->middleware('guest')->name('reset-password-submit');

Route::get('/app/activities/search', [ActivitiesFilterController::class, 'search'])->middleware('auth');
Route::get('/app/activities/filter', [ActivitiesFilterController::class, 'filter'])->middleware('auth');

Route::post('/app/activities/pdf', [PdfController::class, 'generatePDF'])->middleware('auth');
Route::post('/app/activities/excel', [ExcelController::class, 'generateExcel'])->middleware('auth');

Route::resource('/app/activities', ActivityController::class)->middleware('auth');
Route::post('/app/activities/fetch-budget', [ActivityController::class, 'fetchBudget'])->middleware('auth');

Route::resource('/app/departments', DepartmentController::class)->middleware('can:superAdminAndAdmin', 'auth');

Route::resource('/app/divisions', DivisionController::class)->middleware('can:superAdminAndAdmin', 'auth');

Route::resource('/app/users', UserController::class)->middleware('can:superAdminAndAdmin', 'auth');
