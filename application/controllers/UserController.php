<?php

class UserController implements IController {

	public function actionProfile() {
		$fc = FrontController::getInstance();

		$params = $fc->getParams();


		$module = new Modules();

		// $categories = new Categories();//create categories object
		$mnmenu = new Menu(); //create products object
		$menu = $mnmenu->getMainMenu();
		


		include_once(ROOT.'/application/views/home/index.php');
		
		
		
	}

	public function actionLogout() {
		$fc = FrontController::getInstance();

		$params = $fc->getParams();


		$module = new Modules();

		// $categories = new Categories();//create categories object


		if(isset($_SESSION['user'])) {
			unset($_SESSION['user']);
			header("Location: /encodingArt/");
		}else {
			header("Location: /encodingArt/");
		}
		
		
		
	}
	public function actionLogin() {
		$fc = FrontController::getInstance();

		$params = $fc->getParams();

		if(isset($_SESSION['user'])) {
			header("Location: /encodingArt/");
		}
		$user = new User();
		if($_POST) {
			$username = $_POST['login'];
			$password = $_POST['password'];
			$errors = false;

			if(!$user->checkPassword($password)) {
				$errors[0][] = "parol karche";
				$errors[1][] = "parol karche";
				$errors[2][] = "parol karche";
			}
			if(!$user->checkUsername($username)) {
				$errors[0][] = "login@ karche";
				$errors[1][] = "login@ karche";
				$errors[2][] = "login@ karche";
			}

			$userId = $user->checkUserData($username, $password);

			if ($userId == false) {
	                
				$errors[2][] = "Login or Password are wrong";
				$errors[1][] = "Логин или пароль введен неверно";
				$errors[0][] = "Մուտքանունը կամ գաղտնաբառը սխալ է";
	        }
			
			$jscode = json_encode($errors);
			if(isset($errors)) {
				$myfile = fopen("application/components/usererrors.json", "w");
				fwrite($myfile, $jscode);
				fclose($myfile);	
			}
			if(!$errors) {

	                $user->doAuth($userId);

	                header("Location: /encodingArt/user/profile");
	            
			}
			
		}
	}

	public function actionRegister() {
		$fc = FrontController::getInstance();

		$params = $fc->getParams();

		if(isset($_SESSION['user'])) {
			header("Location: /encodingArt/");
		}
		$user = new User();
		if($_POST) {
			$username = $_POST['login'];
			$password = $_POST['password'];
			$errors = false;
			if($user->checkUsernameExists($username)) {
				$errors[0][] = "usnamae ka";
				$errors[1][] = "usnamae est";
				$errors[2][] = "username exists";
			}
			if(!$user->checkPassword($password)) {
				$errors[0][] = "parol karche";
				$errors[1][] = "parol karche";
				$errors[2][] = "parol karche";
			}
			if(!$user->checkUsername($username)) {
				$errors[0][] = "login@ karche";
				$errors[1][] = "login@ karche";
				$errors[2][] = "login@ karche";
			}
			$jscode = json_encode($errors);
			if(isset($errors)) {
				$myfile = fopen("application/components/usererrors.json", "w");
				fwrite($myfile, $jscode);
				fclose($myfile);	
			}
			if(!$errors) {
				$user->registerNewUser($username,$password);
			}
			
		}
		
		// include_once(ROOT.'/application/views/home/index.php');
		
		
		
	}
}