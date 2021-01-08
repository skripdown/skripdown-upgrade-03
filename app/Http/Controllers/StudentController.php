<?php
/** @noinspection PhpPossiblePolymorphicInvocationInspection */

namespace App\Http\Controllers;

use App\Http\back\_Analyzer;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\back\_Authorize;

class StudentController extends Controller
{

    public function students() {
        if (!_Authorize::login()) {
            return view('login');
        }
        else {
            if (_Authorize::developer()) {
                $data = Student::all();
            }
            else {
                if (_Authorize::super()) {
                    $data = _Authorize::data()->super()->first()->students()->get();
                }
                elseif (_Authorize::faculty()) {
                    $data = _Authorize::data()->faculty()->first()->students()->get();
                }
                elseif (_Authorize::department()) {
                    $data = _Authorize::data()->department()->first()->students()->get();
                }
                elseif (_Authorize::advisor()) {
                    $advises = _Authorize::data()->advisor()->first()->advises()->get();
                    $data = array();
                    foreach ($advises as $advise) {
                        $data = array_push($advise->document()->first()->student()->first());
                    }
                }
                else {
                    $data = _Authorize::data()->student()->first();
                }
            }

            return $data;
        }
    }

    public function save_doc(Request $request) {
        if (_Authorize::student())
            return response()->json(array('document'=>_Analyzer::analyze_doc($request->document)));
        return response()->json(array('auth'=>'authorization error!'));
    }
}
