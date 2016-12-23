<?php

/**
* Holds almost all session related methods for accessing and manipulating
*/
class Session
{
	
	function __construct()
	{

		// $this->session = $_SESSION;

	}

	private $session = null;
    
    public function start( $start_ob = false) {
        
        if (!$start_ob) 
            return session_start($duration);
            
       session_start();
       ob_start();
       
       return true;
        
    }
    
    public static function set_cookie($name, $value, $duration = 3600 * 24 * 30) {
        return setcookie($name, $value, $duration);
    }
    
    public function destroy($flush_ob = false) {
        
        if (!$flush_ob) {
            session_destroy();
            $_SESSION = [];
            
            return true;
        }
            
       session_destroy();
       $_SESSION = [];
       ob_end_clean();
       
        return true;
    }

	public function key_valid($cookie_key, $value) {

		if ( isset( $_COOKIE["$cookie_key"] ) && $_COOKIE["$cookie_key"] == $value ) {
			return true;
		}

		return false;

	}

	public function is_key_set($cookie_key) {
		return isset($_COOKIE["$cookie_key"]);
	}

	public function set($cookie_key, $value) {

		$_COOKIE["$cookie_key"] = $value;

		return $_COOKIE["$cookie_key"] == $value ? true : false ;

	}

	public function get($cookie_key, $value) {
setcookie($name);


		return isset($_COOKIE["$cookie_key"]) ? true : false ;

	}
}