<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'obat';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nama_obat', 'barcode', 'golongan', 'merk', 'supplier', 'rak', 'diskon', 'satuan', 'isi', 'harga_pokok', 'harga_jual', 'status', 'kadaluarsa'];

    /*rules validasi*/
    public static $rules = [
    	// 'plu'=>'required',
    	'nama_obat'=>'required',
    	'barcode'=>'required|min:4',
    	'golongan'=>'required',
    	'merk'=>'required',
    	'supplier'=>'required',
    	'rak'=>'required', 
    	'diskon'=>'required', 
    	'satuan'=>'required',
    	// 'satuan_beli'=>'required', 
    	'isi'=>'required', 
    	'harga_pokok'=>'required', 
    	'harga_jual'=>'required',  
    	'status'=>'required',
        'kadaluarsa'=>'required'
    ];

    //relasi
    public function merk()
    {
        return $this->hasMany('App\Merk', 'id', 'merk');
    }

    public function supplier()
    {
        return $this->hasMany('App\Supplier', 'id', 'supplier');
    }

    public function golongan()
    {
        return $this->hasMany('App\Golongan', 'id', 'golongan');
    }

    public function rak()
    {
        return $this->hasMany('App\Rak', 'id', 'rak');
    }

    public function satuan()
    {
        return $this->hasMany('App\Satuan', 'id', 'satuan');
    }

    public function obathabis_merk()
    {
        return $this->belongsTo('App\Merk', 'merk', 'id');
    }

    public function obathabis_supplier()
    {
        return $this->belongsTo('App\Supplier', 'supplier', 'id');
    }

    // untuk print laporan
    public function merk1()
    {
        return $this->belongsTo('App\Merk', 'merk', 'id');
    }

    public function rak1()
    {
        return $this->belongsTo('App\Rak', 'rak', 'id');
    }

    public function golongan1()
    {
        return $this->belongsTo('App\Golongan', 'golongan', 'id');
    }

    public function satuan1()
    {
        return $this->belongsTo('App\Satuan', 'satuan', 'id');
    }
}
