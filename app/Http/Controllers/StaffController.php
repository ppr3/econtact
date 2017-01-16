<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Database\QueryException as QueryException;
use Illuminate\Database\ErrorException as ErrorException;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Pagination\Paginator;

use App\Staff;

class StaffController extends Controller
{
    public function index()
    {
    	$view = view('econtact.staff.search');

        $view->with('page',is_null(request('page'))? 1 : request('page'));

        //$commander = Commander::getSearch($division_id,request('status_id',$default = 1));
        $staff = Staff::getSearch();
        
        $result = $staff;
        $paginate = env('PAGE_ITEM');
        $page = request('page');
        $offSet = ($page * $paginate) - $paginate;  
        $itemsForCurrentPage = array_slice($result, $offSet, $paginate, true);  
        $result = new \Illuminate\Pagination\LengthAwarePaginator($itemsForCurrentPage, count($result), $paginate, $page);
        $result = $result->setPath('staff');

        $view->with('staff',$result);

        //dd($result);
		return $view; 
    }
}
