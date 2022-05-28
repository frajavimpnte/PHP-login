<?php 
	// THIS FILES IS USED FOR JavaScript AJAX to process information, and return proper informatio to AJAX

	// Allow the config
	define('__CONFIG__', true);

	// Require the config
	require_once "../inc/config.php";

	ForceDashboard();

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		//header('Content-Type: application/json');

		$return = [];

		// Make sure the user does not exits. We have access to Filter because of Config
		$email = Filter::String( $_POST['email'] );
		//$email = strtolower($email);  // Let's mysql do it.

		// Make sure the user CAN be added AND is added
		// we have access to $con because of CONFIF
		$user_found = User:::Find( $email);

		if ($user_found) {
			// User exists
			// We can also check to see if they are able to log in.
			$return['error'] = "You already have an account.";
			$return['is_logged_in'] = false;
		} else {
			// User does not exists, add then now.

			// create a hash
			$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

			$addUser = $con->prepare("INSERT INTO users(email, password) VALUES (LOWER(:email), :password)");
			$addUser->bindParam(':email', $email, PDO::PARAM_STR);
			$addUser->bindParam(':password', $password, PDO::PARAM_STR);
			$addUser->execute();

			// add session PHP
			$user_id = $con->lastInsertId();
			$_SESSION['user_id'] = (int) $user_id;

			$return['redirect'] = '/dashboard.php?message=welcome';
			$return['is_logged_in'] = true;
		}

		// Return the proper information to JavaScript to redirect us
	
		$return['name'] = "Kalob Taulien";

		echo json_encode($return, JSON_PRETTY_PRINT);
		exit;  // som donr like, because stops scripts 

	} else {
		// Die. Kill the script. Redirect the user. Do something regardless.
		exit('Invalid URL');	
	}
?>