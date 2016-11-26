<?php

class CartController implements IController {

	public function actionAdd() {
		$fc = FrontController::getInstance();

		if ($_POST) {
			$id = intval($_POST['id']);
			// $count[] = 0;
			$products = [];
			if (isset($_SESSION['products'])) {
				$products = $_SESSION['products'];
			} 
			
			if (array_key_exists($id,$products)) {
				$products[$id] ++;  
			} else {
				$products[$id] = 1;
			}	
			$_SESSION['products'] = $products;

			$count = CartModel::showCountInCart();
			$totalPrice = CartModel::showTotalPrice();
			echo $count.":".$totalPrice;		

		}
	}
}