<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;

class UangLaci extends Model {

	protected $table = 'uanglaci';

	protected $fillable = ['nominal'];

	public static $rules = ['nominal'=>'required|integer'];

}
