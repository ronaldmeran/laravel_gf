<?php
class Modules extends Eloquent
{
	protected $table = 'app_modules';
	/**
	 * Save Module
	 *
	 */
	public function doSave($arParams = array()) {
		// Initialize fields
		$arFields = array();
		// Loop through params array
		foreach($arParams as $key => $val) {
			if($key != "_token" && $key != "_method" && $key != 'role') {
				$arFields[$key] = $val;
			}
		}
		// Do we have a model?
		if(!empty($arFields['model_file'])) {
			// Create model file
			$this->createModelFile($arFields['model_file']);
		}
		// Do we have a view file
		if(!empty($arFields['view_file'])) {
			// Create view file
			$this->createViewFile($arFields['view_file']);
		}
		// Do we have a controller file?
		if(!empty($arFields['controller_file'])) {
			$this->createControllerFile($arFields['controller_file']);
		}
		// Do we have a view and controller file?
		if (!empty($arFields['view_file']) && !empty($arFields['controller_file'])) {
			// Add to routes.php
			$this->createRoute($arFields['view_file'],$arFields['controller_file']);
		}
		// Do we have a assigned role?
		if (!empty($arParams['role'])) {
			// Insert to relationship table
			$this->restrictPages($id, $arParams['role']);
		}
		// Insert
		DB::table($this->table)->insert($arFields);
	}
	/**
	 * Update Module
	 *
	 */
	public function doUpdate($id,$arParams = array()) {
		// Initialize fields
		$arFields = array();
		// Loop through params array
		foreach($arParams as $key => $val) {
			if($key != "_token" && $key != "_method" && $key != 'role') {
				$arFields[$key] = $val;
			}
		}
		// Do we have a model?
		if(!empty($arFields['model_file'])) {
			// Create model file
			$this->createModelFile($arFields['model_file']);
		}
		// Do we have a view file
		if(!empty($arFields['view_file'])) {
			// Create view file
			$this->createViewFile($arFields['view_file']);
		}
		// Do we have a controller file?
		if(!empty($arFields['controller_file'])) {
			$this->createControllerFile($arFields['controller_file']);
		}
		// Do we have a view and controller file?
		if (!empty($arFields['view_file']) && !empty($arFields['controller_file'])) {
			// Add to routes.php
			$this->createRoute($arFields['view_file'],$arFields['controller_file']);
		}
		// Do we have a assigned role?
		if (!empty($arParams['role'])) {
			// Insert to relationship table
			$this->restrictPages($id,$arParams['role']);
		}
		// Update the data
		DB::table($this->table)->where('id',$id)->update($arFields);
		
	}
	/**
	 * Create View 
	 *
	 */
	public function createViewFile($strViewName) 
	{
		$arViewName = explode('\\',$strViewName);
		$viewSlahsCount = count($arViewName) -1;
		// Specify path
		$basePath = realpath(dirname(__FILE__) . '\\..\\views\\') . '\\';
		//$basePath = realpath(dirname(__FILE__) . '\\..\\views\\') . '\\';
		// Loop through
		for ($y=0;$y <= $viewSlahsCount;$y++) {
			
			if(!strpos($arViewName[$y],".php")) {
				$artest['directory_'.$y] = $arViewName[$y];		
			} else {
				$artest['file'] = $arViewName[$y];
			}
		}
		// initialize counter
		$x =0;
		// initialize directory string
		$new_dir ="";
		// create directory
		while ($x < $viewSlahsCount) {
			// append to string
			$new_dir .= $artest['directory_'.$x] ."\\";
			// create directory path
			$fileDirectory = $basePath.$new_dir;
			// Do we have a existing directory?
			if(!file_exists($fileDirectory)) {
				// create file
				mkdir($fileDirectory);	
			}
			$x++;
		}
		// Do we have a custom directory path?
		if(!empty($fileDirectory)) {
			$filePath = $fileDirectory . $artest['file'];	
		} else {
			$filePath = $basePath . $artest['file'];
		}
		// Do we have a view file?
		// Create view content
		$strViewContents = "
			\n@extends('layouts.master')
			\n@extends('layouts.navigation')
			\n@section('content')
			\n<div>add layouts if any use @extend(). example: @extend('layouts.master')</div>
			\n@stop
		";
		// Check if the file exists or not.
		// TODO: Add an overwrite ability.
		if (!file_exists($filePath)) {
			// Create the file.
			file_put_contents($filePath, $strViewContents);
		} 
	}
	/**
	 * Create Model 
	 *
	 */
	public function createModelFile($strModelName) 
	{
		// Initialize model array
		$arModelName = explode("\\",$strModelName);
		$modelSlashCount = count($arModelName) - 1;
		// Specify path
		$basePath = realpath(dirname(__FILE__) . '\\..\\models\\') . '\\';
		// $basePath = realpath(dirname(__FILE__) . '\\..\\models\\') . '\\';
		// Loop through
		for ($y=0;$y <= $modelSlashCount;$y++) {
			
			if(!strpos($arModelName[$y],".php")) {
				$artest['directory_'.$y] = $arModelName[$y];		
			} else {
				$artest['file'] = $arModelName[$y];
			}
		}
		// initialize counter
		$x=0;
		// initialize directory string
		$new_dir ="";
		// create directory
		while ($x < $modelSlashCount) {
			// append to string
			$new_dir .= $artest['directory_'.$x] ."\\";
			// create directory path
			$fileDirectory = realpath($basePath.$new_dir);
			// Do we have a existing directory?
			if(!file_exists($fileDirectory)) {
				// create file
				mkdir($fileDirectory);	
			}
			$x++;
		}
		// Do we have a custom directory path?
		if(!empty($fileDirectory)) {
			$filePath = $fileDirectory . $artest['file'];	
		} else {
			$filePath = $basePath . $artest['file'];
		}
		$strFilename = str_replace(".php","",$artest['file']);
		// Create a CamelCase class name and it's suffix.
		$strClassname = ucfirst($strFilename);
		// Create controller content
		 $strModelContents = "<?php 
			\n class $strClassname extends Eloquent {
			\n protected \$table = ''; 
			\n // do Save
			\n public function doSave(\$arParams = array()) {
			\n		// Initialize fields
			\n		\$arFields = array();
			\n		// Loop through params array
			\n		foreach(\$arParams as \$key => \$val) {
			\n			if(\$key != '_token' && \$key != '_method' && \$key != 'role') {
			\n				\$arFields[\$key] = \$val;
			\n			}
			\n		}
			\n		// Insert
			\n		// DB::table(\$this->table)->insert(\$arFields);
			\n	}
			\n // Do update
			\n public function doUpdate(\$id,\$arParams = array()) {
			\n	// Initialize fields
			\n	\$arFields = array();
			\n	// Loop through params array
			\n	foreach(\$arParams as \$key => \$val) {
			\n		if(\$key != '_token' && \$key != '_method') {
			\n			\$arFields[\$key] = \$val;
			\n		}
			\n	}
			\n	// Update the data
			\n	//DB::table(\$this->table)->where('id',\$id)->update(\$arFields);
			\n }  
			}";
		
	
		// Check if the file exists or not.
		// TODO: Add an overwrite ability.
		if(!file_exists($filePath)) {
			// Create the file.
			file_put_contents($filePath, $strModelContents);
		} 
	}
	/**
	 * Create Controller 
	 *
	 */
	public function createControllerFile($strControllerName) {
		$arControllerName = explode("\\",$strControllerName);
		$controllerSlashCount = count($arControllerName) -1;
		// Create
		$basePath = realpath(dirname(__FILE__) . '\\..\\controllers\\') . '\\';
		// Loop through
		for ($y=0;$y <= $controllerSlashCount;$y++) {
			
			if(!strpos($arControllerName[$y],".php")) {
				$artest['directory_'.$y] = $arControllerName[$y];		
			} else {
				$artest['file'] = $arControllerName[$y];
			}
		}
		// Initialize counter
		$x =0;
		// Initialize directory string
		$new_dir ="";
		// Create directory
		while ($x < $controllerSlashCount) {
			// append to string
			$new_dir .= $artest['directory_'.$x] ."\\";
			// create directory path
			$fileDirectory = $basePath.$new_dir;
			// Do we have a existing directory?
			if(!file_exists($fileDirectory)) {
				// create file
				mkdir($fileDirectory);	
			}
			$x++;
		}
		// Create new controller file
		$strFilename = str_replace(".php","",$artest['file']);
		// Create a CamelCase class name and it's suffix.
		$strClassname = ucfirst($strFilename);
		// Create controller content
		$strControllerContents = "<?php 
			\n class $strClassname extends BaseController {
			\n  /**
			\n	 * Display a listing of the resource.
			\n	 *
			\n	 * @return Response
			\n	 */
			\n	public function index()
			\n	{
			\n		\$nav = Navigation::where('parent_id',0)->get();
			\n		// add elements to be passed to view
			\n		\$arData = array(
			\n			'nav' => \$nav
			\n			);
			\n      // TODO: edit and change using index page of newly created module
			\n		return View::make('admin.manage_modules.index', \$arData);
			\n	}
			\n	/**
			\n	 * Show the form for creating a new resource.
			\n	 *
			\n	 * @return Response
			\n	 */
			\n	public function create()
			\n	{	
			\n		\$nav = Navigation::where('parent_id',0)->get();
			\n		// add elements to be passed to view
			\n		\$arData = array(
			\n			'nav' => \$nav
			\n			);
			\n      // TODO: edit and change using index page of newly created add module
			\n		return View::make('admin.manage_modules.create_modules',\$arData);
			\n	}
			\n	/**
			\n	 * Store a newly created resource in storage.
			\n	 *
			\n	 * @return Response
			\n	 */
			\n	public function store()
			\n	{
			\n		// Initialize module object
			\n		\$app_modules = new Modules;
			\n		// Do we
			\n		if(isset(\$_POST)) {
			\n		  \$app_modules->doSave(\$_POST);	
			\n		}
			\n      // TODO: edit and change using newly created view details or index module
			\n		return Redirect::to('/admin/manage_modules');
			\n	}
			\n	/**
			\n	 * Show the form for editing the specified resource.
			\n	 *
			\n	 * @param  int \$id
			\n	 * @return Response
			\n	 */
			\n	public function edit(\$id)
			\n	{
			\n		//\$app_module = Modules::find(\$id);
			\n		\$nav = Navigation::where('parent_id',0)->get();
			\n		\$arData = array(
			\n			'nav' => \$nav,
			\n			);
			\n		// Redirect to edit page
			\n		return View::make('admin.manage_modules.edit_modules',\$arData);
			\n	}
			\n	/**
			\n	 * Update the specified resource in storage.
			\n	 *
			\n	 * @param  int  \$id
			\n	 * @return Response
			\n	 */
			\n	public function update(\$id)
			\n	{
			\n		\$app_modules = new Modules;
			\n		// Do update
			\n		\$app_modules->doUpdate(\$id,\$_POST);
			\n      // TODO: edit and change using newly created view details or index module
			\n		return Redirect::to('/admin/manage_modules');	
			\n	}
			\n	/**
			\n	 * Remove the specified resource from storage.
			\n	 *
			\n	 * @param  int  \$id
			\n	 * @return Response
			\n	 */
			\n	public function destroy(\$id)
			\n	{
			\n		//
			\n		// Delete specific role
			\n		Modules::destroy(\$id);
			\n		// Redirect to index
			\n       return Redirect::to('/admin/manage_modules',['nav' => \$nav]);
			\n	}
			}";
		// Do we have a custom directory path?
		if(!empty($fileDirectory)) {
			$filePath = $fileDirectory . $artest['file'];	
		} else {
			$filePath = $basePath . $artest['file'];
		}
			// Check if the file exists or not.
			// TODO: Add an overwrite ability.
			if(!file_exists($filePath))
			{
				// Create the file.
				file_put_contents($filePath, $strControllerContents);
			}
		}
		public function createRoute($strFile,$strController){
			//Initialize array file
			$arFile = explode("\\",$strFile);
			// Remove last element of arFile
			array_pop($arFile);
			// Initialize path string
			$strFile = implode("\\",$arFile);
			// Initialize array controller
			$arControllerName = explode("\\",$strController);
			// Is the result greater than 1?
			if(count($arControllerName) > 1) {
				// Get the last element of the array
				$strController = end($arControllerName);
			} 
			// Remove the extension
			$strControllerName = str_replace(".php","",$strController);
			// Set the path
			$path = realpath(dirname(__FILE__) . '\\..\\') . '\\routes.php';
			// Open the existing file
			$handle = fopen($path, 'a') or die('Cannot open file: '.$path);
			// Add the new data
			$data = "Route::resource('$strFile', '$strController');";
			$file = file_get_contents($path);
			if(strpos($file,$data) !== false) {
				// Write in the existing data
				fwrite($handle,$data);		
			}
			
			// Close the file
			fclose($handle);
		}
		/**
		 *
		 * Assign modules per role
		 *
		 */
		public function restrictPages($module_id,$arRoleId = array()){
			$arFields = array();

	        if(count($arRoleId) < 0) {
        		$arFields = array('module_id' => $module_id,'role_id'=>"");
        	} else {
        		$arFields = array('module_id' => $module_id,'role_id'=>serialize($arRoleId));
        	}
	        // Get existing data
	        $result = DB::table('app_assign_modules')
	        ->select(DB::raw('module_id,role_id'))
	        ->where('module_id',$module_id)
	        ->get();

	        // Do we have a result
	        if(count($result) > 0) {
	        	// Update the data
				DB::table('app_assign_modules')->where('module_id',$module_id)->update($arFields);	
	        } else {
        		// Add new values
        		DB::table('app_assign_modules')->insert($arFields);	
	        }
		}
		/**
		 *
		 * Get active modules
		 *
		 */
		public function getActiveModules() {
			$result = DB::table('app_modules')
			->select(DB::raw('id,name'))
			->where('is_active','1')
			->get();
			
			return $result;
		}
		/**
		 *
		 * Get parent link
		 *
		 */
		public function getParentLink($module_id) {
			 $result = DB::table($this->table)
	        ->select(DB::raw('parent_id'))
	        ->where('id',$module_id)
	        ->get();

	        foreach ($result as $parentModuleResult){
	            return $parentModuleResult->parent_id;
	        }
		}
		/**
		 *
		 * Get status
		 *
		 */
		public function getStatus($module_id) {
			 $result = DB::table($this->table)
	        ->select(DB::raw('is_active'))
	        ->where('id',$module_id)
	        ->get();

	        foreach ($result as $moduleStatus){
	            return $moduleStatus->is_active;
	        }
		}

		public function generateStatus($module_id) {
			 $result = DB::table($this->table)
	        ->select(DB::raw('is_active'))
	        ->get();

	            return $result;
	        
		}

		public function getModuleOrder($module_id) {
			$result = DB::table($this->table)
					  ->select(DB::raw('module_order'))
					  ->where('id',$module_id)
					  ->get();
			foreach($result as $module_order){
				return $module_order->module_order;
			}
		}


	}
?>


