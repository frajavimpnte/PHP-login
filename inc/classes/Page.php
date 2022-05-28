<?php
// It there is no constant defined called ___CONFIG__, not not load this file;
if (!defined('__CONFIG__')) {
	exit('You do not have a config file.');
}

class Page {
	// Force the user to be logged in or redirect.
	static function ForceLogin() {
		if (isset($_SESSION['user_id'])) {
			// The user is allowed here
		} else {
			// The user is not allowed here
			header("Location:/login.php");exit;
		}
	}

	static function ForceDashboard() {
		if (isset($_SESSION['user_id'])) {
			// The user is allowed here but redirect anyway
			header("Location:/dashboard.php");exit;
		} else {
			// The user is not allowed here
			
		}
	}
}


?>