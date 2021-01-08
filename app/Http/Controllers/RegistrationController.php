<?php

namespace App\Http\Controllers;

use App\Http\back\_Income;
use App\Models\Order;
use App\Models\Registration;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function registers($token): RedirectResponse
    {
        $regist = Registration::all()->where('link',url('/verify').'/'.$token)->first();
        $regist->link = null;
        $regist->save();
        $user   = $regist->super()->first()->user()->first();
        _Income::insert(Order::all()->where('token',$token)->first());

        Auth::login($user);
        return redirect()->route('dashboard');
    }
}
