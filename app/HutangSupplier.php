<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HutangSupplier extends Model
{
    protected $table = 'hutang_supplier';

    protected $fillable = ['no_faktur', 'supplier_id', 'tgl_datang', 'tempo', 'jml_hutang', 'status'];

    public static $rules = [
    		'no_faktur'=>'required',
    		'supplier_id'=>'required',
            'tgl_datang'=>'required',
    		'tempo'=>'required',
    		'jml_hutang'=>'required',
    		'status'=>'required'
    		];

    public function supplier()
    {
    	return $this->belongsTo('App\Supplier', 'supplier_id', 'id');
    } 

}
