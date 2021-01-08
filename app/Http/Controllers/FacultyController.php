<?php
/** @noinspection PhpPossiblePolymorphicInvocationInspection */

namespace App\Http\Controllers;

use App\Http\back\_Authorize;
use App\Models\Faculty;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    public function faculties() {
        if (!_Authorize::login()) {
            return view('login');
        }
        else {
            if (_Authorize::developer()) {
                $data = Faculty::all();
            }
            else {
                if (_Authorize::super()) {
                    $data = _Authorize::data()
                        ->super()->first()->faculties()->get();

                    return view('client.super.faculties_super', compact('data'));
                }
                else {
                    if (_Authorize::department())
                        $data = _Authorize::data()->department()->first()->faculty()->first();
                    elseif (_Authorize::advisor()) {
                        $ocps = _Authorize::data()->advisor()->first()->occupations()->get();
                        $data = array();
                        foreach ($ocps as $occupation)
                            $data = array_push($data, $occupation->department()->first()->faculty()->first());
                    }
                    elseif (_Authorize::student()) {
                        $data = _Authorize::data()->student()->first()->factulty()->first();
                    }
                    else {
                        $data = _Authorize::data()->faculty()->first();
                    }
                }
            }

            return $data;
        }
    }
}
