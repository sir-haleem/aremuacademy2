<?php
	class Cloned {
		
		private static $_instance = null;
		
		public static $db = null;
		
		private $config = null;
		
		private static $db_params = null;
		
		public static $admin_params = null; 
		
		private static $security_params = null;
		
		protected static $dhtmlsql = null;
		
		public static $dir = null;
		
		public static $user = null;
		
		public static $post = null;
		
		public static $request = null;
		
		public static $view = null;
		
		public static $security = null;
		
		function __construct() {
			
			self::$_instance=$this;
			
			
		}
		
		public static function init_app(&$config) {
			
			self::$db_params = $config['database'];
			
			self::$admin_params = $config['admin'];
			
			self::$security_params = $config['security'];
			
			self::$dhtmlsql = Database::load();
			
			self::$view = new View();
			
			self::connect_db();
			
			self::$user = new User(self::load());
			
			
			self::$request = new Request( isset($_SESSION) ? $_SESSION : [], /* if session is set send it else send [] */
											$_GET, $_POST, $_COOKIE, $_REQUEST);
			
			self::$security = new Security();
			
			self::$post = new Post(self::load());
			
			self::$dir = __DIR__;
			
		}
		
		protected static function connect_db () {
			return self::$db = self::$dhtmlsql->connect(
													self::$db_params['host'], 
													self::$db_params['user'],
													self::$db_params['pwd'],
													self::$db_params['dbname']
												);
		}
		
		public static function load() {
			
			if ( self::$_instance === null )
				self::$_instance = new self();
			
			return self::$_instance;
		}
		
	}