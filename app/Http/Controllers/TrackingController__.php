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

use App\Tracking;
use App\Commander;
use App\Subdivision;
use App\Division;

class TrackingController extends Controller
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
    	$view = view('checkouttracking.tracking.search');

        $userlogin = Auth::user();
        $division_id = $userlogin->division_id;
        $view->with('division_id',$division_id);

    	$tracking = Tracking::getSearch($division_id,
                                        request('command_id'),
                                        request('subdivision_id'));
    	$view->with('tracking',$tracking);

    	$commander= Commander::commanderList($division_id);
 		$view->with('commander',$commander);

        $division= Division::divisionList();
        $view->with('division',$division);

 		$subdivision= Subdivision::subdivisionList($division_id);
 		$view->with('subdivision',$subdivision);

 		$view->with('page',is_null(request('page'))? 1 : request('page'));

		return $view; 
    }

    public function create()
    {
        $view = view('checkouttracking.tracking.create');

        $userlogin = Auth::user();
        $division_id = $userlogin->division_id;
        $view->with('division_id',$division_id);

        $division= Division::divisionList();
        $view->with('division',$division);

        $subdivision= Subdivision::subdivisionList($division_id);
        $view->with('subdivision',$subdivision);

        $commander= Commander::commanderFullList($division_id);
        $view->with('commander',$commander);

		return $view; 
    }

    public function store(Request $request)
    {
        //dd($request);
        $this->validate($request, [
            'tracking_time' => 'required',
            'command_id' => 'required',
            'subdivision_id' => 'required',
        ]);

		try{
		    DB::beginTransaction();

		    $tracking = new Tracking();

            $strdate = request('day').'-'.request('mount').'-'.date('Y');
            $tracking->tracking_date = date_create($strdate);
			$tracking->tracking_time = request('tracking_time',$default = null);
            $tracking->division_id = Auth::user()->division_id;
            $tracking->command_id = request('command_id');
            $tracking->subdivision_id = request('subdivision_id');
            $tracking->pointofservice = request('pointofservice');
            $tracking->tracking_issue = request('tracking_issue');
            $tracking->command_issue = request('command_issue');
            $tracking->create_date = date("Y-m-d H:i:s");
            $tracking->create_by = Auth::user()->id;

			$tracking->save();

			DB::commit();
			return redirect()->route('tracking.edit',$tracking->getKey())
								->with('success', 'Successfully Inserted');;

		}catch(\Exception $e){
		    DB::rollback();
		    return redirect('tracking.create')->with('error',$e->getMessage() );
		}
    }

    public function edit($id)
    {
        $view = view('checkouttracking.tracking.edit');

        $tracking = Tracking::find($id);
        $view->with('tracking',$tracking);

        $tracking_date= date_create($tracking->tracking_date);
        $view->with('tracking_date',$tracking_date);

        $division_id = $tracking->division_id;
        $view->with('division_id',$division_id);

        $division= Division::divisionList();
        $view->with('division',$division);

        $subdivision= Subdivision::subdivisionList($division_id);
        $view->with('subdivision',$subdivision);

        $commander= Commander::commanderFullList($division_id);
        $view->with('commander',$commander);
    
        return $view; 
    }

    public function update($id,Request $request)
    {
        $this->validate($request, [
            'tracking_time' => 'required',
            'command_id' => 'required',
            'subdivision_id' => 'required',
        ]);

        //dd($request);
        try{
            DB::beginTransaction();

            $tracking = Tracking::find($id);

            $strdate = request('day').'-'.request('mount').'-'.date('Y');
            $tracking->tracking_date = date_create($strdate);
            $tracking->tracking_time = request('tracking_time');
            $tracking->division_id = Auth::user()->division_id;
            $tracking->command_id = request('command_id');
            $tracking->subdivision_id = request('subdivision_id');
            $tracking->pointofservice = request('pointofservice');
            $tracking->tracking_issue = request('tracking_issue');
            $tracking->command_issue = request('command_issue');
            $tracking->update_date = date("Y-m-d H:i:s");
            $tracking->update_by = Auth::user()->id;

            $tracking->update();

            DB::commit();
            return redirect()->route('tracking.edit',$tracking->getKey())
                                ->with('success', 'Successfully Updated');;

        }catch(\Exception $e){
            DB::rollback();
            return redirect()->route('tracking.edit',$tracking->getKey())
                                ->with('error',$e->getMessage() );
        }
    }
}
