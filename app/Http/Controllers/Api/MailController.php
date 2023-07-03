<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function sendopt(Request $request)
    {
        $data = User::where('email', $request->email)->first();
        if ($data != null) {
            $otp = random_int(1000, 9999);
            $mailData = [
                'title' => 'Teanslation-Request Change Password',
                'name' => $data->name,
                'otp' => $otp,
            ];

            Mail::to($request->email)->send(new OtpMail($mailData));
            return Api::setResponse('otp', $otp);
        } else {
            return Api::setError('user not exist on this email');
        }
    }
}
