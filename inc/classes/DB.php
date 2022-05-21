<?php 
// If there is no constant defined called __CONFIG__, do not load this file
if (!defined('__CONFIG__')) {
	exit('You do not hava a config file');
} 

// DB singleton
class DB {
	protected static $con;

	private function __construct() {
		try {
			self::$con = new PDO( 'mysql:charset=utf8mb4;host=localhost;port=3306;dbname=packpub_login_php_db', 'fjmpMacHome', 'fjmp#Mo1' );
			self::$con->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			self::$con->setAttribute( PDO::ATTR_PERSISTENT, false );
		} catch ( PDOException $e) {
			echo "Could not connect to database.\r\n"; exit;
		}
	}

	public static function getConnection() {
		// if this instance was not been started, start it
		if ( !self::$con ) {
			$con = new DB();
		}
		return self::$con;
	}
}
?>