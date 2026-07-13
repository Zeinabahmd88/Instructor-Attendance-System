<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\HrController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\DoctorController;

use App\Http\Controllers\AttendanceController;
use Illuminate\Support\Facades\Auth;

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
// In your routes/web.php or routes/api.php
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');
Route::middleware(['auth', 'role:hr'])->post('/send-absent-doctors', 'HRController@sendAbsentDoctors');
Route::post('/update-status', [HrController::class, 'updateStatus'])->name('updateStatus');
Route::get('/hr', [HRController::class, 'index']);
Route::post('/sendAbsentDoctorsToSchools', [HRController::class, 'sendAbsentDoctorsToSchools'])->name('sendAbsentDoctorsToSchools');
Route::post('/storeAttendance', [InstructorController::class, 'storeAttendance']);
route::get('/show',[InstructorController::class,'show']);
Route::get('/welcome', function () {
    return view('welcome');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

route::get('/redirect',[HomeController::class,'redirect']);
Route::get('attendance/create', [AttendanceController::class, 'create']);
Route::post('/store', [AttendanceController::class, 'store']);
Route::post('/request-absent-reason/{doctor}', [HomeController::class, 'requestAbsentReason'])->name('request.absent.reason');
Route::get('/doctor/home', [DoctorController::class, 'home'])->name('doctor.home');
Route::post('/submit-absent-reason/{absenceRequest}', [DoctorController::class, 'submitAbsentReason'])->name('submit.absent.reason');
Route::post('/submit-absence-status/{id}', [HomeController::class, 'submitAbsenceStatus'])->name('submit.absence.status');
Route::post('/send-to-hr/{id}', [HomeController::class, 'sendToHR'])->name('send.to.hr');
