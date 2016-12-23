<?php

/**
 * 
 */

require __DIR__ . '/../../dhtmlsql/library/dhtmlsql.php';

class Database extends DHTMLSQL
{
    
    
    function __construct()
    {
    	parent::__construct();
        
    }
    
    
    
    public function get_connection() {
        return $this->conn;
    }
    
	

}
