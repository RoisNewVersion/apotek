<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Merk extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'merk';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nama_merk'];

    /*rules validasi*/
    public static $rules = [
    	'nama_merk'=>'required'
    ];

     /*relasi*/
    public function obat()
    {
        return $this->hasMany('App\Obat', 'merk', 'id');
    }
}
