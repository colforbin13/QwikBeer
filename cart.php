<?php session_start(); ?>
<!DOCTYPE HTML>
<!--
	Escape Velocity by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>QwikBeer - A beer run in the palm of your hands</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery.dropotron.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-desktop.css" />
		</noscript>
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
		<?php

			$product_id = $_GET['id']; //the product id from the URL
			$action = $_GET['action']; //the action from the URL

			//if there is an product_id and that product_id doesn't exist display an error message
			//if($product_id && !productExists($product_id)) {
			//	die("Error. Product Doesn't Exist");
			//}

			switch($action) { //decide what to do

				case "add":
					$_SESSION['cart'][$product_id]++; //add one to the quantity of the product with id $product_id
				break;

				case "remove":
					$_SESSION['cart'][$product_id]--; //remove one from the quantity of the product with id $product_id
					if($_SESSION['cart'][$product_id] == 0) unset($_SESSION['cart'][$product_id]); //if the quantity is zero, remove it completely (using the 'unset' function) - otherwise is will show zero, then -1, -2 etc when the user keeps removing items.
				break;

				case "empty":
					unset($_SESSION['cart']); //unset the whole cart, i.e. empty the cart.
				break;

			}

		?>
	</head>
	<body class="homepage">

		<!-- Header -->
			<div id="header-wrapper" class="wrapper">
				<div id="header">

					<!-- Logo -->
						<div id="logo">
							<h1><a href="index.php">QwikBeer</a></h1>
							<p>A Beer Run In Your Pocket</p>
						</div>

					<?php include 'nav.php'; ?>

				</div>
			</div>

		<!-- Intro -->
			<div id="intro-wrapper" class="wrapper style3">
				<div class="title">Your Cart<?php echo $loggedUser; ?></div>
				<div class="row oneandhalf">
				<?php

					if($_SESSION['cart']) { //if the cart isn't empty
					//show the cart

						//echo "<table border=\"1\" padding=\"3\" width=\"40%\">"; //format the cart using a HTML table

						//iterate through the cart, the $product_id is the key and $quantity is the value
						foreach($_SESSION['cart'] as $product_id => $quantity) {
							
							if ($product_id == 'millerlite') {
								$beerName = 'Miller Lite';
								$image = "lite_logo.png";
							}
							elseif ($product_id == 'samadamsbostonlager') {
								$beerName = 'Sam Adams Boston Lager';
								$image = "sam-adams-beer.jpg";
							}
							elseif ($product_id == 'corona') {
								$beerName = 'Corona Extra';
								$image = "Corona-Logo.jpg";
							}
							elseif ($product_id == 'mikeshard') {
								$beerName = "Mike's Hard";
								$image = "Mikes_newlogo.jpg";
							}
							else {
								$beerName = 'Miller Lite';
								$image = "lite_logo.png";
							}

							echo "<div class=\"3u\">";
							echo "	<section class=\"highlight\">";
							echo "		<a class=\"image featured\"><img src=\"images/$image\" /></a>";
							echo "		<h3>$beerName</h3>";
							echo "		<p>Quantity: $quantity <a href=\"$_SERVER[PHP_SELF]?action=remove&id=$product_id\">X</a></p>";
							echo "	</section>";
							echo "</div>";
							echo "<hr class=\"mobile-rule\" />";

							

						}

					}else{
					//otherwise tell the user they have no items in their cart
						echo "Your cart is empty. What are you waiting for? <a href=\"inventory.php\">Go pick something!</a>";

					}
					?>
				</div>
			</div>

		<?php include 'footer.php'; ?>

	</body>
</html>