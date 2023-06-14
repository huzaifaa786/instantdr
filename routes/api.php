<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DoctorController;
use App\Http\Controllers\Api\PaymentController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
// routes/api.php
Route::any('register', [AuthController::class, 'patientRegister']);
Route::any('patient/login', [AuthController::class, 'patientLogin']);
Route::any('doctorlogin', [AuthController::class, 'doctorLogin']);
Route::any('doctorall', [DoctorController::class, 'doctorAll']);
Route::any('doctorspeciality', [DoctorController::class, 'doctorSpeciality']);
Route::any('doctor/get', [DoctorController::class, 'getdoctor']);
Route::any('doctor/detail', [DoctorController::class, 'doctorShow']);
Route::any('payment/intent', [PaymentController::class, 'createPaymentIntent']);
Route::any('user/get', [UserController::class, 'userget']);