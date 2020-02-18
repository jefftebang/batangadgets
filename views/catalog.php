<?php 
	require "../partials/template.php";

	function get_title(){
		echo "Catalog";
	}

	function get_body_contents(){
	// require connection
	require "../controllers/connection.php";
?>
	<h1 class="text-center py-5">Gadgets</h1>

	<!-- Item List -->
	<div class="row">
		<?php  
			$items_query = "SELECT * FROM items";
			$items = mysqli_query($conn, $items_query);
			// var_dump($items);
			// die();
			foreach ($items as $indiv_item){
			?>
			<div class="col-lg-4 py-2">
				<div class="card">
					<img class="card-img-top" height="295px" src="<?php echo $indiv_item['imgPath'] ?>" alt="">
					<div class="card-body">
						<h4 class="card-title"><?= $indiv_item['name']?></h4>
						<p class="card-text">Price: $<?= number_format($indiv_item['price'], 2)?></p>
						<p class="card-text">Description: <?= $indiv_item['description']?></p>
						<p class="card-text">Category: 
						<?php 
							$catId = $indiv_item['category_id'];

							$category_query = "SELECT * FROM categories WHERE id = $catId";
							$category = mysqli_fetch_assoc(mysqli_query($conn, $category_query)); 

							echo $category['name'];
						
						?>
						</p>
					</div>
					<div class="card-footer text-center">
						<a href="../controllers/delete-item-process.php?id=<?php echo $indiv_item['id']?>" class="btn btn-danger">Delete Item</a>
						<a href="edit-item.php?id=<?php echo $indiv_item['id']?>" class="btn btn-success">Edit Item</a>
					</div>
					<div class="card-footer text-center">
						<!-- <form action="../controllers/add-to-cart-process.php" method="POST"> -->
							<!-- <input type="hidden" name="id" value=""> -->
							<input type="number" name="cart" class="form-control text-center" value="1">
							<button type="button" class="btn btn-primary addToCart my-2" data-id="<?php echo $indiv_item['id']?>">Add To Cart</button>
						<!-- </form> -->
					</div>
				</div>
			</div>
			<?php
			}
		?>
	</div>
	<script type="text/javascript" src="../assets/scripts/add-to-cart.js"></script>
<?php
	}
 ?>