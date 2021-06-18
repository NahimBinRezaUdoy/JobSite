<?php

use App\Http\Controllers\CompanyController;
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

//jobs
Route::get('/', [JobController::class, 'index']);
Route::get('/jobs/{id}/{job}', [JobController::class, 'show'])->name('jobs.show');

//Company
Route::get('/company/{id}/{company}', [CompanyController::class, 'index'])->name('company.index');

//Seeker User Profile
Route::get('user/profile', [UserProfileController::class, 'index'])->name('user.proflie');
Route::post('profile/store', [UserProfileController::class, 'store'])->name('profile.store');
Route::post('profile/coverletter', [UserProfileController::class, 'coverletter'])->name('profile.coverletter');
Route::post('/profile/resume', [UserProfileController::class, 'resume'])->name('profile.resume');
Route::post('/profile/avater', [UserProfileController::class, 'avater'])->name('profile.avater');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
