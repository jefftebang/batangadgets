<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php get_title(); ?></title>

	<!-- Bootswatch -->
	<link rel="stylesheet" type="text/css" href="https://bootswatch.com/4/cosmo/bootstrap.css">

	<!-- Favicon -->
    <link rel="icon" type="text/css" href="../assets/BG.ico">


</head>
<body>
	<!-- Navbar -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		<a class="navbar-brand" href="#">BatanGadgets</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarColor01">
		    <ul class="navbar-nav mr-auto">
		      	<li class="nav-item active">
		        	<a class="nav-link" href="../views/catalog.php">Gadgets<span class="sr-only">(current)</span></a>
		      	</li>
		      	<?php  
		      		session_start();
		      		if(isset($_SESSION['user']) && $_SESSION['user']['role_id']==1){
		      	?>
		      	<li class="nav-item">
		        	<a class="nav-link" href="add-item.php">Add Item</a>
		      	</li>
		      	<?php
		      		}else{
		      	?>
		      	<li class="nav-item">
		        	<a class="nav-link" href="cart.php">Cart <span class="badge bg-warning" id="cartCount">
		        		<?php  

		        			if(isset($_SESSION['cart'])){
		        				echo array_sum($_SESSION['cart']);
		        			}else{
		        				echo 0;
		        			}
		        		?>
		        	</span></a>
		      	</li>
		      	<li class="nav-item">
		        	<a class="nav-link" href="order-history.php">Orders</a>
		        </li>	
		    </ul>
		    <ul class="navbar-nav ml-auto mx-3">  	
		      	<?php		
		      		}

		      		if(isset($_SESSION['user'])){
		      	?>
		      	<li class="nav-item">
		      		<a class="nav-link" href="profile.php">Hello <?php echo $_SESSION['user']['firstName'] ?>!</a>
		      	</li>
		      	<li class="nav-item">
		      		<a class="nav-link" href="../controllers/logout-process.php">Logout</a>
		      	</li>
		      	<?php		
		      		}else{
		      	?>
		      	<li class="nav-item">
		      		<a class="nav-link" href="login.php">Login</a>
		      	</li>
		      	<li class="nav-item">
		      		<a class="nav-link" href="register.php">Register</a>
		      	</li>
		      	<?php		
		      		}
		      	?>
		    </ul>
		    <form class="form-inline my-2 my-lg-0">
		      	<input class="form-control mr-sm-2" type="text" placeholder="Search">
		      	<button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
		    </form>
		</div>
	</nav>

	<!-- Page Contents -->
	<?php get_body_contents()?>

	<!-- Footer -->
	<footer class="page-footer font-small text-white bg-primary">
		<div class="footer-copyright text-center py-3">
			© 2020 by BatanGadgets
		</div>
	</footer>

	<!-- Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	
</body>
</html>