<?php
class UserController extends \BaseController {
    
    public function __construct()
    {
        $this->beforeFilter('auth');
    }
 
    /**
     * Display a listing of the user.
     *
     * @return Response
     */
    public function index()
    {
        // Get all users
        $users = User::paginate(5);
        $objNav = new Navigation;
        $nav = $objNav->getParent();
        return View::make('admin.manage_user.index', ['users' => $users], ['nav' => $nav]);
    }
    /**
     * Show the form for creating a new user.
     *
     * @return Response
     */
    public function create()
    {
        $objNav = new Navigation;
        $nav = $objNav->getParent();
        $role = Roles::all();

        // Redirect to user create page
        return View::make('admin.manage_user.create_user' , ['nav' => $nav], ['role' => $role]);
    }
 
    /**
     * Store a newly created user in storage.
     *
     * @return Response
     */
    public function store()
    {
        $objUser = new User;
        
        $objUser->doSave($_POST);
 
        return Redirect::to('/admin/manage_user');
    }
 
    /**
     * Show the form for editing the specified user.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        // Get user info
        $user = User::find($id);
        $users = new User;
        $objNav = new Navigation;
        $nav = $objNav->getParent();
        $app_role = new Roles;
        // Set params
        $arData = array(
            'user' => $user,
            'users' => $users,
            'nav' => $nav,
            'app_role' => $app_role
            );
        return View::make('admin.manage_user.edit_user',$arData);
    }
 
    /**
     * Update the specified user in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        // Get user info
        $objUser = new User;
        $user = User::find($id);
        $objUser->doUpdate($id,$_POST);
        // Redirect to index
        return Redirect::to('/admin/manage_user');
    }
 
    /**
     * Remove the specified user from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        // Delete selected user
        User::destroy($id);
        $nav = Navigation::all();
        // 
        return Redirect::to('/admin/manage_user');
    }


}