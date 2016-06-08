<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'transaksi';
    // public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['obat_id', 'jumlah', 'harga', 'total_harga', 'diskon', 'untung', 'status', 'user_id'];

    /*rules validasi*/
    public static $rules = [
    		'obat_id'=>'required',
    		'jumlah'=>'required',
    		'harga'=>'required',
    		'total_harga'=>'required',
    		'diskon'=>'required',
    		'untung'=>'required',
    		'status'=>'required',
            'user_id'=>'required'
    		];

    /*relasi*/
    public function obat()
    {
        return $this->hasMany('App\Obat', 'id', 'obat_id');
    }

    public function obit()
    {
        return $this->belongsTo('App\Obat', 'obat_id', 'id');
    }

    public function relasi_user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
