<?php 
// if(preg_match('~/ebuy/~', $_SERVER['REQUEST_URI']))
// $serv = preg_replace('~/ebuy/~', '', $_SERVER['REQUEST_URI']);
// echo $serv;
// $arr = explode('/', $serv);
// print_r($arr);
// 
// error_reporting(0);

session_start();

set_include_path(get_include_path()
					.PATH_SEPARATOR.'application/components'
					.PATH_SEPARATOR.'application/controllers'
					.PATH_SEPARATOR.'application/models'
					.PATH_SEPARATOR.'application/views'
					);

define('ROOT', dirname(__FILE__));
// echo ROOT;
function __autoload($class) {
	try {
		if(!include_once($class.'.php'))
			throw new Exception("We can't find the file <a style='color:red'>$class.php</a><br>");
	} catch(Exception $e) {
		echo $e->getMessage();
	}
}

$front = FrontController::getInstance();
try {
	$front->route();
} catch(Exception $e) {
	echo $e->getMessage();
}
// echo $front->getBody();