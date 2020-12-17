<?php
/** @noinspection PhpUndefinedVariableInspection */

namespace App\Http\back;


use App\Models\Document;
use Illuminate\Support\Facades\DB;

class _Data
{

    public static function resp_home() {
        $total_document = Document::all()->count();
        $total_active   = DB::table('advises')->distinct()->select('student_id')->count();
        $response->total_doc    = $total_document;
        $response->total_active = $total_active;

        return $response;
    }
}
