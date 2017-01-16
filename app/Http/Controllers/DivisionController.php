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

use App\Division;


class DivisionController extends Controller
{

	public function index()
    {
	    $view = view('econtact.division.search');

	    $view->with('page',is_null(request('page'))? 1 : request('page'));

	    $division = Division::getSearch();
	    
	    $result = $division;
	    $paginate = env('PAGE_ITEM');
	    $page = request('page');
	    $offSet = ($page * $paginate) - $paginate;  
	    $itemsForCurrentPage = array_slice($result, $offSet, $paginate, true);  
	    $result = new \Illuminate\Pagination\LengthAwarePaginator($itemsForCurrentPage, count($result), $paginate, $page);
	    $result = $result->setPath('division');

	    $view->with('division',$result);

		return $view; 
	}
   
}
