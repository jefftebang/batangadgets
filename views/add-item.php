<?php 
	require "../partials/template.php";

	function get_title(){
		echo "Add Item Form";
	}

	function get_body_contents(){
?>
	<h1 class="text-center py-5">ADD ITEM FORM</h1>

	<div class="container">
		<div class="col-lg-6 offset-lg-3">
			<form action="../controllers/add-item-process.php" method="POST" enctype="multipart/form-data">
			<div class="form-group">
				<label for="name">Item Name:</label>
				<input type="text" name="name" class="form-control">
			</div>
			<div class="form-group">
				<label for="price">Item Price:</label>
				<input type="number" name="price" class="form-control">
			</div>
			<div class="form-group">
				<label for="description">Item Description</label>
				<textarea name="description" class="form-control"></textarea>
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
					<option value="<?= $indiv_category['id']?>"><?= $indiv_category['name']?></option>
					<?php
					}

				 ?>
				</select>
			</div>
			<div class="text-center">
				<button type="submit" class="btn btn-info">Add Item</button>
			</div>
			</form>
		</div>
	</div>
<?php
	}

 ?>