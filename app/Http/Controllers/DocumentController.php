<?php
/** @noinspection PhpPossiblePolymorphicInvocationInspection */

namespace App\Http\Controllers;

use App\Http\back\_Authorize;
use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function documents() {
        if (!_Authorize::login()) {
            return view('login');
        }
        else {
            if (_Authorize::developer()) {
                $data = Document::all();
            }
            else {
                if (_Authorize::super()) {
                    $data = _Authorize::data()->super()->first()->documents()->get();
                }
                elseif (_Authorize::faculty()) {
                    $data = _Authorize::data()->faculty()->first()->documents()->get();
                }
                elseif (_Authorize::department()) {
                    $data = _Authorize::data()->department()->first()->documents()->get();
                }
                elseif (_Authorize::advisor()) {
                    $advises = _Authorize::data()->advisor()->first()->advisor()->get();
                    $data = array();
                    foreach ($advises as $advise) {
                        $data = array_push($data, $advise->document()->first());
                    }
                }
                else {
                    $data = _Authorize::data()->student()->first()->document()->first();
                }
            }

            return $data;
        }
    }
}
