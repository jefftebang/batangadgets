<?php 
	require "connection.php";

	$id = $_GET['id'];

	$delete_item_query = "DELETE FROM items WHERE id = $id";

	$result = mysqli_query($conn, $delete_item_query);

	header("Location: ". $_SERVER['HTTP_REFERER']);

?>