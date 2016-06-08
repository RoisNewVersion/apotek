<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'supplier';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nama_supl', 'alamat', 'hp'];

    /*rules validasi*/
    public static $rules = [
    	'nama_supl'=>'required',
        'alamat'=>'required',
        'hp'=>'required'
    ];

     /*relasi*/
    public function obat()
    {
        return $this->hasMany('App\Obat', 'supplier', 'id');
    }
}
