<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AdmissionController;
use App\Http\Controllers\TestApplicationController;

// authenticated middleware
use App\Http\Middleware\Authenticated;


// registration / login
use App\Http\Livewire\Authentication\Login;
use App\Http\Livewire\Authentication\Register;
use App\Http\Livewire\Authentication\RegisterEmail;
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
    Route::get('/profile', [StudentController::class, 'profile'])->middleware(Authenticated::class)->name('student.profile');
    Route::get('/application', [StudentController::class, 'application'])->name('student.application');
    Route::get('/registration', [StudentController::class, 'registration'])->name('student.registration');
    Route::get('/schedule', [StudentController::class, 'schedule'])->name('student.schedule');
    Route::get('/results', [StudentController::class, 'results'])->name('student.results');
    Route::get('/payment', [StudentController::class, 'payment'])->name('student.payment');
});

// test routes application
Route::prefix('test-application')->group(function () {
    Route::get('/cet', [TestApplicationController::class, 'cet'])->name('test-application.Cet');
    Route::get('/Nat', [TestApplicationController::class, 'Nat'])->name('test-application.Nat');
    Route::get('/gsat', [TestApplicationController::class, 'gsat'])->name('test-application.Gsat');
    Route::get('/eat', [TestApplicationController::class, 'eat'])->name('test-application.Eat');
    Route::get('/lsat', [TestApplicationController::class, 'lsat'])->name('test-application.Lsat');
});

Route::get('/login', Login::class)->middleware(Authenticated::class)->name('login');

// Registration
Route::get('/register', Register::class)->middleware(Authenticated::class)->name('register');
// Route::get('/register-email',RegisterEmail::class)->middleware(Authenticated::class)->name('register-email');


Route::get('/forgot-password', function () {
    return view('account.forgot-password');
})->name('forgot-password');

// Email Verification


Route::get('/verification-code', function () {
    return view('account.verification-code');
})->name('verification-code');

Route::get('/admin-login', function () {
    return view('account.admin-login');
})->name('admin-login');




// admin section
Route::get('admin-dashboard', function () {
    return view('admin.admin-dashboard');
})->name('admin-dashboard');

Route::get('admin-chatsupport', function () {
    return view('admin.admin-chatsupport');
})->name('admin-chatsupport');


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

Route::get('user-management', function () {
    return view('admin.user-management');
})->name('user-management');

