<?php

class Roles extends Eloquent
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table ="app_roles";

    /**
     * Get users with a certain role
     */
    public function users()
    {
        return $this->belongsToMany('User', 'app_user_roles');
    }

    public function getRoles($user_id) {
        $result = DB::table('app_roles')
        ->select(DB::raw('app_roles.id,app_roles.name'))
        ->leftJoin('app_user_roles', 'app_roles.id', '=', 'app_user_roles.role_id')
        ->where('app_user_roles.user_id',$user_id)
        ->get();

        foreach ($result as $roleResult){
            return $roleResult->id;
        }        
    }
    /**
     *
     * Get module access per role
     *
     */
    public function generateRoles() {
        $result = DB::table('app_roles')
        ->select(DB::raw('id,name'))
        ->get();

        return $result;
    }
    /**
     *
     * Get module access per role
     *
     */
    public function getModuleAccessRoles($module_id) {
        $arAccessRole = array();
        $arResult = array();
        $arCriteria = array();
        $arRoleResult = array();    
        $result = DB::table('app_assign_modules')
                  ->select(DB::raw('role_id'))
                  ->where('module_id',$module_id)
                  ->get();
        foreach($result as $array_encrypted_role) {
            $arAccessRole[] = $array_encrypted_role->role_id;
        }
        
        foreach($arAccessRole as $arDecryptRole) {
            $arRoleResult[] = unserialize($arDecryptRole);

        }
        foreach($arRoleResult as $key => $val) {
            foreach($val as $key1 => $val1) {
                $arCriteria[] = $val1;        
            }
        }
        if (!empty($arCriteria)) {
            $arFresult = DB::table('app_roles')
            ->select(DB::raw('id,name'))
            ->whereIn('id',$arCriteria)
            ->get();
            // Loop through result
            foreach ($arFresult as $accessRoles){
                // Assign result to array
                $arResult[] = $accessRoles->id; 
            }    
        }
        
        
        
        // return 
        return $arResult;
    }

}
?>