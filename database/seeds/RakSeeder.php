<?php

use Illuminate\Database\Seeder;
use App\Rak;

class RakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rak::create([
    			'nama_rak'=>'RAK 1'
    		]);
    }
}
