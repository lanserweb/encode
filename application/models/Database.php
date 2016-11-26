<?php

class Database {
	static protected $db;
	function __construct() {
		$config = include(ROOT.'/application/components/config.php');
		try {
			self::$db = new PDO('mysql:host='.$config['hostname'].';dbname='.$config['dbname'], $config['username'], $config['userpass']);
			if(!self::$db) 
				throw new Exception("MySQL connect error");
		} catch(Exception $e) {
			echo $e->getMessage();
		}
	}
	function __destruct() {
		self::$db=null;
	}	
}