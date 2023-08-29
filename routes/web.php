<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AdmissionController;
use App\Http\Controllers\TestApplicationController;
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

// xoxo
// page routes for each page
Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/appointment', [PageController::class, 'appointment'])->name('appointment');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/faq', [PageController::class, 'faq'])->name('faq');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');


// Student routes application
Route::prefix('student')->group(function () {
    Route::get('/profile', [StudentController::class, 'profile'])->name('student.profile');
    Route::get('/application', [StudentController::class, 'application'])->name('student.application');
    Route::get('/registration', [StudentController::class, 'registration'])->name('student.registration');
    Route::get('/schedule', [StudentController::class, 'schedule'])->name('student.schedule');
    Route::get('/results', [StudentController::class, 'results'])->name('student.results');
});

// test routes application
Route::prefix('test-application')->group(function () {
    Route::get('/Cet', [TestApplicationController::class, 'Cet'])->name('test-application.Cet');
    Route::get('/Nat', [TestApplicationController::class, 'Nat'])->name('test-application.Nat');
    Route::get('/Gsat', [TestApplicationController::class, 'Gsat'])->name('test-application.Gsat');
    Route::get('/Eat', [TestApplicationController::class, 'Eat'])->name('test-application.Eat');
    Route::get('/Lsat', [TestApplicationController::class, 'Lsat'])->name('test-application.Lsat');
});

Route::get('/login', function () {
    return view('account.login');
})->name('login');

// Registration
Route::get('/register', function () {
    return view('account.register');
})->name('register');

// Email Verification
Route::get('/create-using-email', function () {
    return view('account.create-using-email');
})->name('create-using-email');



Route::get('admin-dashboard', function () {
    return view('admin.admin-dashboard');
})->name('admin-dashboard');

Route::get('manage-content', function () {
    return view('admin.manage-content');
})->name('manage-content');

Route::get('user-management', function () {
    return view('admin.user-management');
})->name('user-management');

Route::get('manage-appointment', function () {
    return view('admin.manage-appointment');
})->name('manage-appointment');


Route::get('manage-application', function () {
    return view('admin.manage-application');
})->name('manage-application');

Route::get('admin-announcement', function () {
    return view('admin.admin-announcement');
})->name('admin-announcement');



