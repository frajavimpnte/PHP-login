<?php 
	// If there is no constant defined called __CONFIG__, do not load this file
	if (!defined('__CONFIG__')) {
		exit('You do not hava a config file');
	} 

	// Sessions are always turned on
	if (!isset($_SESSION)) {
		session_start();
	}


	define('ALLOW_FOOTER', true);
	
	// Our config file is below

	// Allow errors 
	error_reporting(-1);
	ini_set('display_errors', 'On');

	// Include the DB.php file
	include_once "classes/DB.php";
	include_once "classes/Filter.php";

	$con = DB::getConnection();
?>