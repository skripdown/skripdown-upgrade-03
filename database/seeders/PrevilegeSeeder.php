<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrevilegeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('previleges')->insert([
            'name' => 'free',
            'price' => 0,
            'quota_faculty' => 2,
            'quota_department' => 2,
            'quota_advisor' => 10,
            'quota_student' => 20,
            'quota_document' => 100,
            'quota_template' => 1,
        ]);
        DB::table('previleges')->insert([
            'name' => 'start',
            'price' => 25,
            'quota_faculty' => 5,
            'quota_department' => 10,
            'quota_advisor' => 20,
            'quota_student' => 40,
            'quota_document' => 1000,
            'quota_template' => 3,
        ]);
        DB::table('previleges')->insert([
            'name' => 'academy',
            'price' => 100,
            'quota_faculty' => 10,
            'quota_department' => 20,
            'quota_advisor' => 40,
            'quota_student' => 60,
            'quota_document' => 10000,
            'quota_template' => 10,
        ]);
        DB::table('previleges')->insert([
            'name' => 'institute',
            'price' => 200,
            'quota_faculty' => 20,
            'quota_department' => 40,
            'quota_advisor' => 100,
            'quota_student' => 500,
            'quota_document' => 99999999,
            'quota_template' => 99999999,
        ]);
        DB::table('previleges')->insert([
            'name' => 'university',
            'price' => 350,
            'quota_faculty' => 40,
            'quota_department' => 100,
            'quota_advisor' => 99999999,
            'quota_student' => 99999999,
            'quota_document' => 99999999,
            'quota_template' => 99999999,
        ]);
        DB::table('previleges')->insert([
            'name' => 'all',
            'price' => 400,
            'quota_faculty' => 99999999,
            'quota_department' => 99999999,
            'quota_advisor' => 99999999,
            'quota_student' => 99999999,
            'quota_document' => 99999999,
            'quota_template' => 99999999,
        ]);

    }
}
