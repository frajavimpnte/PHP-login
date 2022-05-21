<?php 
	// this is no necesary, because here is nothing important
	if (!defined('ALLOW_FOOTER')) {
			exit('You do not have a config file');
	}
	//$httpProtocol = !isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] != 'on' ? 'http' : 'https';
	//$base = $httpProtocol .'://'.$_SERVER['HTTP_HOST'] . '/';
	//$base_sites = $base . $path;
?>

<!-- UIkit JS -->
<script src="https://cdn.jsdelivr.net/npm/uikit@3.14.1/dist/js/uikit.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.14.1/dist/js/uikit-icons.min.js"></script>

<!--- 	jquery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script src="/assets/js/main.js"></script>
