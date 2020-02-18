<?php 
	require "../partials/template.php";

	function get_title(){
		echo "Login";
	}

	function get_body_contents(){
?>
	<h1 class="text-center py-5">Login</h1>

	<div class="col-lg-8 offset-lg-2">
		<form action="" method="POST">
			
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
			<button type="button" class="btn btn-info" id="loginUser">Login</button>
			<p>Not yet Registered? <a href="register.php">Register</a></p>
		</form>
	</div>

	<script src="../assets/scripts/login.js"></script>

<?php
	}

 ?>