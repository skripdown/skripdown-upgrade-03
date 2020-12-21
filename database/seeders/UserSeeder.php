<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'identity'  => 'dev_1',
            'name'      => 'dev 1 name',
            'email'     => 'dev_1@skripmail.com',
            'password'  => Hash::make('dev1pass'),
            'pic'       => 'd1',
            'pic_color' => 'green',
            'role'      => 'developer',
        ]);
        DB::table('users')->insert([
            'identity'  => 'dev_2',
            'name'      => 'dev 2 name',
            'email'     => 'dev_2@skripmail.com',
            'password'  => Hash::make('dev2pass'),
            'pic'       => 'd2',
            'pic_color' => 'cyan',
            'role'      => 'developer',
        ]);
        DB::table('users')->insert([
            'identity'  => 'dev_3',
            'name'      => 'dev 3 name',
            'email'     => 'dev_3@skripmail.com',
            'password'  => Hash::make('dev3pass'),
            'pic'       => 'd3',
            'pic_color' => 'orange',
            'role'      => 'developer',
        ]);
    }
}
