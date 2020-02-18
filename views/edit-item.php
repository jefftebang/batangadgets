<?php 
	require "../partials/template.php";

	function get_title(){
		echo "Edit Item Form";
	}

	function get_body_contents(){
		require "../controllers/connection.php";

		$id = $_GET['id'];
		$item_query = "SELECT * FROM items WHERE id = $id";

		$item = mysqli_fetch_assoc(mysqli_query($conn, $item_query));
?>
	<h1 class="text-center py-5">EDIT ITEM FORM</h1>

	<div class="container">
		<div class="col-lg-6 offset-lg-3">
			<form action="../controllers/edit-item-process.php" method="POST" enctype="multipart/form-data">
			<div class="form-group">
				<label for="name">Item Name:</label>
				<input 
					type="text" 
					name="name" 
					class="form-control" 
					value="<?= $item['name']?>">
			</div>
			<div class="form-group">
				<label for="price">Item Price:</label>
				<input 
					type="number" 
					name="price" 
					class="form-control"
					value="<?= $item['price']?>"
					>
			</div>
			<div class="form-group">
				<label for="description">Item Description</label>
				<textarea 
					name="description" 
					class="form-control"><?= $item['description']?>
				</textarea>
			</div>
			<div class="form-group">
				<label for="image">Item Image:</label>
				<input type="file" name="image" class="form-control">
			</div>
			<div class="form-group">
				<label for="category">Item Category</label>
				<select name="category" class="form-control">
				<?php 
					require "../controllers/connection.php";

					$category_query = "SELECT * FROM categories";
					$categories = mysqli_query($conn, $category_query);

					foreach($categories as $indiv_category){
					?>
					<option value="<?= $indiv_category['id']?>"
					<?php 
						echo $indiv_category['id'] == $item['category_id'] ? "selected" : ""
					 ?>

					><?= $indiv_category['name']?></option>
					<?php
					}

				 ?>
				</select>
			</div>
			<input type="hidden" name="id" value="<?= $id ?>">
			<div class="text-center">
				<button type="submit" class="btn btn-info">Edit Item</button>
			</div>
			</form>
		</div>
	</div>
<?php
	}

 ?>