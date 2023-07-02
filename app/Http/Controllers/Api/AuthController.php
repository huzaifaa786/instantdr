<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Api;
use App\Helpers\ApiValidate;
use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use stdClass;

class AuthController extends Controller
{
    public function patientLogin(Request $request)
    {

        $credentials = ApiValidate::login($request, User::class);
        // $credentials = $request->only('email', 'password');

        if (Auth::guard('web')->attempt($credentials)) {
            $user = User::find(Auth::guard('web')->user()->id);
            // $user->firebase_token = $request->firebase_token;
            $user->save();
            return Api::setResponse('user', $user->withToken());
        } else {
            return Api::setError('Invalid credentials');
        }
    }

    public function patientRegister(Request $request)
    {

        $credentials = ApiValidate::register($request, User::class);



        $user = User::find(User::create($credentials)->id);

        return Api::setResponse('user', $user->withToken());



        $response = new stdClass;
        $response->user = $user->withToken();
        // $response->otp = $otp;
        return response()->json($response);
    }
    public function doctorLogin(Request $request)
    {

        $credentials = ApiValidate::login($request, Doctor::class);
        // $credentials = $request->only('email', 'password');

        if (Auth::guard('doctor')->attempt($credentials)) {
            $doctor = Doctor::find(Auth::guard('doctor')->user()->id);
            // $user->firebase_token = $request->firebase_token;
            $doctor->save();
            return Api::setResponse('doctor', $doctor->withToken());
        } else {
            return Api::setError('Invalid credentials');
        }
    }
}
