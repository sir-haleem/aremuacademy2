<?php   

    /**
     * 
     */
    class View 
    {
        
        function __construct()
        {
            
        }
        
        public static function render($view_name, $params = [],  $layout = "main" ) {
            
            $filename = $_SERVER['DOCUMENT_ROOT'] . '/../app/views/'. $view_name . '.php';
            
            $view_path = $filename;
            
            $layout_path = $_SERVER['DOCUMENT_ROOT'] . '/../app/views/layouts/'. $layout . '.php';
            
            
            
            return require($layout_path);
            
        }
    }
    