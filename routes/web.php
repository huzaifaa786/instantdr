<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\SpecialityController;
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

Route::get('/', function () {
    return view('welcome');
});
// Routes for admin
Route::view('admin/layout', 'admin/layout')->name('admin.layout');
Route::view('admin/login','admin/auth/login');
Route::post('admin/login', [AdminController::class, 'login'])->name('admin.auth.login');
Route::get('logout', [AdminController::class, 'logout'])->name('logout/page');
Route::view('admin/hospital/create','admin/hospital/create');
Route::post('admin/hospital/create', [HospitalController::class, 'store'])->name('admin.hospital.create');
Route::view('admin/allhospitals','admin/hospital/allhospitals')->name('admin.hospital.allhospitals');
Route::get('admin/allhospitals', [HospitalController::class, 'index'])->name('admin.hospital.allhospitals');
Route::post('hospital/edit', [HospitalController::class, 'update'])->name('edit/hospital');
Route::post('city/store', [HospitalController::class, 'city'])->name('city/store');
Route::get('hospital/{id}', [HospitalController::class, 'destroy'])->name('delete_category');
Route::view('admin/doctor/create','admin/doctor/createe')->name('admin.doctor.createe');
Route::post('admin/doctor/create', [DoctorController::class, 'store'])->name('admin.doctor.create');
Route::view('admin/alldoctors','admin/doctor/alldoctors')->name('admin.doctor.alldoctors');
Route::get('admin/alldoctors', [DoctorController::class, 'fetch'])->name('admin.doctor.alldoctors');
Route::post('doctor/edit', [DoctorController::class, 'customUpdate'])->name('edit/doctor');
Route::get('doctor/{id}', [DoctorController::class, 'destroy'])->name('del_doctor');
Route::view('admin/index','admin/dashboard/index')->name('admin.dashboard.index');
Route::view('admin/speciality', 'admin/speciality/doctor-speciality');
Route::view('admin/city', 'admin/city/create')->name('admin/city');
Route::view('admin/ambulance', 'admin/ambulance/create')->name('admin/ambulance');
Route::post('admin/speciality', [SpecialityController::class, 'store'])->name('admin.speciality.doctor-speciality');
Route::view('admin/allspeciality', 'admin/speciality/all-speciality')->name('admin.speciality.all-speciality');
Route::get('admin/allspeciality', [SpecialityController::class, 'index'])->name('admin.speciality.all-speciality');
Route::post('speciality/edit', [SpecialityController::class, 'update'])->name('edit/speciality');
Route::get('speciality/{id}', [SpecialityController::class, 'destroy'])->name('destroy_speciality');
Route::get('admin/doctor/create', [SpecialityController::class, 'show'])->name('admin.doctor.createe');
