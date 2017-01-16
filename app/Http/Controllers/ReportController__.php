<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Subdivision;
use App\Division;
use App\Tracking;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
//use Illuminate\Database\Eloquent\Collection;
use Excel;
use App\Helper;
use \Lang;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$view = view('checkouttracking.report.mouth_export');

        $userlogin = Auth::user();
        $division_id = $userlogin->division_id;
        $view->with('division_id',$division_id);

        $division= Division::divisionList();
        $view->with('division',$division);

        $report = [];

		try{
        	//$date_st = date_format(date_create(date("Y").'/'.request('mount_st').'/'.request('day_st')),"Ymd");
          $date_st = request('year_st').request('mount_st').request('day_st');

        	$view->with('day_st',request('day_st'));
        	$view->with('mount_st',request('mount_st'));
            $view->with('year_st',request('year_st'));

        	//$date_en = date_format(date_create(date("Y").'/'.request('mount_en').'/'.request('day_en')),"Ymd");
          $date_en = request('year_en').request('mount_en').request('day_en');

        	$view->with('day_en',request('day_en'));
        	$view->with('mount_en',request('mount_en'));
            $view->with('year_en',request('year_en'));
       
        	$report = Tracking::getReport($division_id,$date_st,$date_en);

        }catch(\Exception $e){
    		   $report = []; 
    		   //$view->with('date_st',date("Ym")."01");
    		   //$view->with('date_en',date("Ymt",strtotime(date("Ym"))));

    		   $view->with('day_st',"01");
           $view->with('mount_st',date("m"));
           $view->with('year_st',date('Y'));

           $view->with('day_en',date('d'));
           $view->with('mount_en',date('m'));
           $view->with('year_en',date('Y'));
		}
	

        $view->with('report',$report);

		return $view; 
    }

    public function admin1()
    {
        //dd(Helper::dayslist());
        $view = view('checkouttracking.report.mouth_export_admin');

        $division_id = request('division_id');
        $view->with('division_id',$division_id);

        $division= Division::divisionList();
        $view->with('division',$division);

        $report = [];

        try{
            //$date_st = date_format(date_create(date("Y").'/'.request('mount_st').'/'.request('day_st')),"Ymd");
            $date_st = request('year_st').request('mount_st').request('day_st');

            $view->with('day_st',request('day_st'));
            $view->with('mount_st',request('mount_st'));
            $view->with('year_st',request('year_st'));

           // $date_en = date_format(date_create(date("Y").'/'.request('mount_en').'/'.request('day_en')),"Ymd");
            $date_en = request('year_en').request('mount_en').request('day_en');

            $view->with('day_en',request('day_en'));
            $view->with('mount_en',request('mount_en'));
            $view->with('year_en',request('year_en'));
       
            $report = Tracking::getReport($division_id,$date_st,$date_en);

        }catch(\Exception $e){
           $report = []; 
           $view->with('day_st',"01");
           $view->with('mount_st',date("m"));
           $view->with('year_st',date('Y'));

           $view->with('day_en',date('d'));
           $view->with('mount_en',date('m'));
           $view->with('year_en',date('Y'));
        }
    

        $view->with('report',$report);

        return $view; 
    }

    public function admin2()
    {
        $view = view('checkouttracking.report.mouth_export_admin_all');

        $report = [];

        try{
            $date_st = request('year_st').request('mount_st').request('day_st');
            $view->with('day_st',request('day_st'));
            $view->with('mount_st',request('mount_st'));
            $view->with('year_st',request('year_st'));

            $date_en = request('year_en').request('mount_en').request('day_en');
            $view->with('day_en',request('day_en'));
            $view->with('mount_en',request('mount_en'));
            $view->with('year_en',request('year_en'));
       
            $report = Tracking::getReportAdmin($date_st,$date_en);

        }catch(\Exception $e){
           $report = []; 
           //$view->with('date_st',date("Ym")."01");
          // $view->with('date_en',date("Ymt",strtotime(date("Ym"))));

           $view->with('day_st',"01");
           $view->with('mount_st',date("m"));
           $view->with('year_st',date('Y'));

           $view->with('day_en',date('d'));
           $view->with('mount_en',date('m'));
           $view->with('year_en',date('Y'));
        }
    

        $view->with('report',$report);

        return $view; 
    }

    public function excelexport($division,$dst,$den)
    {
        //dd($division);
        $data = [];
        try{
            $temp = Tracking::getReport($division,$dst,$den);
            foreach ($temp as $key => $item) {
                $data[] = array( Lang::get('commander.rank_name') => $item->rank_name,
                                 Lang::get('commander.fname')=> $item->fname,
                                 Lang::get('commander.lname')=> $item->lname ,
                                 Lang::get('commander.position_name')=> $item->position_name,
                                 Lang::get('commander.numof_tracking') => $item->numof_tracking
                                );
            }

        }catch(\Exception $e){
           $data = array(
                array('Error Massage', $e->getMessage())
            );
        }
      
        Excel::create('Filename', function($excel) use($data) {
            $excel->sheet('Sheetname', function($sheet) use($data) {
                $sheet->fromArray($data);
            });

        })->export('xls');
    
        return back();
    }

    public function excelexportadmin($dst,$den){

      //dd($division);
        $data = [];
        try{
            $temp = Tracking::getReportAdmin($dst,$den);
            foreach ($temp as $key => $item) {
                $data[] = array( Lang::get('commander.rank_name') => $item->rank_name,
                                 Lang::get('commander.fname')=> $item->fname,
                                 Lang::get('commander.lname')=> $item->lname ,
                                 Lang::get('commander.division_name')=> $item->division_name ,
                                 Lang::get('commander.position_name')=> $item->position_name,
                                 Lang::get('commander.numof_tracking') => $item->numof_tracking
                                );
            }

        }catch(\Exception $e){
           $data = array(
                array('Error Massage', $e->getMessage())
            );
        }
      
        Excel::create('Filename', function($excel) use($data) {
            $excel->sheet('Sheetname', function($sheet) use($data) {
                $sheet->fromArray($data);
            });

        })->export('xls');
    
        return back();
    }

}
