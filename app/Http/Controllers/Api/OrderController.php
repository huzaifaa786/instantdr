<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Api;
use App\Http\Controllers\Controller;
use App\Mail\OrderMail;
use App\Models\Doctor;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {

        $order = Order::create($request->all());

        $mailData = [
            'title' => 'New Appointment Booked',
            'doctor_name' => $order->doctor->name,
            'customer_name' => $order->name,
            'date' => $order->date,
            'time' => $order->time,
        ];

        Mail::to($order->doctor->email)->send(new OrderMail($mailData));
        return Api::setResponse('order', $order);
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
