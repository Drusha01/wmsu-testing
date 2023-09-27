<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AdmissionController;
use App\Http\Controllers\TestApplicationController;

// authenticated middleware
use App\Http\Middleware\Logout;
use App\Http\Middleware\Authenticated;
use App\Http\Middleware\Unauthenticated;
use App\Http\Middleware\AccountisValid;
use App\Http\Middleware\AccountisAdmin;
use App\Http\Middleware\AccountisStudent;



// authentication
use App\Http\Livewire\Authentication\Signout;
use App\Http\Livewire\Authentication\Login;
use App\Http\Livewire\Authentication\Register;
use App\Http\Livewire\Authentication\RegisterEmail;
use App\Http\Livewire\Authentication\ForgotPassword;
use App\Http\Livewire\Authentication\AccountRecovery;

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


// authentication
Route::get('/logout', Signout::class)->middleware(Logout::class)->name('logout');

Route::middleware([Unauthenticated::class,AccountisValid::class])->group(function () {
    Route::get('/login', Login::class)->name('login');
    Route::get('/register', Register::class)->name('register');
    Route::get('/register-email',RegisterEmail::class)->name('register-email');
   
    Route::get('/forgot-password', ForgotPassword::class)->name('forgot-password');
    Route::get('/account/recovery/{hash}', AccountRecovery::class)->name('account-recovery');
});

// start editing here


// page routes for each page
Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/appointment', [PageController::class, 'appointment'])->name('appointment');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/faq', [PageController::class, 'faq'])->name('faq');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');


// Student routes application
Route::middleware([Authenticated::class,AccountisValid::class,AccountisAdmin::class])->group(function () {
    Route::prefix('student')->group(function () {
        Route::get('/profile', [StudentController::class, 'profile'])->name('student.profile');
        Route::get('/application', [StudentController::class, 'application'])->name('student.application');
        Route::get('/status', [StudentController::class, 'status'])->name('student.status');
        Route::get('/schedule', [StudentController::class, 'schedule'])->name('student.schedule');
        Route::get('/results', [StudentController::class, 'results'])->name('student.results');
        Route::get('/payment', [StudentController::class, 'payment'])->name('student.payment');
    });
});

// test routes application
Route::prefix('test-application')->group(function () {
    Route::get('/cet', [TestApplicationController::class, 'cet'])->name('test-application.Cet');
    Route::get('/Cetgraduate', [TestApplicationController::class, 'Cetgraduate'])->name('test-application.Cetgraduate');
    Route::get('/Cetshiftee', [TestApplicationController::class, 'Cetshiftee'])->name('test-application.Cetshiftee');
    Route::get('/Cettransferee', [TestApplicationController::class, 'Cettransferee'])->name('test-application.Cettransferee');
    Route::get('/Nat', [TestApplicationController::class, 'Nat'])->name('test-application.Nat');
    Route::get('/gsat', [TestApplicationController::class, 'gsat'])->name('test-application.Gsat');
    Route::get('/eat', [TestApplicationController::class, 'eat'])->name('test-application.Eat');
    Route::get('/lsat', [TestApplicationController::class, 'lsat'])->name('test-application.Lsat');
});






// Email Verification


Route::get('/verification-code', function () {
    return view('account.verification-code');
})->name('verification-code');

Route::get('/admin-login', function () {
    return view('account.admin-login');
})->name('admin-login');

Route::get('verification-email', function () {
    return view('account.verification-email');
})->name('verification-email');





// admin section
Route::prefix('admin')->group(function () {
    Route::get('dashboard', function () {return view('admin.admin-dashboard');})->name('admin-dashboard');
    Route::get('exam-management', function () {return view('admin.exam-management');})->name('exam-management');
    Route::get('room-management', function () {return view('admin.room-management');})->name('room-management');
    Route::get('room-assignment', function () {return view('admin.room-assignment');})->name('room-assignment');
    Route::get('admin-management', function () {return view('admin.admin-management');})->name('admin-management');
    Route::get('chatsupport', function () {return view('admin.admin-chatsupport');})->name('admin-chatsupport');
    Route::get('setting', function () {return view('admin.setting');})->name('setting');
    Route::get('user-management', function () {return view('admin.user-management');})->name('user-management');
    Route::get('appointment-management', function () {return view('admin.manage-appointment');})->name('manage-appointment');
    Route::get('application-management', function () {return view('admin.manage-application');})->name('manage-application');
    Route::get('announcement-management', function () {return view('admin.admin-announcement');})->name('admin-announcement');
    Route::get('user-management', function () {return view('admin.user-management');})->name('user-management');
});

// test section
Route::get('process-cet-registration', function () {
    return view('test-registration.process-cet-registration');
})->name('process-cet-registration');