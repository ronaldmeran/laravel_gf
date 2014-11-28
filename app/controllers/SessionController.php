<?php

class SessionController extends \BaseController {

	/**
	 * Create session reusable
	 *
	 * @return session value and key
	 */
	public function create($sess_key, $sess_val)
    {	
		return Session::put($sess_key, $sess_val);
    }
	/**
	 * Edit session timeout value
	 *
	 * @param session timeout set value
	 */
	public function timeout()
	{
		

	}
	/**
	 * Get session value
	 *
	 * @return session value
	 */
	public function getSession($sess_key)
	{
		return Session::get($sess_key);
	}
	/**
	 * Removes all items in the session
	 *
	 * @return session value and key
	 */
	public function destroy()
	{	
		Session::flush();
	}
	
	
}
