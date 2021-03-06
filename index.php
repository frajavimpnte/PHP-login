<?php 

	// Allow the config, __CONFIG__ shour be defined, add this for security reasons !!!
	define('__CONFIG__', true);
	// Require the config
	require_once "inc/config.php";

	Page::ForceDashboard();

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
				<?php 
					echo "Hello world. Today is: ";
					echo date("Y m d");
					echo '<br/>';
					;
					echo '<br/>';
				?>
				<p>
					<a href="login.php">Login</a>
					<a href="register.php">Register</a>
				</p>
			</div>

			<?php require_once "inc/footer.php"; ?>
	</body>
</html>