<?php 
			
 class Reservation extends Eloquent {
			
 protected $table = ''; 
			
 // do Save
			
 public function doSave($arParams = array()) {
			
		// Initialize fields
			
		$arFields = array();
			
		// Loop through params array
			
		foreach($arParams as $key => $val) {
			
			if($key != '_token' && $key != '_method' && $key != 'role') {
			
				$arFields[$key] = $val;
			
			}
			
		}
			
		// Insert
			
		// DB::table($this->table)->insert($arFields);
			
	}
			
 // Do update
			
 public function doUpdate($id,$arParams = array()) {
			
	// Initialize fields
			
	$arFields = array();
			
	// Loop through params array
			
	foreach($arParams as $key => $val) {
			
		if($key != '_token' && $key != '_method') {
			
			$arFields[$key] = $val;
			
		}
			
	}
			
	// Update the data
			
	//DB::table($this->table)->where('id',$id)->update($arFields);
			
 }  
			}