<?php 
	require "../partials/template.php";

	function get_title(){
		echo "Cart";
	}

	function get_body_contents(){
		require "../controllers/connection.php";
?>
<!-- Paypal -->
	<h1 class="text-center py-5">CART PAGE</h1>
	<hr>

	<div class="col-lg-10 offset-lg-1">
		<table class="table table-striped">
			<thead>
				<tr class="text-center">
					<th>Item</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Subtotal</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$total = 0;

					if(isset($_SESSION['cart'])){
						foreach($_SESSION['cart'] as $itemId => $quantity){
							$item_query = "SELECT * FROM items WHERE id = $itemId";

							$indiv_item = mysqli_fetch_assoc(mysqli_query($conn, $item_query));

							$subtotal = $indiv_item['price']*$quantity;

							$total += $subtotal;
					?>
					<tr>
						<td><?php echo $indiv_item['name']?></td>
						<td class="text-center">$<?php echo number_format($indiv_item['price'], 2) ?></td>
						<td class="text-center">
							<span class="spanQ"><?php echo $quantity ?></span>
							<form action="../controllers/add-to-cart-process.php" method="POST" class="d-none">
								<input type="hidden" name="id" value="<?php echo $itemId?>">
								<input type="hidden" name="fromCartPage" value="fromCartPage">
								<input type="number" class="form-control" name="cart" value="<?php echo $quantity ?>" data-id="<?php echo $itemId?>">
							</form>
							</td>
						<td class="text-center">$<?php echo number_format($subtotal, 2) ?></td>
						<td class="text-center">
							<a href="../controllers/remove-from-cart-process.php?id=<?php echo $itemId?>" class="btn btn-danger">Remove From Cart</a>
						</td>
					</tr>
					<?php
						}
					}
				?>
				<tr>
					<td></td>
					<td></td>
					<td class="text-right">Total:</td>
					<td id="totalPayment" class="text-center">$<?php echo number_format($total, 2) ?>
						
					</td>
					<td class="text-center">
						<a class="btn btn-danger" href="../controllers/empty-cart-process.php">Empty Cart</a>
					</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td class="text-center">
						<form action="../controllers/checkout-process.php" method="POST">
							<input type="hidden" name="totalPayment" value="<?php echo $total?>">
							<input type="hidden" name="cod" value="total">
							<button type="submit" class="btn btn-info">Pay via Cash</button>
						</form>
					</td>
					<td><div id="paypal-button-container"></div></td>
					<td></td>
				</tr>
			</tbody>
		</table>
	</div>
<script src="../assets/scripts/update-cart.js"></script>
<script
    src="https://www.paypal.com/sdk/js?client-id=ARzvSS3OLlimxiwM6SGQmGTNRS5yCubsIQ5RzIOS6BgmO1qE8k41JKgLZ7RvySKwa9sxFfZ8TfYePccL"> // Required. Replace SB_CLIENT_ID with your sandbox client ID.
  </script>

  <script>

	let totalPayment = document.getElementById('totalPayment').textContent.split(',').join("");

    paypal.Buttons({
    	 createOrder: function(data, actions) {
      // This function sets up the details of the transaction, including the amount and line item details.
      return actions.order.create({
        purchase_units: [{
          amount: {
            value: totalPayment
          }
        }]
      });
    },
    onApprove: function(data, actions) {
      // This function captures the funds from the transaction.
      return actions.order.capture().then(function(details) {
        // This function shows a transaction success message to your buyer.
        let data = new FormData;
        data.append('totalPayment', totalPayment);
        data.append('fromPaypal', 'fromPaypal');

        fetch("../controllers/checkout-process.php", {
        	method:"POST",
        	body:data
        }).then(res=>res.text())
        .then(res=>{
        	console.log(res);
        	alert('Transaction completed by ' + details.payer.name.given_name);
        })

        
      });
    }
    }).render('#paypal-button-container');
    // This function displays Smart Payment Buttons on your web page.
  </script>
<?php
	}
 ?>