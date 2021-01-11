<?php


namespace App\Http\back;


class _UI
{
    public static $FLAG_UI = ';v=1';
    public static $FLAG_HIDE = ';v=0';
    public static $FLAG_RELATION = ';r=1';
    public static $FLAG_NORELATION = ';r=0';

    public static function show($flag=''):bool {
        return str_contains($flag, self::$FLAG_UI);
    }

    public static function relation($flag=''):bool {
        return str_contains($flag, self::$FLAG_RELATION);
    }
}
