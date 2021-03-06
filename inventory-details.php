<?php

    // First we execute our common code to connect to the database and start the session
    require("common.php");

    // At the top of the page we check to see whether the user is logged in or not
    if(empty($_SESSION['user']))
    {
        // If they are not, we redirect them to the login page.
        header("Location: login.php");

        // Remember that this die statement is absolutely critical.  Without it,
        // people can view your members-only content without logging in.
        die("Redirecting to login.php");
    }

    // Everything below this point in the file is secured by the login system

    // We can display the user's username to them by reading it from the session array.  Remember that because
    // a username is user submitted content we must use htmlentities on it before displaying it to the user.
?>
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
			$name = $_GET["name"];
			if ($name == 'millerlite') {
				$beerName = 'Miller Lite';
				$image = "lite_logo.png";
			}
			elseif ($name == 'samadamsbostonlager') {
				$beerName = 'Sam Adams Boston Lager';
				$image = "sam-adams-beer.jpg";
			}
			elseif ($name == 'corona') {
				$beerName = 'Corona Extra';
				$image = "Corona-Logo.jpg";
			}
			elseif ($name == 'mikeshard') {
				$beerName = "Mike's Hard";
				$image = "Mikes_newlogo.jpg";
			}
			else {
				$beerName = 'Miller Lite';
				$image = "lite_logo.png";
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
				<div class="title">Details</div>
						<section class="highlight">
							<img src="images/<?php echo $image; ?>" alt="" style="max-width:100%"/>
								<h3><?php echo $beerName; ?></h3>
								<p>12 oz cans or bottles of <?php echo $beerName; ?>. Choose your options and add to your cart.</p>
								<form action="cart.php?action=add&id=<?php echo $name ?>" method="post">
									<label for="cansbottles">Options</label>
									<select name="cansbottles">
										<option value="cans">Cans</option>
										<option value="bottles">Bottles</option>
									</select>
									<label for="quantity">Quantity</label>
									<select name="quantity">
										<option value="12">12 Pack</option>
										<option value="24">24 Pack</option>
									</select>
									<input type="submit" value="Add to Cart" />
								</form>
						</section>
				</div>
			</div>

		<?php include 'footer.php'; ?>

	</body>
</html>