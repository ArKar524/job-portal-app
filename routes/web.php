<?php

use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\admin\auth\AuthController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\PaymentController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InterviewInfoController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\profile\ProfileController;
use App\Http\Controllers\UiDisplayController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use SebastianBergman\CodeCoverage\Report\Html\Dashboard;
use Symfony\Component\HttpKernel\EventListener\ProfilerListener;

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
// Ui Display section
Route::get('/',[HomeController::class,'index'])->name('home');;
Route::get('/about',[UiDisplayController::class,'about']);
Route::get('/jobs',[UiDisplayController::class,'jobs'])->name('jobs');
Route::get('/contact',[UiDisplayController::class,'contact'])->name('contact');
Route::get('/jobDetails/{id}',[UiDisplayController::class,'job_details']);
Route::get('/team',[UiDisplayController::class,'team']);
Route::get('/terms',[UiDisplayController::class,'terms']);
Route::get('/testimonials',[UiDisplayController::class,'testimonials']);


// admin routes



// Route::middleware('auth')->group(function () {
//     Route::get('/employeeRegister',[AuthController::class,'registerIndex']);
//     Route::post('/employeeRegister',[AuthController::class,'employeeRegisterStore']);
// });

// employee auth routes
Route::get('/register',[AuthController::class,'index']);
Route::post('/register',[AuthController::class,'register']);

Route::get('/login',[AuthController::class,'login'])->name('login');
Route::post('/login',[AuthController::class,'login1']);
Route::get('/logout',[AuthController::class,'logout']);

Route::get('/employerRegister',[EmployerController::class,'employerRegisterIndex']);
Route::post('/employerRegisterStore',[EmployerController::class,'employerRegisterStore']);
Route::get('/employerLogin',[EmployerController::class,'employerLoginIndex'])->name('login');
Route::post('/employerLoginStore',[EmployerController::class,'employerLoginStore']);
Route::get('/logout',[EmployerController::class,'logout']);

Route::group(['prefix'=> 'admin', 'middleware'=>['auth', 'isAdmin']],function () {
    Route::get('/',[AdminDashboardController::class,'index']);
    // category
    Route::get('/categories',[CategoryController::class,'index']);
    Route::get('/category/create',[CategoryController::class,'create']);
    Route::post('/category/store',[CategoryController::class,'store']);
    Route::get('/category/{id}/edit',[CategoryController::class,'edit']);
    Route::post('/category/{id}/update',[CategoryController::class,'update']);
    Route::post('/category/{id}/delete',[CategoryController::class,'delete']);

    Route::post('/jobApprove/{id}',[JobController::class,'jobApprove']);
    Route::post('/jobDecline/{id}',[JobController::class,'jobDecline']);
    Route::post('/jobRemove/{id}',[JobController::class,'jobRemove']);
    // Dashboard Job
    Route::get('/jobs',[AdminDashboardController::class,'allJobs']);
    // Payment Controller
    Route::get('/payment',[PaymentController::class,'index']);
    Route::post('/payment/confirm',[PaymentController::class,'request']);
    Route::post('/payment/{id}/confirm',[PaymentController::class,'confirm']);
    Route::post('/payment/{id}/decline',[PaymentController::class,'decline']);
});

// profile
Route::get('/profile',[ProfileController::class,'index'])->name('profile');
// Job-Application

Route::group(['prefix'=> 'employer','middleware'=>'auth','isEmployer'], function () {
    Route::get('/',[EmployerController::class,'index']);
    // Payment Controller
    Route::get('/payment',[PaymentController::class,'index']);
    Route::post('/payment/confirm',[PaymentController::class,'request']);
    Route::post('/payment/{id}/confirm',[PaymentController::class,'confirm']);
    Route::post('/payment/{id}/decline',[PaymentController::class,'decline']);
    // jobs
    Route::get('/jobs',[AdminDashboardController::class,'jobs']);
    // jobController Resource Controller
    Route::resource('/job', JobController::class);
    Route::post('interviewInfo',[InterviewInfoController::class,'store']);
});

    Route::resource('/job-application',ApplicationController::class);
    Route::post('/job-application/{id}/accept',[ApplicationController::class,'applicationAccept']);
    Route::post('/job-application/{id}/decline',[ApplicationController::class,'applicationDecline']);

    // search

    Route::get('/jobs/search_by_cat/{id}',[UiDisplayController::class,'searchByCategory']);