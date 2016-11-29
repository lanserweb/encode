<?php

class IndexController implements IController {

	public function actionIndex() {
		$fc = FrontController::getInstance();

		$params = $fc->getParams();


		$module = new Modules();

		// $categories = new Categories();//create categories object
		$mnmenu = new Menu(); //create products object
		$menu = $mnmenu->getMainMenu();

		

		include_once(ROOT.'/application/views/home/index.php');
		
		
		
	}
}