<?php
session_start();

if(!empty($_POST)) {
    require_once ('../../database/DBHelper.php');
    require_once ('../../database/utility.php');

	$action = getPost('action');
	$id = getPost('id');

	switch ($action) {
		case 'add':
			addToCart($id);
			break;
		case 'delete':
			deleteItem($id);
			break;
        case 'cancel':
            cancel($id);
            break;
	}
}

function deleteItem($id) {
	$cart = [];
	if(isset($_SESSION['cart'])) {
		$cart = $_SESSION['cart'];
	}
	for ($i=0; $i < count($cart); $i++) {
		if($cart[$i]['id'] == $id && $cart[$i]['num'] == 1) {
			array_splice($cart, $i, 1);
			break;
		} else if ($cart[$i]['id'] == $id && $cart[$i]['num'] > 1) {
            $cart[$i]['num']--;
			break;
        }
	}

	//update session
	$_SESSION['cart'] = $cart;
}

function addToCart($id) {
	$cart = [];
	if(isset($_SESSION['cart'])) {
		$cart = $_SESSION['cart'];
	}
	$isFind = false;
	for ($i=0; $i < count($cart); $i++) {
		if($cart[$i]['id'] == $id) {
			$cart[$i]['num']++;
			$isFind = true;
			break;
		}
	}
	if(!$isFind) {
		$product = executeSingleResult('select * from product where id = '.$id);
		$product['num'] = 1;
		$cart[] = $product;
	}

	//update session
	$_SESSION['cart'] = $cart;
}

function cancel($id) {
	
	//update session
	$_SESSION['cart'] = $cart;
}