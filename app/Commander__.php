<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Collection;

class Commander extends Model
{
    protected $table = 'commander';
	protected $primaryKey = 'commander_id';
	public $timestamps = false;

	public static function commanderList($division_id){

		return DB::table('vwcommander_list')
					->where('division_id', $division_id)
					->pluck('commander_name', 'commander_id')
					->prepend('','');
	}

	public static function commanderFullList($division_id){

		return DB::table('vwcommander_fulllist')
					->where('division_id', $division_id)
					->pluck('commander_name', 'commander_id')
					->prepend('','');
	}

	public static function getSearch($division_id,$status_id){

		return DB::select( 
							DB::raw("SELECT * FROM vwcommander_search WHERE division_id = :division_id  AND status_id = :status_id "), 
							array('division_id' => $division_id,'status_id'=> $status_id,
						));     	
     }

     public static function commanderReport($division_id,$date_start,$date_end){  
     	return DB::select('EXEC SPTRACKING_REPORT ?,?,? ',array($division_id,$date_start,$date_end,));
     }

}
