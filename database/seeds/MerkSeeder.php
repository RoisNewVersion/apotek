<?php

use Illuminate\Database\Seeder;
use App\Merk;
class MerkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Merk::create([
    			'nama_merk'=>'FARMA'
    		]);
    }
}
