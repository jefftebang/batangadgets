<?php  
	require "connection.php";

	$contactNo = $_POST['contactNo'];
	$user_id = $_POST['user_id'];
	$isPrimary = 0;

	// create your validations later
	$contact_query = "INSERT INTO contacts (contactNo, user_id, isPrimary) VALUES ('$contactNo', $user_id, $isPrimary)";

	$result = mysqli_query($conn, $contact_query);

	// var_dump($contact_query);

	header("Location: ". $_SERVER['HTTP_REFERER']);
?>