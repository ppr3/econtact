<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
//use Illuminate\Support\Collection;

class Tracking extends Model
{
    protected $table = 'tracking';
	protected $primaryKey = 'tracking_id';
	public $timestamps = false;

	public static function getSearch($division_id,$command_id,$subdivision_id){
  
        //return DB::select('EXEC SPTRACKING_SEARCH');
        $page_item = env('PAGE_ITEM');
        return DB::table('vwtracking_search')
            ->where(function($query) use ($division_id,$command_id,$subdivision_id) {
                    if(!empty($division_id)){
                         $query->where('vwtracking_search.division_id',$division_id);
                    }
                    if(!empty($command_id)){
                         $query->where('vwtracking_search.command_id',$command_id);
                    }
                    if(!empty($subdivision_id)){
                         $query->where('vwtracking_search.subdivision_id',$subdivision_id );
                    }
                })
            ->paginate($page_item);  
     }  

     public static function getReportAdmin($date_start,$date_end){
        return DB::select('EXEC SPTRACKING_REPORT_ADMIN ?,? ',array($date_start,$date_end));
     }

    public static function getReport($division_id,$date_start,$date_end){
        return DB::select('EXEC SPTRACKING_REPORT ?,?,? ',array($division_id,$date_start,$date_end));
     }
}
