<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Set default controller

Route::group(
	
	array('before'  => 'auth'), function(){
	
		Route::get('/home/dashboard', function()
		{
			$objNav = new Navigation;
			// $nav = Navigation::where('parent_id',0)->get();
			$nav = $objNav->getParent();
			//return Redirect::intended('/user');
			return View::make('home.dashboard' ,['nav' => $nav]);
		});
		Route::resource('/layouts', 'NavigationController');
		Route::resource('/admin/manage_modules', 'ModulesController');
		// Route manage_roles view to Role Controller
		Route::resource('/admin/manage_roles', 'RolesController');
		// Route manage_user view to User Controller
		Route::resource('/admin/manage_user', 'UserController');

		Route::resource('/admin/generate_report', 'GenerateReportController');
		
		Route::resource('reservation', 'ReservationController');
		
		//Route::resource('/admin/manage_user_access', 'RolesController@access');
		
		//Route::get('logout', 'HomeController@getLogout')->after('invalidate-browser-cache');
	}
);

Route::controller('/', 'HomeController');