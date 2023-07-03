<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Api;
use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {

        $data = Order::create($request->all());
        return Api::setResponse('order', $data);
    }
    public function orderget(Request $request)
    {

        $data = Order::where('user_id', $request->id)->with('hospital')->with('doctor')->with('doctor.speciality')->get();
        return Api::setResponse('order', $data);
    }

    public function doctororder(Request $request)
    {
        $doctor=Doctor::where('api_token', $request->api_token)->first();

        $data = Order::where('doctor_id', $doctor->id)->with('hospital')->with('doctor')->with('doctor.speciality')->get();
        return Api::setResponse('order', $data);
    }
}
