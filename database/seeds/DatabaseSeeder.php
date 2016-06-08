<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call('UserTableSeeder');
        // $this->call('ObatSeeder');
        $this->call('UserSeeder');
        // $this->call('GolonganSeeder');
        // $this->call('MerkSeeder');
        // $this->call('RakSeeder');
        // $this->call('SatuanSeeder');
        // $this->call('SupplierSeeder');
        // $this->call('ObatSeeder');
        // $this->call('Roles_seeder');
        
        Model::reguard();
    }
}
