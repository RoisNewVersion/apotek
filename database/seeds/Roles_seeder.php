<?php

use Illuminate\Database\Seeder;
use DB;
use App\Roles;

class Roles_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (App::environment() === 'production') {
            exit('I just stopped you getting fired. Love, Amo.');
        }

        DB::table('role')->truncate();

        Roles::create([
            'id'            => 1,
            'name'          => 'Admin',
            'description'   => 'Admin bisa melakukan apa saja.'
        ]);
        
        Roles::create([
            'id'            => 2,
            'name'          => 'Apoteker',
            'description'   => 'Apoteker hanya bisa melakukan hal terbatas.'
        ]);
    }
}
