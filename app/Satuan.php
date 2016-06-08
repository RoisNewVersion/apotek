<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Satuan extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'satuan';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nama_satuan'];

    /*rules validasi*/
    public static $rules = [
    	'nama_satuan'=>'required'
    ];

    /*relasi*/
    public function obat()
    {
        return $this->hasMany('App\Obat', 'satuan', 'id');
    }
}
