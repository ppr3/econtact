<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


//Route::get('/', 'HomeController@index');
Route::get('/', 'SubDivisionController@index');


Route::group(array('prefix' => 'division'), function()
{
	//Search
	Route::get('/', array('as' => 'division', 'uses' => 'DivisionController@index'));
	Route::post('/', array('as' => 'division', 'uses' => 'DivisionController@index'));

	//Create
	Route::get('create', array('as' => 'division.create', 'uses' => 'DivisionController@create'));
	Route::post('store', array('as' => 'division.store', 'uses' => 'DivisionController@store'));

	//Update
	Route::get('edit/{id}', array('as' => 'division.edit', 'uses' => 'DivisionController@edit'));
	Route::post('update/{id}', array('as' => 'division.update', 'uses' => 'DivisionController@update'));
});

Route::group(array('prefix' => 'subdivision'), function()
{
	//Search
	Route::get('/', array('as' => 'subdivision', 'uses' => 'SubDivisionController@index'));
	Route::post('/', array('as' => 'subdivision', 'uses' => 'SubDivisionController@index'));

	//Create
	Route::get('create', array('as' => 'subdivision.create', 'uses' => 'SubDivisionController@create'));
	Route::post('store', array('as' => 'subdivision.store', 'uses' => 'SubDivisionController@store'));

	//Update
	Route::get('edit/{id}', array('as' => 'subdivision.edit', 'uses' => 'SubDivisionController@edit'));
	Route::post('update/{id}', array('as' => 'subdivision.update', 'uses' => 'SubDivisionController@update'));
});

Route::group(array('prefix' => 'staff'), function()
{
	//Search
	Route::get('/', array('as' => 'staff', 'uses' => 'StaffController@index'));
	Route::post('/', array('as' => 'staff', 'uses' => 'StaffController@index'));

	//Create
	Route::get('create', array('as' => 'staff.create', 'uses' => 'StaffController@create'));
	Route::post('store', array('as' => 'staff.store', 'uses' => 'StaffController@store'));

	//Update
	Route::get('edit/{id}', array('as' => 'staff.edit', 'uses' => 'StaffController@edit'));
	Route::post('update/{id}', array('as' => 'staff.update', 'uses' => 'StaffController@update'));
});


Route::group(array('prefix' => 'user'), function()
{
	//Search
	Route::get('/', array('as' => 'user', 'uses' => 'UserController@index'));
	Route::post('/', array('as' => 'user', 'uses' => 'UserController@index'));

	//Create
	Route::get('create', array('as' => 'user.create', 'uses' => 'UserController@create'));
	Route::post('store', array('as' => 'user.store', 'uses' => 'UserController@store'));

	//Update
	Route::get('edit/{id}', array('as' => 'user.edit', 'uses' => 'UserController@edit'));
	Route::post('update/{id}', array('as' => 'user.update', 'uses' => 'UserController@update'));

	//Update password
	Route::get('editpass/{id}', array('as' => 'user.editpass', 'uses' => 'UserController@editpass'));
	Route::post('updatepass/{id}', array('as' => 'user.updatepass', 'uses' => 'UserController@updatepass'));
});

/*
Route::group(array('prefix' => 'commander'), function()
{
	//Search
	Route::get('/', array('as' => 'commander', 'uses' => 'CommanderController@index'));
	Route::post('/', array('as' => 'commander', 'uses' => 'CommanderController@index'));

	//Create
	Route::get('create', array('as' => 'commander.create', 'uses' => 'CommanderController@create'));
	Route::post('store', array('as' => 'commander.store', 'uses' => 'CommanderController@store'));

	//Update
	Route::get('edit/{id}', array('as' => 'commander.edit', 'uses' => 'CommanderController@edit'));
	Route::post('update/{id}', array('as' => 'commander.update', 'uses' => 'CommanderController@update'));
});
*/
/*
Route::group(array('prefix' => 'report'), function()
{
	Route::get('/', array('as' => 'report.mouth', 'uses' => 'ReportController@index'));
	Route::post('/', array('as' => 'report.mouth', 'uses' => 'ReportController@index'));

	Route::get('admin1', array('as' => 'report.mouth.admin1', 'uses' => 'ReportController@admin1'));
	Route::post('admin1', array('as' => 'report.mouth.admin1', 'uses' => 'ReportController@admin1'));

	Route::get('admin2', array('as' => 'report.mouth.admin2', 'uses' => 'ReportController@admin2'));
	Route::post('admin2', array('as' => 'report.mouth.admin2', 'uses' => 'ReportController@admin2'));

	Route::get('export/{division}/{dst}/{den}', array('as' => 'report.excelexport', 'uses' => 'ReportController@excelexport'));
	Route::get('exportadmin/{dst}/{den}', array('as' => 'report.excelexport.admin', 'uses' => 'ReportController@excelexportadmin'));
});
*/
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');


///////////////////////////////////////////////////////////////////////////////////////
//$s = 'public.';
//Route::get('/',         ['as' => $s . 'home',   'uses' => 'PagesController@getHome']);

$s = 'social.';
Route::get('/social/redirect/{provider}',   ['as' => $s . 'redirect',   'uses' => 'Auth\SocialController@getSocialRedirect']);
Route::get('/social/handle/{provider}',     ['as' => $s . 'handle',     'uses' => 'Auth\SocialController@getSocialHandle']);

Route::group(['prefix' => 'admin', 'middleware' => 'auth:administrator'], function()
{
    $a = 'admin.';
    Route::get('/', ['as' => $a . 'home', 'uses' => 'AdminController@getHome']);

});

Route::group(['prefix' => 'user', 'middleware' => 'auth:user'], function()
{
    $a = 'user.';
    Route::get('/', ['as' => $a . 'home', 'uses' => 'UserController@getHome']);

    Route::group(['middleware' => 'activated'], function ()
    {
        $m = 'activated.';
        Route::get('protected', ['as' => $m . 'protected', 'uses' => 'UserController@getProtected']);
    });

});

Route::group(['middleware' => 'auth:all'], function()
{
    $a = 'authenticated.';
    Route::get('/logout', ['as' => $a . 'logout', 'uses' => 'Auth\LoginController@logout']);
    Route::get('/activate/{token}', ['as' => $a . 'activate', 'uses' => 'ActivateController@activate']);
    Route::get('/activate', ['as' => $a . 'activation-resend', 'uses' => 'ActivateController@resend']);
    Route::get('not-activated', ['as' => 'not-activated', 'uses' => function () {
        return view('errors.not-activated');
    }]);
});

Auth::routes(['login' => 'auth.login']);
