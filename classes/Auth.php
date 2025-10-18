<?php
/**
* Authentication
*
*	Login & Logout
**/
class Auth
{
	/**
	*	Return the User Authentication Status
	*
	* @return boolean True if a user is logged in, false otherwise
	**/
	public static function isLoggedIn()
	{
		return isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'];
	}

	/**
	*	Requre the user to be logged in, stopping with an UnAuthorized message if not
	*
	* @return void
	**/
	public static function requireLogin()
	{
		if(! static::isLoggedIn())
		{
			die("UnAuthorized");
		}
	}

	/**
	*	Log in using the session
	*
	* @return void
	**/
	public static function login()
	{
		session_regenerate_id(true);		// helps to prevent sessoin fixation attacks
		$_SESSION['is_logged_in'] = true;
	}

	public static function logout()
	{
		// unset session
		$_SESSION = array();

		// If it's desired to kill the session, also delete the session cookie.
		// Note: This will destroy the session, and not just the session data!
		if (ini_get("session.use_cookies")) {
		    $params = session_get_cookie_params();
		    setcookie(session_name(), '', time() - 42000,
		        $params["path"], $params["domain"],
		        $params["secure"], $params["httponly"]
		    );
		}

		session_destroy();
	}
}
