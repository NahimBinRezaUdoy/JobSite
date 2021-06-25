<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployerProfileController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\UserProfileController;
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

//Employer Profile
Route::view('employer/profile', 'auth.emp-register')->name('employer.profile');
Route::post('employer/store', [EmployerProfileController::class, 'store'])->name('employer.store');

//jobs
Route::get('/', [JobController::class, 'index']);
Route::get('jobs/{id}/{job}', [JobController::class, 'show'])->name('jobs.show');
Route::get('jobs/create', [JobController::class, 'create'])->name('jobs.create');
Route::post('jobs/store', [JobController::class, 'store'])->name('jobs.store');
Route::get('jobs/myjobs', [JobController::class, 'myjobs'])->name('jobs.myjobs');
Route::post('jobs/apply/{id}', [JobController::class, 'apply'])->name('jobs.apply');
Route::get('jobs/applicants', [JobController::class, 'applicants'])->name('jobs.applicants');
Route::get('jobs/alljobs', [JobController::class, 'alljobs'])->name('jobs.alljobs');

//Seeker User Profile
Route::get('user/profile', [UserProfileController::class, 'index'])->name('user.proflie');
Route::post('profile/store', [UserProfileController::class, 'store'])->name('profile.store');
Route::post('profile/coverletter', [UserProfileController::class, 'coverletter'])->name('profile.coverletter');
Route::post('/profile/resume', [UserProfileController::class, 'resume'])->name('profile.resume');
Route::post('/profile/avater', [UserProfileController::class, 'avater'])->name('profile.avater');

//Company
Route::get('/company/{id}/{company}', [CompanyController::class, 'index'])->name('company.index');
Route::get('/company/create', [CompanyController::class, 'create'])->name('company.create');
Route::post('/company/store', [CompanyController::class, 'store'])->name('company.store');
Route::post('/compnay/logo', [CompanyController::class, 'logo'])->name('company.logo');
Route::post('/company/cover_photto', [CompanyController::class, 'cover_photo'])->name('company.cover_photo');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
