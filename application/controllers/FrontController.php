<?php 
// if(preg_match('~/ebuy/~', $_SERVER['REQUEST_URI']))
// $serv = preg_replace('~/ebuy/~', '', $_SERVER['REQUEST_URI']);
// echo $serv;
// $arr = explode('/', $serv);
// print_r($arr);
// 

class FrontController {
	protected $_controller,$_action,$_params,$_body;
	static private $_instance;

	public static function getInstance() {
		if(!self::$_instance)
			self::$_instance = new self();
		return self::$_instance;
	}

	private function __clone() {}
	private function __construct() {
		$request = $_SERVER['REQUEST_URI'];
		if(preg_match('~/encodingArt/~',$request))
			$request = preg_replace('~/encodingArt/~', '',$request);
		$splits = explode('/', trim($request,'/'));
		// print_r($splits);
		$this->_controller = !empty($splits[0]) ? ucfirst($splits[0]).'Controller' : 'IndexController';
		$_SESSION['currentpage'] = $this->_controller;
		$this->_action = !empty($splits[1]) ? 'action'.ucfirst($splits[1]) : 'actionIndex';
		if(!empty($splits[2])) {
			try {
				$keys = $values = [];
				for($i=2;$i<count($splits);$i++) {
					
					if($i%2 == 0) {
						$keys[] = $splits[$i];
						if(empty($splits[$i+1]))
						throw new Exception("There's not a value for the key <a style='color:red'>$splits[$i]</a><br>please use style like this :: page/4");
					} else {
						$values[] = $splits[$i];
					}
				}
				$this->_params =(object) array_combine($keys, $values);
			}catch(Exception $e) {
				echo $e->getMessage();
			}
		}

	}
	public function route() {
		if(class_exists($this->getController())) {
			$rc = new ReflectionClass($this->getController());
			if($rc->implementsInterface('IController')) {
				if($rc->hasMethod($this->getAction())) {
					$controller = $rc->newInstance();
					$method = $rc->getMethod($this->getAction());
					$method->invoke($controller);
				} else {
					throw new Exception("Method <a style='color:red;'>$this->_action</a> is not registered in class <a style='color:red;'>$this->_controller</a>");
				}
			} else {
				throw new Exception("Class <a style='color:red;'>$this->_controller</a> doesn't implement IController");
			}

		} else {
			throw new Exception("Class <a style='color:red;'>$this->_controller</a> doesn't exists");
		}
	}

	public function getController() {
		return $this->_controller;
	}

	public function getAction() {
		return $this->_action;
	}

	public function getParams() {
		return $this->_params;
	}

	// public function setBody($body) {
	// 	 $this->_body = $body;
	// }
	// public function getBody() {
	// 	 return $this->_body;
	// }


}