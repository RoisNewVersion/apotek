<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rak extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rak';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nama_rak'];

    /*rules validasi*/
    public static $rules = [
    	'nama_rak'=>'required'
    ];

     /*relasi*/
    public function obat()
    {
        return $this->hasMany('App\Obat', 'rak', 'id');
    }
}
