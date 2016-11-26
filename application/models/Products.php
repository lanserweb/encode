<?php

class Products extends Model {
	public function showLastProducts() {
		$sql = "SELECT * FROM products ORDER BY id DESC LIMIT 6";
		$res = parent::$db->query($sql);
		if(!$res) 
			throw new Exception("Error! Can't connect to MySQL Database");
		$arr =Array();
		$i = 0;
		while($obj = $res->fetch(PDO::FETCH_OBJ)) {
			$arr[$i]['name'] = $obj->name; 
			$arr[$i]['id'] = $obj->id; 
			$arr[$i]['price'] = $obj->price; 
			$arr[$i]['oldprice'] = $obj->oldprice; 
			$arr[$i]['manufacture'] = $obj->manufacture; 
			$arr[$i]['showOldPrice'] = $obj->showOldPrice; 
			$arr[$i]['image'] = $obj->image; 
			$arr[$i]['category'] = $obj->category;
			$i++;
		}

		return $arr;

	}

	public function showRecomendedProducts() {
		$sql = "SELECT * FROM products WHERE is_recomended=1 ORDER BY id DESC LIMIT 3";
		$res = parent::$db->query($sql);
		if(!$res) 
			throw new Exception("Error! Can't connect to MySQL Database");
		$arr =Array();
		$i = 0;
		while($obj = $res->fetch(PDO::FETCH_OBJ)) {
			$arr[$i]['name'] = $obj->name; 
			$arr[$i]['id'] = $obj->id; 
			$arr[$i]['price'] = $obj->price; 
			$arr[$i]['oldprice'] = $obj->oldprice; 
			$arr[$i]['showOldPrice'] = $obj->showOldPrice; 
			$arr[$i]['image'] = $obj->image; 
			$arr[$i]['category'] = $obj->category;
			$i++;
		}

		return $arr;

	}

}