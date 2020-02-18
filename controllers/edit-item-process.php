<?php 

	require "connection.php";

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

	if($_FILES['image']['size']>0 && !in_array($file_ext, $file_types)){
		$errors++;
	}

	if($errors > 0){
		return false;
	}else{
		return true;
	}
}

if(validateForm()){
	$id = $_POST['id'];
	$name = $_POST['name'];
	$price = $_POST['price'];
	$description = $_POST['description'];
	$category_id = $_POST['category'];
	$imgPath = "";

	$image_query = "SELECT imgPath FROM items WHERE id = $id";

	$image = mysqli_fetch_assoc(mysqli_query($conn, $image_query));

	// check if the user uploads an image.
	// if not, get the old value and use it
	// if yes, get the new value
	if($_FILES['image']['name']==""){
		$imgPath = $image['imgPath'];
	}else{
		$destination = "../assets/images/";
		$file_name = $_FILES['image']['name'];

		move_uploaded_file($_FILES['image']['tmp_name'], $destination.$file_name);

		$imgPath = $destination.$file_name;
	}

	$update_query = "UPDATE items SET name = '$name', price = $price, description = '$description', imgPath = '$imgPath', category_id = $category_id WHERE id = $id";

	$result = mysqli_query($conn, $update_query);

	header("Location: ../views/catalog.php");
}else{
	header("Location: ". $_SERVER['HTTP_REFERER']);
}


 ?>