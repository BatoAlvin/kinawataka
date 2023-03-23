<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FamilymembersController;
use App\Http\Controllers\SavingController;
use App\Http\Controllers\SavingsummaryController;
use App\Http\Controllers\LoansController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserpermissionController;
use App\Http\Controllers\DashboardController;
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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/',  [DashboardController::class,'dashboard'])->middleware(['auth'])->name('dashboard');
Route::get('/myprofile', [DashboardController::class, 'myprofile'])->name('myprofile')
->middleware('auth');
Route::get('/registeruser', [DashboardController::class, 'user'])->name('registeruser')
->middleware('auth');
Route::post('/registeruser', [DashboardController::class, 'createuser'])->name('registeruser')
->middleware('auth');

//Family
Route::resource('members', FamilymembersController::class)->middleware('auth');
Route::post('enroll/{id}', [FamilymembersController::class, 'enroll'])->name('enroll')->middleware('auth');
Route::get('exportfamilymember/', [FamilymembersController::class, 'export'])->name('exportfamilymember')->middleware('auth');


//Savings
Route::resource('savings', SavingController::class)->middleware('auth');
Route::get('exportsaving/', [SavingController::class, 'export'])->name('exportsaving')->middleware('auth');



//Savingsummary
Route::resource('savingsummary', SavingsummaryController::class)->middleware('auth');
Route::get('exportsavingsummary/', [SavingsummaryController::class, 'export'])->name('exportsavingsummary')->middleware('auth');

//Loans
Route::resource('loans', LoansController::class)->middleware('auth');
Route::get('exportloan/', [LoansController::class, 'export'])->name('exportloan')->middleware('auth');

//Userpermissions
Route::resource('userpermission', UserpermissionController::class)->middleware('auth');
Route::post('validateuserpermission', [UserpermissionController::class, 'validateuserpermission'])->middleware('auth');

//Audit Trails
Route::get('audits', [DashboardController::class, 'fetchaudits'])->name('audits')
->middleware('auth');
Route::post('/searchaudit', [DashboardController::class, 'search'])->name('searchaudit')->middleware('auth');

require __DIR__.'/auth.php';
