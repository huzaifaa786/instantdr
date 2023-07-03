<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Api;
use App\Http\Controllers\Controller;
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

        $data = Order::where('user-id', $request->id)->get();
        return Api::setResponse('order', $data);
    }
}
