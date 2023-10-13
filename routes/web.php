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

// student
use App\Http\Livewire\Student\StudentProfile\StudentProfile;
use App\Http\Livewire\Student\StudentApplication\StudentApplication;
use App\Http\Livewire\Student\StudentStatus\StudentStatus;
use App\Http\Livewire\Student\StudentResult\StudentResult;
use App\Http\Livewire\Student\StudentSchedule\StudentSchedule;
use App\Http\Livewire\Student\StudentDeleted\StudentDeleted;
use App\Http\Livewire\Student\StudentInactive\StudentInactive;
use App\Http\Livewire\Student\StudentRequirements\StudentRequirements;
use App\Http\Livewire\Student\StudentApplication\Cet\Studentcet;
use App\Http\Livewire\Student\StudentApplication\Cet\StudentcetGrad;
use App\Http\Livewire\Student\StudentApplication\Cet\Studentshiftee;
use App\Http\Livewire\Student\StudentApplication\Cet\Studenteat;
use App\Http\Livewire\Student\StudentApplication\Cet\Studentnat;
use App\Http\Livewire\Student\StudentAppointment\StudentAppointment;
use App\Http\Livewire\Student\StudentNotification\StudentNotifications;

// admin
use App\Http\Livewire\Admin\AdminManagement;
use App\Http\Livewire\Admin\Announcement;
use App\Http\Livewire\Admin\ApplicationManagement;
use App\Http\Livewire\Admin\AppointmentManagement;
use App\Http\Livewire\Admin\ChatSupport;
use App\Http\Livewire\Admin\Dashboard;
use App\Http\Livewire\Admin\ExamAdministrator;
use App\Http\Livewire\Admin\ExamManagement;
use App\Http\Livewire\Admin\AdminFaq;
use App\Http\Livewire\Admin\ResultManagement;
use App\Http\Livewire\Admin\RoomManagement;
use App\Http\Livewire\Admin\Settings;
use App\Http\Livewire\Admin\UserManagement;
use App\Http\Livewire\Admin\profile;
use App\Http\Livewire\Student\StudentChat\StudentChat;
use App\Http\Livewire\Admin\notification;


// page
use App\Http\Livewire\Page\About\About;
use App\Http\Livewire\Page\Home\Home;
use App\Http\Livewire\Page\Services\Services;
use App\Http\Livewire\Page\Appointment\Appointment;
use App\Http\Livewire\Page\Faq\Faq;
use App\Http\Livewire\Page\Contact\Contact;


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

// Student routes application
Route::middleware([Authenticated::class,AccountisValid::class,AccountisAdmin::class])->group(function () {
    Route::prefix('student')->group(function () {
        Route::get('/', StudentProfile::class)->name('student.index');
        Route::get('/profile', StudentProfile::class)->name('student.profile');
        Route::get('/application', StudentApplication::class)->name('student.application');
        Route::get('/status', StudentStatus::class)->name('student.status');
        Route::get('/schedule', StudentSchedule::class)->name('student.schedule');
        Route::get('/results', StudentResult::class)->name('student.results');
        Route::get('/payment', [StudentController::class, 'payment'])->name('student.payment');
        Route::get('/requirements',StudentRequirements::class)->name('student.requirements');
        Route::get('/notifications',StudentNotifications::class)->name('student.notifications'); 
        Route::get('/appointment',StudentAppointment::class)->name('student.appointment');
        Route::get('/chat',StudentChat::class)->name('student.chat');
        
        Route::get('/form-application-process', [StudentController::class, 'formApplicationProcess'])->name('student.form-application-process');
        
        
        


        // test routes application
        Route::prefix('application')->group(function () {
            Route::get('/cet/undergrad', Studentcet::class)->name('student.cet.undergrad');
            Route::get('/cet/studentgrad', StudentcetGrad::class)->name('student.cet.Grad');
            Route::get('/cet/studentshiftee', Studentshiftee::class)->name('student.cet.shiftee');
            Route::get('/cet/studenteat', Studenteat::class)->name('student.cet.eat');
            Route::get('/cet/studentnat', Studentnat::class)->name('student.cet.nat');


            Route::get('/cet', [TestApplicationController::class, 'cet'])->name('application.cet');
            Route::get('/cetgraduate', [TestApplicationController::class, 'Cetgraduate'])->name('application.cetgraduate');
            Route::get('/cetshiftee', [TestApplicationController::class, 'Cetshiftee'])->name('application.cetshiftee');
            Route::get('/cettransferee', [TestApplicationController::class, 'Cettransferee'])->name('application.cettransferee');
            Route::get('/nat', [TestApplicationController::class, 'nat'])->name('application.nat');
            Route::get('/gsat', [TestApplicationController::class, 'gsat'])->name('application.gsat');
            Route::get('/eat', [TestApplicationController::class, 'eat'])->name('application.eat');
            Route::get('/lsat', [TestApplicationController::class, 'lsat'])->name('application.lsat');
        });
    });
});

Route::middleware([Authenticated::class])->group(function () {
    Route::get('/deleted', StudentDeleted::class)->name('student.deleted');
    Route::get('/inactive', StudentInactive::class)->name('student.inactive');
});


// admin section
Route::middleware([Authenticated::class,AccountisValid::class,AccountisStudent::class])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', Dashboard::class)->name('admin-home');
        Route::get('dashboard', Dashboard::class)->name('admin-dashboard');
        Route::get('exam-management', ExamManagement::class)->name('exam-management');
        Route::get('admin-management', AdminManagement::class)->name('admin-management');
        Route::get('chatsupport', ChatSupport::class)->name('admin-chatsupport');
        Route::get('setting', Settings::class)->name('setting');
        Route::get('appointment-management', AppointmentManagement::class)->name('manage-appointment');
        Route::get('application-management', ApplicationManagement::class)->name('manage-application');
        Route::get('announcement-management', Announcement::class)->name('admin-announcement');
        Route::get('user-management', UserManagement::class)->name('user-management');
        Route::get('result-management', ResultManagement::class)->name('result-management');
        Route::get('room-management', RoomManagement::class)->name('room-management');
        Route::get('faq-management', AdminFaq::class)->name('faq-management');
        Route::get('exam-administrator', ExamAdministrator::class)->name('exam-administrator');
        Route::get('profile', profile::class)->name('profile');
        Route::get('notification', notification::class)->name('notification');
    });
});







// page routes for each page
Route::prefix('/')->group(function () {
    Route::get('/', Home::class)->name('home');
    Route::get('/about', About::class)->name('about');
    Route::get('/appointment',Appointment::class)->name('appointment');
    Route::get('/services', Services::class)->name('services');
    Route::get('/faq', Faq::class)->name('faq');
    Route::get('/contact', Contact::class)->name('contact');
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




Route::get('php_info', function () {
    return phpinfo();
})->name('php_info');



// test section
Route::get('process-cet-registration', function () {
    return view('test-registration.process-cet-registration');
})->name('process-cet-registration');

