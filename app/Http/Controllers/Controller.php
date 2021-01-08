<?php
/** @noinspection PhpUndefinedVariableInspection */

namespace App\Http\Controllers;

use App\Http\back\_Authorize;
use App\Models\Advisor;
use App\Models\Department;
use App\Models\Developer;
use App\Models\Document;
use App\Models\Faculty;
use App\Models\Order;
use App\Models\Previlege;
use App\Models\Student;
use App\Models\Super;
use App\Models\Token;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function home() {
        $total_document = Document::all()->count();
        $total_active   = DB::table('advises')->distinct()->select('student_id')->count();
        $previleges     = DB::table('previleges')->get();
        $response       = (object) null;
        $response->total_doc    = $total_document;
        $response->total_active = $total_active;
        $response->previleges   = $previleges;
        if (_Authorize::super()) {
            $response->super    = Auth::user();
        }


        return view('welcome',compact('response'));
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
                $data = Super::findOrCreate($auth->identity);
                return view('client.super.dashboard_super',compact('data'));
            }
            else if (_Authorize::developer()) {
                $dev = Developer::findOrCreate($auth->identity);
                if (_Authorize::developer('admin')) {
                    $orders = Order::all();
                    $res    = (object) null;
                    $res->dev    = $dev;
                    $res->orders = $orders;
                    return view('developer.dev.admin-order',compact('res'));
                }
                elseif (_Authorize::developer('data_scientist')) {
                    return view('developer.dev.data_scientist-data');
                }
                elseif (_Authorize::developer('HR')) {
                    return view('developer.dev.hr-staff');
                }
                elseif (_Authorize::developer('CEO')) {
                    return view('developer.dev.ceo-project');
                }
            }
            else {
                return null;
            }
        }
        return redirect()->route('home');
    }

    public function register($id) {
        if (!_Authorize::login()) {
            if (Previlege::all()->count() < $id)
                return 'ERROR!';
            $plan = Previlege::all()->where('id',$id)->first();
            $plan->token = Token::make();
            return view('client.register', compact('plan'));
        }
        return 'ERROR!';
    }
}
