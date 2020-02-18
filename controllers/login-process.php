<?php 
	require "connection.php";
	session_start();
	// capture the data from the form
	$email = $_POST['email'];
	$password = $_POST['password'];


	// search if the email is registered
	$user_query = "SELECT * FROM users WHERE email = '$email'";
	$user_info = mysqli_query($conn, $user_query);
	$user = mysqli_fetch_assoc($user_info);


	// if the result is > 0, verify the password;
	if(mysqli_num_rows($user_info)>0){
		if(password_verify($password, $user['password'])){
			$_SESSION['user']= $user;
		}else{
			die("login_failed");
		}
	}else{
		die("login_failed");
	}

?>