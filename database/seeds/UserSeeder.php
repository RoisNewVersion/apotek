<?php

use Illuminate\Database\Seeder;
use App\User;
// use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('users')->truncate();

        // User::create([
        //     'name' => 'roisul',
        //     'email' => 'saya@gmail.com',
        //     'password' => bcrypt('roisul'),
        // ]);

        // $admin = User::create([
        //     'name' => 'Admin Apotek',
        //     'email' => 'adminapotek@gmail.com',
        //     'password' => bcrypt('adminapotek'),
        // ]);

        // $admin->assignRole('admin');

        // //apoteker1
        // $apoteker1 = User::create([
        //     'name' => 'Apoteker 1',
        //     'email' => 'apotek1@gmail.com',
        //     'password' => bcrypt('apoteker1'),
        // ]);

        // $apoteker1->assignRole('apoteker');

        // apoteker2
        $apoteker2 = User::create([
            'name' => 'Admin 2',
            'email' => 'apotek2@gmail.com',
            'password' => bcrypt('apoteker2'),
        ]);

        $apoteker2->assignRole('admin');
    }
}
