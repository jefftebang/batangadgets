<?php 
	session_start();

	$pusongbato = $_GET['id'];

	unset($_SESSION['cart'][$pusongbato]);

	header("Location: ". $_SERVER['HTTP_REFERER']);

 ?>