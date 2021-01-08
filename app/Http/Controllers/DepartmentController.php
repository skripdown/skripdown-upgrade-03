<?php
/** @noinspection PhpPossiblePolymorphicInvocationInspection */

namespace App\Http\Controllers;

use App\Http\back\_Authorize;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function departments() {
        if (!_Authorize::login()) {
            return view('login');
        }
        else {
            if (_Authorize::developer()) {
                $data = Department::all();
            }
            else {
                if (_Authorize::super()) {
                    $faculties = _Authorize::data()->super()->first()->faculties()->get();
                    $data = array();
                    foreach ($faculties as $faculty) {
                        $data = array_merge($faculty->departments()->get());
                    }
                }
                elseif (_Authorize::faculty()) {
                    $data = _Authorize::data()->faculty()->first()->departments()->get();
                }
                elseif (_Authorize::advisor()) {
                    $ocps = _Authorize::data()->advisor()->first()->occupations()->get();
                    $data = array();
                    foreach ($ocps as $occupation) {
                        $data = array_push($data, $occupation->department()->first());
                    }
                }
                elseif (_Authorize::student()) {
                    $data = _Authorize::data()->student()->first()->department()->first();
                }
                else {
                    $data = _Authorize::data()->department()->first();
                }
            }

            return $data;
        }
    }
}
