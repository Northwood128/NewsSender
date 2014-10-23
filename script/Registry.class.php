<?php
/**
 * 
 */
class Registry {
	private $_registry =array();
	private static $_instance = null;
	
	private function __construct() {}
	private function __clone(){}
	
	public static function getInstance() {
     if(self::$_instance === null) {
        self::$_instance = new Registry();
     }
 
     return self::$_instance;
  	}
	public function set($key, $value) {
      if (isset($this->_registry[$key])) {
         throw new Exception("There is already an entry for key " . $key);
      }
 
      $this->_registry[$key] = $value;
   	}
 
   	public function get($key) {
      if (!isset($this->_registry[$key])) {
         throw new Exception("There is no entry for key " . $key);
      }
 
      return $this->_registry[$key];
	}
}
?>