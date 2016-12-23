<?php 
    
    /**
     * FileHelper
     */
    class File
    {
                
        function __construct()
        {
            
        }
        
        public static function get_contents ($filename) {
            
            if (!static::exists($filename))
                return false;
                
            $content = file_get_contents($filename);
            
            return $content;
            
        }
        
        public static function exists($filename) {
            
            return file_exists($filename);
            
        }
        
        
        
    }
    