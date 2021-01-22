<?php


namespace App\Http\back;


use App\Models\Super;

class _Resprep
{
    public static function verify_super($request):bool {
        $super     = Super::all()->where('id', $request->super_id)->first();
        $verify    = _Super::super(_Authorize::data());

        if ($super == null || $verify == null)
            return false;
        return $super->id == $verify->id;
    }

    public static function verify_unique_faculties($request,$max=1):bool {
        $super     = _Super::super(_Authorize::data());
        $faculties = $super->faculties()->get();
        $count     = 0;
        foreach ($faculties as $faculty) {
            if ($faculty->user()->first()->identity == $request->identity) {
                $count += 1;
                if ($count > $max)
                    return false;
            }
        }
        return true;
    }

    public static function verify_unique_departments($request,$max=1):bool {
        $super          = _Super::super(_Authorize::data());
        $departments    = $super->departments()->get();
        $count          = 0;
        foreach ($departments as $department) {
            if ($department->user()->first()->identity == $request->identity) {
                $count += 1;
                if ($count > $max)
                    return false;
            }
        }
        return true;
    }
}
