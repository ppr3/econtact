<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Staff extends Model
{
    protected $table = 'staff';
	protected $primaryKey = 'staff_id';
	public $timestamps = false;

	public static function getSearch(){

		return DB::select( 
							DB::raw("SELECT * FROM vwstaff_search")
						 );     	
     }
}
