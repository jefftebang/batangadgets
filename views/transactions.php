<?php  
	require "../partials/template.php";

	function get_title(){
		echo "Transactions";
	}

	function get_body_contents(){
	require "../controllers/connection.php";
?>
	<h1 class="text-center py-5">Transactions</h1>
	<div class="col-lg-10 offset-lg-1">
		<table class="table table-striped">
			<thead>
				<tr class="text-center">
					<th>Order Number</th>
					<th>Order Details</th>
					<th>Payment</th>
					<th>Status</th>
				</tr>
			</thead>
		</table>
	</div>

<?php
	}
?>