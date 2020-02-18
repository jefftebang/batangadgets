<?php  
	require "connection.php";

	$address1 = $_POST['address1'];
	$address2 = $_POST['address2'];
	$city = $_POST['city'];
	$zipCode = $_POST['zipCode'];
	$user_id = $_POST['user_id'];
	$isPrimary = 0;

	// create your validations later
	$address_query = "INSERT INTO addresses (address1, address2, city, zipCode, isPrimary, user_id) VALUES ('$address1', '$address2', '$city', $zipCode, $isPrimary, $user_id)";

	$result = mysqli_query($conn, $address_query);

	// var_dump($address_query);

	header("Location: ". $_SERVER['HTTP_REFERER']);
?>