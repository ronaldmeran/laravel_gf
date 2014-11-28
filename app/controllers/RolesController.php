<?php

class RolesController extends \BaseController {
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
		// Select all roles
		$roles = Roles::paginate(5);
		$objNav = new Navigation;
        $nav = $objNav->getParent();
        $arData = array(
        	'roles' => $roles, 'nav' => $nav
        );
 		// Return to view
        return View::make('admin.manage_roles.index', $arData);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		
		$objNav = new Navigation;
        $nav = $objNav->getParent();
		// Go to create role page
		return View::make('admin.manage_roles.create_roles', ['nav' => $nav]);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$nav = Navigation::all();
		// Instantiate Roles
		$roles = new Roles;
 		// Set value
        $roles->name = Input::get('name');
    	// Save
        $roles->save();
 		// Redirect to index page
        return Redirect::to('/admin/manage_roles');
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) 
	{
		$objNav = new Navigation;
        $nav = $objNav->getParent();
		// Get role info
		$role = Roles::find($id);
		// Set role info to fields
		return View::make('admin.manage_roles.edit_roles',['role' => $role], ['nav' => $nav]);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

		// Get role info
		$roles = Roles::find($id);
 		// Set name
        $roles->name = Input::get('name');
 		// Save
        $roles->save();
        return Redirect::to('/admin/manage_roles');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$nav = Navigation::all();
		// Delete specific role
		Roles::destroy($id);
 		// Redirect to index
        return Redirect::to('/admin/manage_roles');
	}


}
