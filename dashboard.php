<?php 

	// Allow the config
	define('__CONFIG__', true);
	// Require the config
	require_once "inc/config.php";


	ForceLogin();
    // Dashboard: Login
	//echo $_SESSION['user_id'] . ' is your user id';
	//exit;

/*
	//esta da el localhost por default de apache
	$httpProtocol = !isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] != 'on' ? 'http' : 'https';
	$base = $httpProtocol .'://'.$_SERVER['HTTP_HOST'].'/';
	echo 'host: ' . $base;
	echo '</br>';



	$dir = __DIR__ . '/';
	echo '__DIR__:' . $dir;
	echo '</br>';

	$domain = $_SERVER['HTTP_HOST'];
	$request_uri = $_SERVER['REQUEST_URI'];
    $path = explode('?', $_SERVER['REQUEST_URI'])[0];
    $method = $_SERVER['REQUEST_METHOD'];

    echo "domain: " . $domain;
    echo '</br>';


    echo "request_uri: " . $request_uri ;
    echo '</br>';
    
    echo "path: " . $path;
    echo '</br>';

    echo "method: " . $method;
    echo '</br>';

    //$base_sites = $base . 
    */

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta name="robots" content="follow" />

		<title>Page Title</title>
		<base href="/" />
		<!-- UIkit CSS -->		
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.14.1/dist/css/uikit.min.css" />
	</head>

	<body>
		<div class="uk-section uk-container">
			Dashboard here!!!	You are signed in as user: <?php echo $_SESSION['user_id']; ?>
		</div>

		<?php require_once "inc/footer.php"; ?>
	</body>
</html>