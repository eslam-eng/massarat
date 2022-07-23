<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseSubscriptionController;
use App\Http\Controllers\CatchReceiptController;
use App\Http\Controllers\ReceiptController;
use App\Http\Controllers\ReportController;

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
});
Route::group(['prefix'=>'msarat'],function (){
    Route::resource('departments',DepartmentController::class);
    Route::resource('courses',CourseController::class);
    Route::resource('employees',EmployeeController::class);
    Route::resource('students',StudentController::class);
    Route::resource('course-subscription',CourseSubscriptionController::class);
    Route::resource('catch-receipt',CatchReceiptController::class);
    Route::resource('receipt',ReceiptController::class);
    Route::get('course-subscription/{id}/payment',[CourseSubscriptionController::class,'payment'])->name('course-subscription.payment');
    Route::get('report',[ReportController::class,'index'])->name('report.index');
    Route::get('expense-report',[ReportController::class,'expenseReport'])->name('report.expenseReport');
    Route::post('report',[ReportController::class,'getReportData'])->name('report.getData');
    Route::post('expense-report',[ReportController::class,'getExpenseReportData'])->name('report.getExpenseReportData');
});
