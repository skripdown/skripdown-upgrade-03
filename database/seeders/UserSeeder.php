<?php

namespace Database\Seeders;

use App\Http\back\_Image;
use App\Models\Developer;
use App\Models\User;
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
        $usr1 = new User([
            'identity'  => 'dev_1',
            'name'      => 'dev 1 name',
            'email'     => 'dev_1@skripmail.com',
            'password'  => Hash::make('dev1pass'),
            'has_pic'   => true,
            'pic'       => _Image::setDefaultProfile('Ce Eo','dev_1','developer',true),
            'role'      => 'developer',
        ]);
        $usr1->save();
        $usr1->developer()->save(new Developer(['role' => 'CEO']));

        $usr2 = new User([
            'identity'  => 'dev_2',
            'name'      => 'dev 2 name',
            'email'     => 'dev_2@skripmail.com',
            'password'  => Hash::make('dev2pass'),
            'pic'       => _Image::setDefaultProfile('Human Res','dev_2','developer',true),
            'role'      => 'developer',
        ]);
        $usr2->save();
        $usr2->developer()->save(new Developer(['role' => 'HR']));

        $usr3 = new User([
            'identity'  => 'dev_3',
            'name'      => 'dev 3 name',
            'email'     => 'dev_3@skripmail.com',
            'password'  => Hash::make('dev3pass'),
            'pic'       => _Image::setDefaultProfile('Admin Strator','dev_3','developer',true),
            'role'      => 'developer',
        ]);
        $usr3->save();
        $usr3->developer()->save(new Developer(['role' => 'admin']));
    }
}
