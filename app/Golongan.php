<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Golongan extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'golongan';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nama_gol'];

    /*rules validasi*/
    public static $rules = [
    	'nama_gol'=>'required'
   	];

    /*relasi param(nama_class, field fk, field pk)*/
    public function obat()
    {
        return $this->hasMany('App\Obat', 'golongan', 'id');
    }
}
