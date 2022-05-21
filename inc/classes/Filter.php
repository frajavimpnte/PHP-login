<?php
// If there is no constant defined called __CONFIG__, do not load this file
if (!defined('__CONFIG__')) {
	exit('You do not hava a config file');
} 


class Filter
{
	public static function String( $string, $html=false) {
		if (!$html) {
			//$string = preg_replace("/(\n)/", "__BR__", $string);
			$string = filter_var( $string , FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
			//$string = str_replace("__BR__", "\r\n", $string);
		} else {
			$string = filter_var( $string , FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		}
		return $string;
	}

	public static function Email ( $email ) {
		return filter_var($email, FILTER_SANITIZE_EMAIL);
	}

	public static function URL ( $url ) {
		return filter_var( $url, FILTER_SANITIZE_URL);
	}

	public static function Int ( $integer ) {
		return (int) $integer = filter_vat( $integer , FILTER_SANITEIZE_NUMBER_INT);
	}

}

?>