<?php

use Illuminate\Database\Seeder;
use App\Golongan;

class GolonganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	Golongan::create([
    			'nama_gol'=>'OBAT DALAM'
    		]);

    }
}
