<?php

namespace App\Http\Controllers;

use App\Http\back\_Analyzer;
use Illuminate\Http\Request;
use App\Http\back\_Authorize;

class StudentController extends Controller
{
    public function save_doc(Request $request) {
        if (_Authorize::student())
            return response()->json(array('document'=>_Analyzer::analyze_doc($request->document)));
        return response()->json(array('auth'=>'authorization error!'));
    }
}
