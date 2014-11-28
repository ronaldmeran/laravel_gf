<?php

class ModulesController extends \BaseController {
	public function __construct()
    {
        $this->beforeFilter('auth');
    }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$app_modules = Modules::paginate(5);
		$objNav = new Navigation;
        $nav = $objNav->getParent();
		$arData = array(
			'app_module' => $app_modules,
			'nav' => $nav
			);

		// print '<pre>'.print_r($app_modules,true).'</pre>';
		// exit;
		return View::make('admin.manage_modules.index', $arData);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{	
		//$nav = Navigation::where('parent_id',0)->get();
		$user = User::all();
		$objNav = new Navigation;
        $nav = $objNav->getParent();
		$objModules = new Modules;
		$app_modules = $objModules->getActiveModules();
		$roles = Roles::all();
		//
		$arData = array(
			'app_module' => $app_modules,
			'role' => $roles,
			'user' => $user,
			'nav' => $nav
			);
		//
		return View::make('admin.manage_modules.create_modules',$arData);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// Initialize module object
		$app_modules = new Modules;
		// Do we
		if(isset($_POST)) {
		  $app_modules->doSave($_POST);	
		}
		return Redirect::to('/admin/manage_modules');
		
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$objModules = new Modules;
		// Get role info
		$app_module = Modules::find($id);
		$objRoles = new Roles;
		$roles = Roles::all();
		$objNav = new Navigation;
        $nav = $objNav->getParent();
		$user = User::all();
		$arData = array(
			'app_module' => $app_module,
			'app_modules' => $objModules,
			'role' => $roles,
			'app_role' => $objRoles,
			'nav' => $nav,
			'user' => $user
			);
		// Set role info to fields
		return View::make('admin.manage_modules.edit_modules',$arData);
	}
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

		$app_modules = Modules::find($id);
		// Do update
		$app_modules->doUpdate($id,$_POST);
		return Redirect::to('/admin/manage_modules');	
	}
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
		// Delete specific role
		Modules::destroy($id);
 		// Redirect to index
        return Redirect::to('/admin/manage_modules',['nav' => $nav]);
	}




}
