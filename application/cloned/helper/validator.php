<?php


class Validator {
	
	const sanitizers = array(
			'EMAIL' => FILTER_SANITIZE_EMAIL,
			'STRING' => FILTER_SANITIZE_STRING,
			'SPECIAL_CHARS' => FILTER_SANITIZE_SPECIAL_CHARS,
			'STRIPPED' => FILTER_SANITIZE_STRIPPED,
			'ENCODED' => FILTER_SANITIZE_ENCODED,
			'MAGIC_QUOTES' => FILTER_SANITIZE_MAGIC_QUOTES,
			'NUMBER_FLOAT' => FILTER_SANITIZE_NUMBER_FLOAT,
			'NUMBERS_INT' => FILTER_SANITIZE_NUMBER_INT,
			'URL' => FILTER_SANITIZE_URL,
			'FULL_SPECIAL_CHARS' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
	);
	
	const validators = array(
			'EMAIL' => FILTER_VALIDATE_EMAIL,
			'BOOLEAN' => FILTER_VALIDATE_BOOLEAN,
			'DOMAIN' => FILTER_VALIDATE_DOMAIN,
			'FLOAT' => FILTER_VALIDATE_FLOAT,
			'INT' => FILTER_VALIDATE_INT,
			'IP' => FILTER_VALIDATE_IP,
			'REGEXP' => FILTER_VALIDATE_REGEXP,
			'URL' => FILTER_VALIDATE_URL,
			'MAC' => FILTER_VALIDATE_MAC
	);
	
	
	function __construct() {
		
	}
	
	public static function is_empty($var) {
		if( empty($var) || $var == NULL || (is_array($var) && array_sum($array) < 1) || $var == "" ) 
			return true;
		
		return false;
	}
	
	public static function sanitize ($str, $type, $options = []) {
		
		if( in_array($type, self::sanitizers, true) ) {
			if (isset($options))
				return filter_var($str, $type, $options);
			
			return filter_var($str, self::sanitizers[$type]);
		}
		
	}
	
	public static function validate ($str, $type, $options = []) {
	
		if( in_array($type, self::validators, true) ) {
			if (isset($options))
				return filter_var($str, $type, $options);
					
				return filter_var($str, self::validators[$type]);
		}
	
	}
	
	public static function email($var, $options = []) {
		
		if( !self::is_empty($var) && (self::sanitize($var, FILTER_SANITIZE_URL) !== false || NULL ) )
			return self::validate($var, FILTER_VALIDATE_EMAIL, $options);
		
		return false;
		
	}
	
	public static function sanitize_string($var) {
	
		if( !self::is_empty($var) )
			return self::sanitize($var, FILTER_SANITIZE_STRING);
	
		return false;
	}
	
	public static function sanitize_special_chars($var, $special_chars = false) {
	
		if( !self::is_empty($var) && $special_chars == false )
			return self::sanitize($var, FILTER_SANITIZE_SPECIAL_CHARS);
		
		
		if( !self::is_empty($var) && $special_chars )
			return self::sanitize($var, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		
		return false;
	}
	
	public static function sanitize_magic_quotes($var) {
		
		if( self::is_empty($var) )
			return self::sanitize($var, FILTER_SANITIZE_MAGIC_QUOTES);
		
		return false;
		
	}
	
}