<?php 

session_start();


echo $_SESSION['user'];
$_SESSION['lang'] = 'am';
define('ROOT', dirname(__FILE__));



set_include_path(get_include_path()
					.PATH_SEPARATOR.'application/components'
					.PATH_SEPARATOR.'application/controllers'
					.PATH_SEPARATOR.'application/models'
					.PATH_SEPARATOR.'application/views'
					);

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