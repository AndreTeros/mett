<?php
namespace Core;
class Preferences {
	private $props = array();
	private static $instance;

	private function __construct() {}
	private function __clone() {}
	private function __wakeup() {}

	public static function getInstance() {
		if(empty(self::$instance)) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	public function setProperty($key, $val){
		$this->props[$key] = $val;
	}

	public function getProperty($key){
		return $this->props[$key];
	}

}