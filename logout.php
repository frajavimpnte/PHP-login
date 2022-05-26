<?php

session_start();

// DEBUG: no sirven juntos session_write_close(); y session_regenerate_id(true); 
//     ambos modifican los headers:::: Cannot modify header information - headers already sent by
//$id_sesion_antigua = session_id();
//echo "Sesión Antigua: $id_sesion_antigua<br />";
//echo 'sesion antes: </br>';
//print_r($_SESSION);
//echo '</br>';

session_regenerate_id(true); 				// added by me
$id_sesion_nueva = session_id();
session_destroy();							// code book
session_write_close();						// code book
setcookie(session_name(),'',0,'/');			// code book

//session_start(); // checar esta linea!
//session_regenerate_id(true);  // code book, Cannot modify header information - headers already sent by
							  // Cannot regenerate session id - session is not active in



//echo "Sesión Antigua: $id_sesion_antigua<br />";
//echo "Sesión Nueva  : $id_sesion_nueva<br />";
//echo 'sesion ahora: </br>';
//print_r($_SESSION);
//echo '</br>';

header("Location: /index.php");
?>