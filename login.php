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
				<div class="title">Login</div>
						<section class="highlight">
							<form action="inventory.php" method="post">
								<label for="username">Username</label>
								<input type="text" name="username" value="" />
								<label for="password">Password</label>
								<input type="password" name="password" value="" />
								<input type="submit" value="Submit" />
							</form>
						</section>
				</div>
			</div>

		<?php include 'footer.php'; ?>

	</body>
</html>