<?php

class Navigation extends Eloquent {
	protected $table = 'app_modules';
	
	public function getParent() {
		$arr = DB::table('app_user_roles')->select(DB::raw('app_user_roles.role_id'))
				   ->leftJoin('app_roles','app_roles.id','=','app_user_roles.role_id')
				   ->where('app_user_roles.user_id',Auth::user()->id)->get();

		foreach($arr as $test) {
			$role = $test->role_id;
		}

		$result = $this->select(DB::raw('app_modules.id,app_modules.name,app_modules.url'))
			   	->leftJoin('app_assign_modules','app_modules.id','=','app_assign_modules.module_id')
				->where('app_modules.parent_id', 0)
				->where('app_modules.is_active','1')
				->where('app_assign_modules.role_id','LIKE','%s%'.$role.'%')
			 	->orderBy('app_modules.module_order','ASC')->get();
		
			return $result;	
	}


	public function hasChild($intParentId,$url) {
		// Is the module parent?
		if($intParentId != 0) {
			// Get parent list
			// $intParentId = $this->where('parent_id',$intParentId)
			// 			 ->where('is_active','1')
			// 			 ->orderBy('order','ASC')->get();
			// $intParentId = $this->select('app_modules.id','app_modules.parent_id','app_modules.name','app_modules.url')
	  //   					->leftJoin('app_assign_modules','app_modules.id','=','app_assign_modules.module_id')
	  //   					->leftJoin('app_roles','app_roles.id','=','app_assign_modules.role_id')
	  //   					->leftJoin('app_user_roles','app_user_roles.role_id','=','app_roles.id')
	  //   					->where('app_modules.parent_id', $intParentId)
	  //   					->where('app_modules.is_active','1')
	  //   					->where('app_user_roles.user_id',Auth::user()->id)
			// 			 	->orderBy('app_modules.order','ASC')->get();
			$role = array();
			$arr = DB::table('app_user_roles')->select(DB::raw('app_user_roles.role_id'))
				   ->leftJoin('app_roles','app_roles.id','=','app_user_roles.role_id')
				   ->where('app_user_roles.user_id',Auth::user()->id)->get();

			foreach($arr as $test) {
				$role = $test->role_id;
			}

			$intParentId = DB::table($this->table)->select(DB::raw('app_modules.name,app_modules.url'))
				   	->leftJoin('app_assign_modules','app_modules.id','=','app_assign_modules.module_id')
					->where('app_modules.parent_id', $intParentId)
					->where('app_modules.is_active','1')
					->where('app_assign_modules.role_id','LIKE','%s%'.$role.'%')
				 	->orderBy('app_modules.module_order','ASC')->get();			 	
			// Do we have a parent?
			if (count($intParentId) > 0) {
				// Generate parent link
				echo "<a href='#' class='dropdown-toggle' data-toggle='dropdown' data-hover='dropdown'><i class='glyphicon glyphicon-chevron-down pull-right'></i>";
			} else {
				// Generate hyperlink
				echo '<a href="'.$url.'">';
			}
		}

	}
	public function generateChildNavigation($intParentId = 0) {
		// Is the link parent?
		if($intParentId != 0)
		{
			$role = array();
			$arr = DB::table('app_user_roles')->select(DB::raw('app_user_roles.role_id'))
				   ->leftJoin('app_roles','app_roles.id','=','app_user_roles.role_id')
				   ->where('app_user_roles.user_id',Auth::user()->id)->get();

			foreach($arr as $test) {
				$role = $test->role_id;
			}

			$arNavResult = DB::table($this->table)->select(DB::raw('app_modules.id,app_modules.name,app_modules.url'))
				   	->leftJoin('app_assign_modules','app_modules.id','=','app_assign_modules.module_id')
					->where('app_modules.parent_id', $intParentId)
					->where('app_modules.is_active','1')
					->where('app_assign_modules.role_id','LIKE', '%s%'.$role.'%')
				 	->orderBy('app_modules.module_order','ASC')->get();
			// Get child navigation
			//$arNavResult = $this->select('name','url')->where('parent_id',$intParentId)->get();
	    	// $arNavResult = $this->select('app_modules.id','app_modules.parent_id','app_modules.name','app_modules.url')
	    	// 				->leftJoin('app_assign_modules','app_modules.id','=','app_assign_modules.module_id')
	    	// 				->leftJoin('app_roles','app_roles.id','=','app_assign_modules.role_id')
	    	// 				->leftJoin('app_user_roles','app_user_roles.role_id','=','app_roles.id')
	    	// 				->where('app_modules.parent_id', $intParentId)
	    	// 				->where('app_modules.is_active','1')
	    	// 				->where('app_user_roles.user_id',Auth::user()->id)
						//  	->orderBy('app_modules.order','ASC')->get();
			// 1. select id,parent_id,url,name from modules left join app_assign_modules on id = module_id
			// 2. select id from app_roles left join
			// Get the result
			if(count($arNavResult) > 0)
			{
				// Generate child list
				echo '<ul class="dropdown-menu">';
				foreach ($arNavResult as $nav) {
	    			$submenu_parent = $this->where('parent_id', $nav->id)->get();
					if(count($submenu_parent) > 0)
			    	{	
			    		// Add class menu
			    		$classmenu = " class='dropdown-submenu'";
			    	} else {
			    		// Remove class
			    		$classmenu = " ";
			    	}
			    	// generate child list
					echo "<li".$classmenu."><a href=".URL::to($nav->url).">".$nav->name."</a>";
					$this->generateChildNavigation($nav->id);
					echo "</li>";
				}
				echo '</ul>';	
			}
		}
	}



	// start of breadcrumbs
	// Considered our breadcrumbs function is under navigation module because it will depend on its data
	public function bread_menu()
	{
		// get current url address
		$VarServer = $_SERVER['REQUEST_URI'];

		// we trimed back slash left part of url to equal the string provided by the current address
		$trimed_server_name = ltrim($VarServer, '/');
		$xploded = explode('/', $trimed_server_name);

			// need to evaluate if there's extension to our url, if extended. we must trim the last part of url to find match in our query stated below
			if(count($xploded) > 2)
			{
				// url has extension
				// this should be match 
				$on_the_go_url = $xploded[0]."/".$xploded[1];
				// this is the last part or the main display page name of breadcrumbs
				$bread_extend = $xploded[count($xploded)-1];
			} else
			{
				// no url extension, *condition
				$on_the_go_url = $xploded[0]."/".$xploded[1];
				$bread_extend = '';
			}

		// our main selecion query
	    $module_name = $this->where('url', $on_the_go_url)->get();

			if(count($module_name) > 0)
			{
				// get database selection output
				foreach ($module_name as $tinapay) {
					$urls = '/'.$tinapay->url;
					$name_mod = $tinapay->name; 
				}

				//main keyword functions or output generation if our breadcrumbs :D
				Breadcrumb::addbreadcrumb('Home', '/home/dashboard');
				Breadcrumb::addbreadcrumb($name_mod, $urls);
				// this is the extension name/display name
				if($bread_extend != null){
					Breadcrumb::addbreadcrumb($bread_extend);
				}
				// as you can see, it is a separator defined by itself :D
				Breadcrumb::setSeparator('>');

				// returns output of this method
		      	return Breadcrumb::generate(); //Breadcrumbs UL is generated and stored in an array.
			}
	}

}
?>