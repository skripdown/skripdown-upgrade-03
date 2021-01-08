<?php
/** @noinspection PhpPossiblePolymorphicInvocationInspection */

namespace App\Http\Controllers;

use App\Models\Super;
use Illuminate\Http\Request;
use App\Http\back\_Authorize;

class SuperController extends Controller
{

    public function supers() {
        if (!_Authorize::login()) {
            return view('login');
        }
        else {
            if (_Authorize::developer()) {
                $data = Super::all();
            }
            else {
                if (_Authorize::super()) {
                    $data = _Authorize::data()->super()->first();
                }
                elseif (_Authorize::faculty()) {
                    $data = _Authorize::data()->faculty()->first()->super()->first();
                }
                elseif (_Authorize::department()) {
                    $data = _Authorize::data()->department()->first()->faculty()->first()->super()->first();
                }
                elseif (_Authorize::advisor()) {
                    $ocps = _Authorize::data()->advisor()->first()->occupations()->get();
                    $data = array();
                    foreach ($ocps as $occupation) {
                        $data = array_push($data, $occupation->department()->first()->faculty()->first()->super()->first());
                    }
                }
                else {
                    $data = _Authorize::data()->student()->first()->super()->first();
                }
            }

            return $data;
        }
    }

    public function super($identity) {

    }

}
