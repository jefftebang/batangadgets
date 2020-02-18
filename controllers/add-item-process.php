<?php

	require "connection.php";

$name = $_POST['name'];
$price = $_POST['price'];
$description = $_POST['description'];
$category_id = $_POST['category'];

// image handling
$image = $_FILES['image'];
$file_types = ["jpg", "jpeg", "png", "gif", "svg", "webp", "bitmap", "tiff", "tif"];
$file_ext = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));

function validateForm(){
	$name = $_POST['name'];
	$price = $_POST['price'];
	$description = $_POST['description'];
	$category_id = $_POST['category'];

	// image handling
	$image = $_FILES['image'];
	$file_types = ["jpg", "jpeg", "png", "gif", "svg", "webp", "bitmap", "tiff", "tif"];
	$file_ext = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));

	$errors = 0;

	if(!isset($name) || $name == ""){
		$errors++;
	}

	if(!isset($price) || $price < 0){
		$errors ++;
	}

	if(!isset($description) || $description == ""){
		$errors ++;
	}

	if(!isset($category_id) || $category_id==""){
		$errors ++;
	}

	if(!isset($image) || $image == ""){
		$errors++;
	}

	if(!in_array($file_ext, $file_types)){
		$errors++;
	}

	if($errors > 0){
		return false;
	}else{
		return true;
	}
}

if(validateForm()){
	$destination = "../assets/images/";
	$fileName = $image['name'];

	$imgPath = $destination.$fileName;
	move_uploaded_file($image['tmp_name'], $imgPath);

	$add_item_query = "INSERT INTO items (name, price, description, imgPath, category_id) VALUES ('$name', $price, '$description', '$imgPath', $category_id)";

	$new_item = mysqli_query($conn, $add_item_query);

	header("Location: ../views/catalog.php");
}else{
	header("Location: ". $_SERVER['HTTP_REFERER']);
}

?>