<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.2/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Commander;
use App\Helper;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
       // dd();
        //$view = view('home');

        //$userlogin = Auth::user();
        //$division_id = $userlogin->division_id;
        //$view->with('division_id',"1");

        /*$commander = Commander::commanderReport($division_id,
                                                date("Ym")."01",date("Ymt", 
                                                strtotime(date("Ym")))); */

        //$view->with('commander',$commander);
        //$view->with('reportmonth',Helper::monthslist()[date("m")]);
    
        //return $view;
    }

    public function landing()
    {
        $view = view('welcome');    
        return $view;
    }
}