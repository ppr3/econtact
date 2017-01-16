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

use App\Commander;
use App\Subdivision;
use App\Division;
use App\Status;


class CommanderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

     public function index()
    {
    	$view = view('checkouttracking.commander.search');

        $userlogin = Auth::user();
        $division_id = $userlogin->division_id;
        $view->with('division_id',$division_id);

        $division= Division::divisionList();
        $view->with('division',$division);

        $status = Status::pluck('status_name', 'status_id');
        $view->with('status',$status);

        $view->with('page',is_null(request('page'))? 1 : request('page'));

        $commander = Commander::getSearch($division_id,request('status_id',$default = 1));
        
        $result = $commander;
        $paginate = env('PAGE_ITEM');
        $page = request('page');
        $offSet = ($page * $paginate) - $paginate;  
        $itemsForCurrentPage = array_slice($result, $offSet, $paginate, true);  
        $result = new \Illuminate\Pagination\LengthAwarePaginator($itemsForCurrentPage, count($result), $paginate, $page);
        $result = $result->setPath('commander');

        $view->with('commander',$result);

        //dd($result);
		return $view; 
    }

    public function create()
    {
        $view = view('checkouttracking.commander.create');

        $userlogin = Auth::user();
        $division_id = $userlogin->division_id;
        $view->with('division_id',$division_id);

        $division= Division::divisionList();
        $view->with('division',$division);

        $status = Status::pluck('status_name', 'status_id');
        $view->with('status',$status);

        return $view; 
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'rank_name' => 'required',
            'fname' => 'required',
            'lname' => 'required',
            'position_name' => 'required',
            'status_id' => 'required',
        ]);

        try{
            DB::beginTransaction();

            $commander = new Commander();

            $userlogin = Auth::user();
            $division_id = $userlogin->division_id;

            $commander->division_id = $division_id;
            $commander->rank_name = request('rank_name');
            $commander->fname = request('fname');
            $commander->lname = request('lname');
            $commander->position_name = request('position_name');
            $commander->status_id = request('status_id');

            $commander->save();

            DB::commit();
            return redirect()->route('commander.edit',$commander->getKey())
                                ->with('success', 'Successfully Inserted');;

        }catch(\Exception $e){
            DB::rollback();
            return redirect('commander.create')->with('error',$e->getMessage() );
        }
    }


    public function edit($id)
    {
        $view = view('checkouttracking.commander.edit');

        $commander = Commander::find($id);
        $view->with('commander',$commander);

        $userlogin = Auth::user();
        $division_id = $userlogin->division_id;
        $view->with('division_id',$division_id);

        $division= Division::divisionList();
        $view->with('division',$division);

        $status = Status::pluck('status_name', 'status_id');
        $view->with('status',$status);

        return $view; 
    }

    public function update($id,Request $request)
    {
        $this->validate($request, [
            'rank_name' => 'required',
            'fname' => 'required',
            'lname' => 'required',
            'position_name' => 'required',
            'status_id' => 'required',
        ]);

        try{
            DB::beginTransaction();

            $commander = Commander::find($id);

            $commander->rank_name = request('rank_name');
            $commander->fname = request('fname');
            $commander->lname = request('lname');
            $commander->position_name = request('position_name');
            $commander->status_id = request('status_id');

            $commander->update();

            DB::commit();
            return redirect()->route('commander.edit',$id)
                                ->with('success', 'Successfully Updated');;

        }catch(\Exception $e){
            DB::rollback();
            return redirect()->route('commander.edit',$id)->with('errors',$e->getMessage());
        }
    }
}
