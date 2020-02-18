<?php

	session_start(); 

	$id = $_POST['id'];
	$quantity = $_POST['cart'];

	// Check if this is the first time that the user adds to cart.
	// if yes, create the session-cart variable
	// if not, get the session-cart variable's old value and add the new quantity
	if(isset($_POST['fromCartPage'])){
		$_SESSION['cart'][$id]= $quantity;
		header("Location: ".$_SERVER['HTTP_REFERER']);
	}else{
		if(isset($_SESSION['cart'][$id])){
			$_SESSION['cart'][$id] += $quantity;
		}else{
			$_SESSION['cart'][$id] = $quantity;
		}		
	}


	function getCartSum(){
		return array_sum($_SESSION['cart']);
	}

	// this is what we want to get in our addtocart.js
	echo getCartSum();

	// var_dump($_SESSION['cart']);
	

 ?>