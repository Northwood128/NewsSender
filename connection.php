<?php 
	class Connection {
		public $dns = "mysql:host=localhost;dbname=";
		public $masterU;
		public $masterP;
		public $port;
		
		protected static $db;
		
		private function __construct($dns, $masterU, $masterP)
		{
			
		}
	}
?>