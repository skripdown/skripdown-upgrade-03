<?php


namespace App\Http\back;


use Illuminate\Support\Facades\Auth;

class _Authorize
{
    public static function student(): bool {
        if (!Auth::check())
            return false;
        return Auth::user()->role == 'student';
    }

    public static function advisor(): bool {
        if (!Auth::check())
            return false;
        return Auth::user()->role == 'advisor';
    }

    public static function department(): bool {
        if (!Auth::check())
            return false;
        return Auth::user()->role == 'department';
    }

    public static function faculty(): bool {
        if (!Auth::check())
            return false;
        return Auth::user()->role == 'faculty';
    }

    public static function super(): bool {
        if (!Auth::check())
            return false;
        return Auth::user()->role == 'super';
    }
}
