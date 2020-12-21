<?php
/** @noinspection PhpUndefinedVariableInspection */

namespace App\Http\Controllers;

use App\Http\back\_Authorize;
use App\Models\Advisor;
use App\Models\Department;
use App\Models\Document;
use App\Models\Faculty;
use App\Models\Student;
use App\Models\Super;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function home() {
        $total_document = Document::all()->count();
        $total_active   = DB::table('advises')->distinct()->select('student_id')->count();
        $response->total_doc    = $total_document;
        $response->total_active = $total_active;

        return $response;
    }

    public function dashboard() {
        if (_Authorize::login()) {
            $auth = _Authorize::data();
            if (_Authorize::student()) {
                return Student::findOrCreate($auth->identity);
            }
            else if (_Authorize::advisor()) {
                return Advisor::findOrCreate($auth->identity);
            }
            else if (_Authorize::department()) {
                return Department::findOrCreate($auth->identity);
            }
            else if (_Authorize::faculty()) {
                return Faculty::findOrCreate($auth->identity);
            }
            else if (_Authorize::super()) {
                return Super::findOrCreate($auth->identity);
            }
            else {
                return null;
            }
        }
        return redirect()->route('home');
    }
}
