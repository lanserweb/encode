<?php

class Modules extends Database {
	public function isActive($id) {
		$sql = "SELECT * FROM modules WHERE id=$id";
		$res = parent::$db->query($sql);
		if(!$res) 
			throw new Exception("Error! Can't connect to MySQL Database");
		
		$arr =Array();
		
		$obj = $res->fetch(PDO::FETCH_OBJ);
			$arr['id'] = $obj->id; 
			$arr['isActive'] = $obj->isActive; 
		

		if($arr['isActive']==1) 
			return true;
		else 
			return false;
	}//getMenu Method End

}