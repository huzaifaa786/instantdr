<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Api;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function userget(Request $request)
    {
       $user = User::where('api_token', $request->api_token)->first();
       return Api::setResponse('user', $user);
    }

    public function changeuserpassword(Request $request)
    {

        $data = User::where('api_token', $request->api_token)->first();

        $data = $data->withpassword();
        $previousPassword = $data->password;

        // dd($new,$previousPassword);

        if (Hash::check($request->password, $previousPassword)) {
            $data->update([
                'password' => $request->newpassword
            ]);
            // Passwords match
            return Api::setResponse('update', $data);
        } else {
            // Passwords do not match
            return Api::setError('Current password incorrect');
        }
    }
    
}
