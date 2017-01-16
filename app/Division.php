<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Division extends Model
{
    protected $table = 'division';
	protected $primaryKey = 'division_id';
	public $timestamps = false;

/*
	public static function divisionList(){

		return DB::table('vwdivision_list')->pluck('division_name', 'division_id');
	}
	*/

	public static function getSearch(){

		return DB::select( 
							DB::raw("SELECT * FROM vwdivision_search")
						 );     	
     }
}
