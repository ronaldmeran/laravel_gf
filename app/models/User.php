<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'app_users';
    /**
     * Save Module
     *
     */
    public function doSave($arParams = array()) {
        // Initialize fields
        $arFields = array();
        // Loop through params array
        foreach($arParams as $key => $val) {
            if($key != "password" && $key != "password_confirmation" && $key != "_token" && $key != "_method" && $key !="role" && $key !="password_confirmation") {
                $arFields[$key] = $val;
            }
        }
        $arFields['password'] = Hash::make($arParams['password']);
        //$arFields['password_confirmation'] = Hash::make($arParams['password_confirmation']);
        if (!empty($arFields)){
            $last_id = DB::table($this->table)->insertGetId($arFields);
        }
        
        if (!empty($arParams['role'])){
            // Insert to user role
            $this->addRole($last_id,$arParams['role']);  
        }
    }
    /**
     * Save Module
     *
     */
    public function doUpdate($id,$arParams = array()) {
        // Initialize fields
        $arFields = array();
        // Loop through params array
        foreach($arParams as $key => $val) {
            if($key != "password" && $key != "password_confirmation" && $key != "_token" && $key != "_method" && $key !="role" && $key !="password_confirmation") {
                $arFields[$key] = $val;
            }
        }
        $arFields['password'] = Hash::make($arParams['password']);
        //$arFields['password_confirmation'] = Hash::make($arParams['password_confirmation']);
        if (!empty($arFields)){
            // Update the data
            DB::table($this->table)->where('id',$id)->update($arFields);
        }
        
        if (!empty($arParams['role'])){
            // Insert to user role
            $this->addRole($id,$arParams['role']);    
        }

    }
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	/**
	 * Get user full name
	 *
	 */
	public function getFullName() {
		return $this->first_name . ' ' . $this->last_name;
	}

	/**
     * Get the roles a user has
     */
    public function roles()
    {
        return $this->belongsToMany('Roles', 'app_roles');
    }
 
    public function addRole($userID,$roleID) {
        // echo $userID;
        // echo $roleID;
        $arFields = array();
        // Do we have an existing data?
        $result = DB::table('app_user_roles')
        ->select(DB::raw('role_id,user_id'))
        ->where('user_id',$userID)
        ->get();
        
        if (count($result) > 0){
          $arFields = array('role_id' => $roleID);
        
          DB::table('app_user_roles')->where('user_id',$userID)->update($arFields);
        } else {
        
          $arFields = array('user_id'=>$userID,'role_id' => $roleID);
          DB::table('app_user_roles')->insert($arFields);    
        }
        
    }
    /**
     *
     * Get status
     *
     */
    public function getStatus($user_id) {
             $result = DB::table($this->table)
            ->select(DB::raw('is_active'))
            ->where('id',$user_id)
            ->get();

            foreach ($result as $user_status){
                return $user_status->is_active;
            }
        }

}
