<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Previlege;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class OrderController extends Controller
{
    public function registerOrder(Request $request): JsonResponse {
        $count = Previlege::all()->count();
        if ($request->plan > $count)
            return response()->json(array('status'=>0));

        $order               = new Order();
        $order->previlege_id = $request->plan;
        $order->identity     = $request->identity;
        $order->name         = $request->name;
        $order->email        = $request->email;
        $order->password     = Hash::make($request->password);
        if ($request->city  != null)
            $order->city     = $request->city;
        else
            $order->city     = env('APP_LOCATION');
        if ($request->transaction != null)
            $order->transaction    = $request->transaction;
        $order->token        = $request->token;
        $order->save();

        return response()->json(array('request'=>$request->all(),'status'=>1));
    }
}
