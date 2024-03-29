<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DoctorController;
use App\Http\Controllers\Api\OrderController;
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
Route::any('doctorall', [DoctorController::class, 'doctorAll']);
Route::any('all/city', [DoctorController::class, 'cityAll']);
Route::any('doctorspeciality', [DoctorController::class, 'doctorSpeciality']);
Route::any('doctor/get', [DoctorController::class, 'getdoctor']);
Route::any('doctor/detail', [DoctorController::class, 'doctorShow']);
Route::any('doctorlogin', [AuthController::class, 'doctorLogin']);
Route::any('register', [AuthController::class, 'patientRegister']);
Route::any('patient/login', [AuthController::class, 'patientLogin']);
Route::group(['middleware' => 'auth:doctor_api'], function () {
 
});
Route::group(['middleware' => 'auth:web'], function () {
});

Route::any('payment/intent', [PaymentController::class, 'createPaymentIntent']);
Route::any('user/get', [UserController::class, 'userget']);
Route::any('user/passwordchange', [UserController::class, 'changeuserpassword']);
Route::any('order/store', [OrderController::class, 'store']);
Route::any('order/get', [OrderController::class, 'orderget']);
Route::any('order/doctor', [OrderController::class, 'doctororder']);
Route::any('all/ambulance', [DoctorController::class, 'ambulanceAll']);

Route::group(['namespace' => 'App\Http\Controllers\Api'], function () {
Route::group(['middleware' => 'or'], function () {
    /**
     * Authentication for pusher private channels
     */
    Route::post('/chat/auth', 'MessagesController@pusherAuth')->name('api.pusher.auth');

    /**
     *  Fetch info for specific id [user/group]
     */
    Route::post('/idInfo', 'MessagesController@idFetchData')->name('api.idInfo');

    /**
     * Send message route
     */
    Route::post('/sendMessage', 'MessagesController@send')->name('api.send.message');

    /**
     * Fetch messages
     */
    Route::post('/fetchMessages', 'MessagesController@fetch')->name('api.fetch.messages');

    /**
     * Download attachments route to create a downloadable links
     */
    Route::get('/download/{fileName}', 'MessagesController@download')->name('api.' . config('chatify.attachments.download_route_name'));

    /**
     * Make messages as seen
     */
    Route::post('/makeSeen', 'MessagesController@seen')->name('api.messages.seen');Route::post('/unseen/all', 'MessagesController@getUnSeenCount')->name('api.messages.unseen');

    /**
     * Get contacts
     */
    Route::any('/getContacts', 'MessagesController@getContacts')->name('api.contacts.get');

    /**
     * Star in favorite list
     */
    Route::post('/star', 'MessagesController@favorite')->name('api.star');

    /**
     * get favorites list
     */
    Route::post('/favorites', 'MessagesController@getFavorites')->name('api.favorites');

    /**
     * Search in messenger
     */
    Route::get('/search', 'MessagesController@search')->name('api.search');

    /**
     * Get shared photos
     */
    Route::post('/shared', 'MessagesController@sharedPhotos')->name('api.shared');

    /**
     * Delete Conversation
     */
    Route::post('/deleteConversation', 'MessagesController@deleteConversation')->name('api.conversation.delete');

    /**
     * Delete Conversation
     */
    Route::post('/updateSettings', 'MessagesController@updateSettings')->name('api.avatar.update');

    /**
     * Set active status
     */
    Route::post('/setActiveStatus', 'MessagesController@setActiveStatus')->name('api.activeStatus.set');
});
});