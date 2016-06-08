<?php

use Illuminate\Database\Seeder;
use App\Obat;

class ObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Obat::create([
        		// 'plu'=>123456789,
        		'nama_obat'=>'Sariawan',
        		'barcode'=>'123456',
        		'golongan'=>1,
        		'merk'=>1,
        		'supplier'=>1,
        		'rak'=>1,
        		'diskon'=>10,
        		'satuan'=>1,
        		// 'satuan_beli'=>1,
        		'isi'=>10,
        		'harga_pokok'=>5000,
                'harga_jual'=>5000,
        		// 'harga_nr'=>5500,
        		// 'harga_rsp'=>4500,
        		// 'harga_kh'=>4000,
        		'status'=>'J',
                'kadaluarsa'=>'2015/12/15'
        	]);
    }
}
