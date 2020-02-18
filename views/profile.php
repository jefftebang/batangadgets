<?php 
	require "../partials/template.php";

	function get_title(){
		echo "Profile";
	}

	function get_body_contents(){
	require "../controllers/connection.php";

?>

	<h1 class="text-center py-5">Profile Page</h1>
	<div class="container">
		<!-- Address -->
		<div class="row">
			<div class="col-lg-3">

			</div>
			<div class="col-lg-7 offset-lg-2">
				<h3>Addresses:</h3>
				<ul>
					<?php 
						$user_id = $_SESSION['user']['id'];
						$address_query = "SELECT * FROM addresses WHERE user_id = '$user_id'";
						$addresses = mysqli_query($conn, $address_query);

						foreach($addresses as $indiv_address){
					?>
						<li>
							<?php echo $indiv_address['address1'] . ", " . $indiv_address['address2'] .
							"<br>" . $indiv_address['city'] . "<br>" . $indiv_address['zipCode']?>
						</li>
					<?php
						}
					?>
				</ul>

				<form action="../controllers/add-address-process.php" method="POST">
					<div class="form-group">
						<label for="address1">Address 1:</label>
						<input type="text" name="address1" class="form-control">
					</div>
					<div class="form-group">
						<label for="address2">Address 2:</label>
						<input type="text" name="address2" class="form-control">
					</div>
					<div class="form-group">
						<label for="city">City:</label>
						<input type="text" name="city" class="form-control">
					</div>
					<div class="form-group">
						<label for="zipCode">Zip Code:</label>
						<input type="text" name="zipCode" class="form-control">
					</div>
					<input type="hidden" name="user_id" value="<?php echo $user_id?>">
					<button class="btn btn-success my-2" type="submit">Add Address</button>
				</form>
			</div>
		</div>
		<hr>
		<!-- Contacts -->
		<div class="row my-5">
			<div class="col-lg-3">

			</div>
			<div class="col-lg-7 offset-lg-2">
				<h3>Contacts:</h3>
				<ul>
					<?php 
						$user_id = $_SESSION['user']['id'];
						$contact_query = "SELECT * FROM contacts WHERE user_id = '$user_id'";
						$contacts = mysqli_query($conn, $contact_query);

						foreach($contacts as $indiv_contact){
					?>
						<li>
							<?php echo $indiv_contact['contactNo'] . "<br>" ?>
						</li>
					<?php
						}
					?>
				</ul>

				<form action="../controllers/add-contact-process.php" method="POST">
					<div class="form-group">
						<label for="contactNo">Contact No:</label>
						<input type="number" name="contactNo" class="form-control">
					</div>
					<input type="hidden" name="user_id" value="<?php echo $user_id?>">
					<button class="btn btn-success my-2" type="submit">Add Contact</button>
				</form>
			</div>
		</div>
	</div>

<?php 
	}
?>