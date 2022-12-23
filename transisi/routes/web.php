<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Auth;
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

Route::prefix('companies')->group(function(){
    Route::get('/',[CompanyController::class,'index'])->name('company.index');
    Route::get('/create',[CompanyController::class,'create'])->name('company.create');
    Route::post('/create',[CompanyController::class,'store'])->name('company.store');
    Route::get('/edit/{id}',[CompanyController::class,'edit'])->name('company.edit');
    Route::put('/{id}',[CompanyController::class,'update'])->name('company.update');
    Route::delete('/{id}',[CompanyController::class,'destroy'])->name('company.delete');
    Route::get('/printPDF',[CompanyController::class,'printPDF'])->name('company.printPDF');
});
Route::prefix('employees')->group(function(){
    Route::get('/',[EmployeeController::class,'index'])->name('employee.index');
    Route::get('/create',[EmployeeController::class,'create'])->name('employee.create');
    Route::post('/create',[EmployeeController::class,'store'])->name('employee.store');
    Route::get('/edit/{id}',[EmployeeController::class,'edit'])->name('employee.edit');
    Route::put('/{id}',[EmployeeController::class,'update'])->name('employee.update');
    Route::delete('/{id}',[EmployeeController::class,'destroy'])->name('employee.delete');
    Route::get('/printPDF',[EmployeeController::class,'printPDF'])->name('employee.printPDF');
});

Auth::routes([
    'register'=> false,
    'confirm'=> false,
    'email'=> false,
    'reset'=> false, 
    'verify'=> false, 
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
