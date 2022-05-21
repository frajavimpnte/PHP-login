<?php 
	// THIS FILES IS USED FOR JavaScript AJAX to process information, and return proper informatio to AJAX

	// Allow the config
	define('__CONFIG__', true);

	// Require the config
	require_once "../inc/config.php";

	

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		header('Content-Type: application/json');

		$return = [];

		// Make sure the user does not exits.

		// Make sure the user CAN be added AND is added

		// Return the proper information to JavaScript to redirect us
		
		// FOR DEBUG
		//$return['redirect'] = '/index.php?this-was-a-redirect';

		$return['redirect'] = '/dashboard.php';

		$return['name'] = "Kalob Taulien";

		// TO DEBUG
		//$array = ['test', 'test2', 'test3', array('name' => 'Kalob', 'lastname' => 'Taulien')];
		//echo json_encode($array, JSON_PRETTY_PRINT);

		echo json_encode($return, JSON_PRETTY_PRINT);
		exit;  // som donr like, because stops scripts 

	} else {
		// Die. Kill the script. Redirect the user. Do something regardless.
		exit('test');	
	}

	
?>