<?php

class CartModel extends Model {
	public static function showCountInCart() {
		$count = 0;
		foreach ($_SESSION['products'] as $id => $quantity) {
			$count = $count + $quantity;
		}

		return $count;

	}
	public static function showTotalPrice() {
		
		$sql = "SELECT * FROM products";
		$db = new PDO('mysql:host=localhost;dbname=test', 'root', '');
		$res = $db->query($sql);
		if(!$res) 
			throw new Exception("Error! Can't connect to MySQL Database");
		$arr =Array();
		$i = 0;
		while($obj = $res->fetch(PDO::FETCH_OBJ)) {
			$arr[$i]['id'] = $obj->id; 
			$arr[$i]['price'] = $obj->price; 
			$i++;
		}
		$count = 0;
		$totalPrice = 0;
		foreach ($arr as $product) {
			foreach ($_SESSION['products'] as $id => $quantity) {
				if ($id == $product['id']) {
					$count = $count + $quantity;
					$totalPrice += $count*$product['price'];
				}
			}
		}

		return $totalPrice;


	}

}