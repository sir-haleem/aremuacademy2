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
            return session_start();
            
       session_start();
       ob_start();
       
       return true;
        
    }
    
    public static function create_cookie($name, $value = '', $duration = 3600 * 24 * 30){
    	
    	if (isset($name) && $name !== '') 
    		return setcookie($name, $value, $duration);
    	
    	return false;
    	
    }
    
    public static function set_cookie($name, $value, $duration = 3600 * 24 * 30) {
    	
    	
    	if (is_string($name))
        	return setcookie($name, $value, $duration);
    	
    	return false;
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

	public function key_valid($session_key, $value) {

		if ( isset( $_SESSION["$session_key"] ) && $_SESSION["$session_key"] == $value ) {
			return true;
		}

		return false;

	}

	public function is_key_set($session_key) {
		return isset($_SESSION["$session_key"]);
	}

	public function set($session_key, $value) {

		$_SESSION[$session_key] = $value;

		return $_SESSION[$session_key] === $value ? true : false ;

	}

	public function get($session_key) {
		$session = $_SESSION["$session_key"];
		return isset($session) ? $session : false ;

	}
}