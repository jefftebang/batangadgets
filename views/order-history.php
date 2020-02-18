<?php 
	require "../partials/template.php";

	function get_title(){
		echo "History";
	}
	function get_body_contents(){
		require "../controllers/connection.php";
?>

	<h1 class="text-center">Order History</h1>
	<hr class="border-dark">
<div class="col-lg-10 offset-lg-1">
	<table class="table table-striped table-bordered">
		<thead>
			<tr class="text-center table-active">
				<th>Order Number</th>
				<th>Item</th>
				<th>Total</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				$userId = $_SESSION ['user']['id'];
				$order_query = "SELECT * FROM orders WHERE user_id = $userId";

				$orders = mysqli_query($conn, $order_query);

				foreach($orders as $indiv_order){
			?>

			<tr>
				<td class="text-center"><?php echo $indiv_order['id'] ?></td>
				<td>
					<?php 
					$orderId = $indiv_order['id'];
					$items_query = "SELECT * FROM items JOIN item_order ON(items.id = item_order.item_id) WHERE item_order.order_id=$orderId";

					$items = mysqli_query($conn, $items_query);

					foreach ($items as $indiv_item){
				?>
					<span><?php echo $indiv_item['name']?></span><br>

				<?php  
					}
				?>
					</td>
					<td class="text-center">$<?php echo number_format($indiv_order['total'], 2) ?></td>
			</tr>

			<?php 
				}
			?>
		</tbody>
	</table>
</div>	
<?php 
	}
?>