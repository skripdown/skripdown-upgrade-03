<?php
/** @noinspection PhpUndefinedMethodInspection */
/** @noinspection PhpUndefinedClassInspection */

namespace App\Http\Controllers;

use A6digital\Image\DefaultProfileImage;
use App\Http\back\_Image;
use App\Models\Order;
use App\Models\Previlege;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Image;

class OrderController extends Controller
{

    public function order($token) {
        $order = Order::with('previlege')->where('token',$token)->first();
        if ($order != null) {
            return view('client.order',compact('order'));
        }
        return 'ERROR!';
    }

    public function registerOrder(Request $request): JsonResponse {
        $count = Previlege::all()->count();
        if ($request->plan > $count)
            return response()->json(array('status'=>0));

        $order               = new Order();
        $previlege           = Previlege::all()->where('id',$request->plan)->first();
        $order->previlege_id = $request->plan;
        $order->identity     = $request->identity;
        $order->name         = $request->name;
        $order->email        = $request->email;
        $order->password     = Hash::make($request->password);

        if ($previlege->price > 0) {
            $order->transaction =
                _Image::setTransaction($request->file('transaction'),$request->identity,$request->plan);
        }

        if ($request->file('pic') != null) {
            $order->pic      = _Image::setProfile($request->file('pic'),$request->identity);
            $order->has_pic  = true;
        }
        else {
            $order->pic      = _Image::setDefaultProfile($request->name,$request->identity);
            $order->has_pic  = false;
        }
        if ($request->city  != null)
            $order->city     = $request->city;
        else
            $order->city     = env('APP_LOCATION');
        $order->token        = $request->token;
        $order->save();

        return response()->json(array('request'=>$request->all(),'status'=>1));
    }
}
