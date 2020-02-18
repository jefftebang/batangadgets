<?php 
	require "../partials/template.php";

	function get_title(){
		echo "Register";
	}

	function get_body_contents(){
?>
	<h1 class="text-center py-5">Register</h1>

	<div class="col-lg-8 offset-lg-2">
		<form action="" method="POST">
			<div class="form-group">
				<label for="firstName">First Name:</label>
				<input type="text" name="firstName" class="form-control" id="firstName">
				<span class="validation"></span>
			</div>
			<div class="form-group">
				<label for="lastName">Last Name:</label>
				<input type="text" name="lastName" class="form-control" id="lastName">
				<span class="validation"></span>
			</div>
			<div class="form-group">
				<label for="email">Email:</label>
				<input type="email" name="email" class="form-control" id="email">
				<span class="validation"></span>
			</div>
			<div class="form-group">
				<label for="password">Password:</label>
				<input type="password" name="password" class="form-control" id="password">
				<span class="validation"></span>
			</div>
			<div class="form-group">
				<label for="confirmPassword">Confirm Password:</label>
				<input type="password" name="confirmPassword" class="form-control" id="confirmPassword">
				<span class="validation"></span>
			</div>
			<button type="button" class="btn btn-info" id="registerUser">Register</button>
			<p>Already Registered? <a href="login.php">Login</a></p>
		</form>
	</div>

	<script src="../assets/scripts/register.js"></script>

<?php
	}

 ?>