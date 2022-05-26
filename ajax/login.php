<?php 
	// THIS FILES IS USED FOR JavaScript AJAX to process information, and return proper informatio to AJAX

	// Allow the config
	define('__CONFIG__', true);

	// Require the config
	require_once "../inc/config.php";

	

	// TO DEBUG or DEMOSTRATE HASH
	//$pass = "hello my name is asdasdfasdfasd";
	//echo $pass . " <hr />";
	//$password = password_hash($pass, PASSWORD_DEFAULT);
	//echo $password;

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		//header('Content-Type: application/json');

		$return = [];

		// Make sure the user does not exits. We have access to Filter because of Config
		$email = Filter::String( $_POST['email'] );
		$password = $_POST['password'];

		// Make sure the user CAN be added AND is added
		// we have access to $con because of CONFIF
		$findUser = $con->prepare("SELECT user_id, password FROM users WHERE email = LOWER(:email) LIMIT 1"); // LIMIT 1 is because there will be millios of
		$findUser->bindParam(':email', $email, PDO::PARAM_STR);
		$findUser->execute();

		if ($findUser->rowCount() == 1) {
			// User exists, try and sign then in
			$User = $findUser->fetch(PDO::FETCH_ASSOC);

			$user_id = (int) $User['user_id'];
			$hash = (string) $User['password'];

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
		//$return['redirect'] = '/index.php?this-was-a-redirect';
		//$return['redirect'] = '/dashboard.php';
		$return['name'] = "Kalob Taulien";

		// TO DEBUG
		//$array = ['test', 'test2', 'test3', array('name' => 'Kalob', 'lastname' => 'Taulien')];
		//echo json_encode($array, JSON_PRETTY_PRINT);

		echo json_encode($return, JSON_PRETTY_PRINT);
		exit;  // som donr like, because stops scripts 

	} else {
		// Die. Kill the script. Redirect the user. Do something regardless.
		exit('Invalid URL');	
	}
?>