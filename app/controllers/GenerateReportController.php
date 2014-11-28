<?php 
			
 class GenerateReportController extends BaseController {
			
  /**
			
	 * Display a listing of the resource.
			
	 *
			
	 * @return Response
			
	 */
			
	public function index()
			
	{
			
		$nav = Navigation::where('parent_id',0)->get();
			
		// add elements to be passed to view
			
		$arData = array(
			
			'nav' => $nav
			
			);
			
      // TODO: edit and change using index page of newly created module
			
		return View::make('admin.manage_modules.index', $arData);
			
	}
			
	/**
	 * Show the form for creating a new resource.		
	 *
	 * @return Response	
	 */
			
	public function create()
			
	{	
			
		$nav = Navigation::where('parent_id',0)->get();
			
		// add elements to be passed to view
			
		$arData = array(
			
			'nav' => $nav
			
			);
			
      // TODO: edit and change using index page of newly created add module
			
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
			
      // TODO: edit and change using newly created view details or index module
			
		return Redirect::to('/admin/manage_modules');
			
	}
			
	/**
	 * Show the form for editing the specified resource.	
	 *
	 * @param  int $id		
	 * @return Response
	 */
			
	public function edit($id)
			
	{
			
		//$app_module = Modules::find($id);
			
		$nav = Navigation::where('parent_id',0)->get();
			
		$arData = array(
			
			'nav' => $nav,
			
			);
			
		// Redirect to edit page
			
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
			
		$app_modules = new Modules;
			
		// Do update
			
		$app_modules->doUpdate($id,$_POST);
			
      // TODO: edit and change using newly created view details or index module
			
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