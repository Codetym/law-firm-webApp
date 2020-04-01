<?php

function isLoggedIn(){
	if (isset($_SESSION['user_email'])) {
		return true;
	}else{
		return false;
	}
}

?>