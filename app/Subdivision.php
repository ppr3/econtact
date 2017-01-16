<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Subdivision extends Model
{
    protected $table = 'subdivision';
	protected $primaryKey = 'subdivision_id';
	public $timestamps = false;

/*
	public static function subdivisionList($division_id){

		return DB::table('vwsubdivision_list')->where('division_id', $division_id)
					->pluck('subdivision_name', 'subdivision_id')
					->prepend('','');
	}
*/
	public static function getSearch(){

		return DB::select( 
							DB::raw("SELECT * FROM vwsubdivision_search")
						 );     	
    }
}
