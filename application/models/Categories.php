<?php

class Categories extends Model {
	public function showCategories() {
		$sql = "SELECT * FROM categories";
		$res = parent::$db->query($sql);
		if(!$res) 
			throw new Exception("Error! Can't connect to MySQL Database");
		$arr =Array();
		$i = 0;
		while($obj = $res->fetch(PDO::FETCH_OBJ)) {
			$arr[$i]['name'] = $obj->name; 
			$arr[$i]['id'] = $obj->id;
			$i++;
		}

		return $arr;

	}
	
	function __destruct() {
		parent::__destruct();
	}

}