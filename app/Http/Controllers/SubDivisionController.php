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

use App\Subdivision;

class SubDivisionController extends Controller
{
    public function index()
    {
    	$view = view('econtact.subdivision.search');

        $view->with('page',is_null(request('page'))? 1 : request('page'));

        $subdivision = Subdivision::getSearch();
        
        $result = $subdivision;
        $paginate = env('PAGE_ITEM');
        $page = request('page');
        $offSet = ($page * $paginate) - $paginate;  
        $itemsForCurrentPage = array_slice($result, $offSet, $paginate, true);  
        $result = new \Illuminate\Pagination\LengthAwarePaginator($itemsForCurrentPage, count($result), $paginate, $page);
        $result = $result->setPath('subdivision');

        $view->with('subdivision',$result);

        //dd($result);
		return $view; 
    }
}
