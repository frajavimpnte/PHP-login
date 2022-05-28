<?php 
	// THIS FILES IS USED FOR JavaScript AJAX to process information, and return proper informatio to AJAX

	// Allow the config
	define('__CONFIG__', true);

	// Require the config
	require_once "../inc/config.php";

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		//header('Content-Type: application/json');

		$return = [];

		// Make sure the user does not exits. We have access to Filter because of Config
		$email = Filter::String( $_POST['email'] );
		$password = $_POST['password'];

		// Make sure the user CAN be added AND is added
		// we have access to $con because of CONFIG
		$user_found = User::Find($email, true); // return_assoc => true  

		if ($user_found) { // user set 
			// User exists, try and sign then in

			$user_id = (int) $user_found['user_id'];
			$hash = (string) $user_found['password'];

			if (password_verify($password, $hash)) {
				// User is signed in
				$return['redirect'] = '/dashboard.php';

				$_SESSION['user_id'] = $user_id;
			} else {
				// Invalid user email/password combo
				$return['error'] = "Invalid user email/password combo";
			}

			$return['error'] = "You already have an account.";
		} else {
			// User does not exists
			$return['error'] = "You do not have an account. <a href='/register.php'>Create one now?</a>";
		}

		// Return the proper information to JavaScript to redirect us
		// FOR DEBUG
		$return['name'] = "Kalob Taulien";

		// TO DEBUG
		echo json_encode($return, JSON_PRETTY_PRINT);
		exit;  // som donr like, because stops scripts 

	} else {
		// Die. Kill the script. Redirect the user. Do something regardless.
		exit('Invalid URL');	
	}
?>