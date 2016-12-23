<?php 

/**
 * 
 */
class Request 
{
    
    
    function __construct($session, $get, $post, $cookie, $request)
    {
        self::$session = $session;
        self::$get = $get;
        self::$post = $post;
        self::$cookie = $cookie;
        self::$request = $request;
        
        
    }
    
    private static $session = null;
    private static $get = null;
    private static $post = null;
    private static $cookie = null; 
    private static $request = null;
    
    public function get($name, $value = null) {
        
        if ($value === null) 
            return !isset(self::$get["$name"]) ? self::$get["$name"] : null ;
            
        self::$get["$name"] = $value;
        
        return self::$get["$name"];
        
    }
    
    public function post($name, $value = null) {
    	
        
        if ($value === null) 
            return isset(self::$post["$name"]) ? self::$post["$name"] : null ;
            
        self::$post["$name"] = $value;
        
        return self::$post["$name"];
        
    }
}
