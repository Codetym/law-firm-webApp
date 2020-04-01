<?php
	class User{
	//class definition
	public $id;
	public $email;
	public $isLoggedIn = false;
	public $errorType = "fatal";

	function __construct(){
		if (session_id() == "") {
			session_start();
		}
	if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == true) {
		$this-> _initUser();
		}
	}//end __construct

	public function logout(){
		$this-> isLoggedIn = false;

		if (session_id() == '') {
			session_start();
		}
		$_SESSION['isLoggedIn'] = false;

		foreach ($_SESSION as $key => $value) {
			$_SESSION['$key'] = "";
			unset($_SESSION['$key']);
		}

		$_SESSION = array();
		if (ini_get("session.use_cookies")) {
			$cookieParameters = session_get_cookie_params();
			setcookie(session_name(), '', time() - 28800, $cookieParameters['path'], $cookieParameters['domain'], $cookieParameters['secure'], $cookieParameters['httponly']);
		}//end if
		session_destroy();
	}//end function logout

}//end class user

?>