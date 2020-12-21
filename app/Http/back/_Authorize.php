<?php


namespace App\Http\back;


use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;

class _Authorize
{
    public static function student(): bool {
        if (!self::login())
            return false;
        return Auth::user()->role == 'student';
    }

    public static function advisor(): bool {
        if (!self::login())
            return false;
        return Auth::user()->role == 'advisor';
    }

    public static function department(): bool {
        if (!self::login())
            return false;
        return Auth::user()->role == 'department';
    }

    public static function faculty(): bool {
        if (!self::login())
            return false;
        return Auth::user()->role == 'faculty';
    }

    public static function super(): bool {
        if (!self::login())
            return false;
        return Auth::user()->role == 'super';
    }

    public static function login(): bool {
        return Auth::check();
    }

    public static function data(): ?Authenticatable {
        if (Auth::check()) {
            return Auth::user();
        }
        return null;
    }
}
