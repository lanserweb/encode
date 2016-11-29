<?php

class User extends Database {
	public function getMenu() {
		$sql = "SELECT * FROM menu";
		$res = parent::$db->query($sql);
		if(!$res) 
			throw new Exception("Error! Can't connect to MySQL Database");
		
		$arr =Array();
		$i = 0;
		while($obj = $res->fetch(PDO::FETCH_OBJ)) {
			$arr[$i]['name'] = $obj->name; 
			$arr[$i]['id'] = $obj->id; 
			$arr[$i]['URIname'] = $obj->URIname; 
			$i++;
		}//while loop End

		return $arr;
	}//getMenu Method End

	public function registerNewUser($username,$password) {
		$sql = 'INSERT INTO users (username, password) VALUES (:username, :password)';
        $result = parent::$db->prepare($sql);
        $result->bindParam(':username', $username, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->execute();
	}

	public function checkUserData($username,$password) {
		$sql = "SELECT * FROM users WHERE username = :username AND password = :password";
		$res = parent::$db->prepare($sql);
		$res->bindparam(':username',$username,PDO::PARAM_STR);
        $res->bindParam(':password', $password, PDO::PARAM_STR);
		$res->execute();

		$user = $res->fetch();
		if ($user)
			return $user['id'];
		else
			return false;
	}
	public function doAuth($userId) {
		 $_SESSION['user'] = $userId;
	}

	public function checkUsernameExists($username) {
		$sql = "SELECT COUNT(*) FROM users WHERE username = :username";
		$res = parent::$db->prepare($sql);
		$res->bindparam(':username',$username,PDO::PARAM_STR);
		$res->execute();
		if ($res->fetchColumn())
			return true;
		else
			return false;
	}
	public function checkUsername($username) {
		if(strlen($username) < 4)
			return false;
		else
			return true;
	}
	public function checkPassword($pass) {
		if(strlen($pass) < 4)
			return false;
		else
			return true;
	}

}