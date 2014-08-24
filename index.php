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
			<div id="intro-wrapper" class="wrapper style1">
				<div class="title">What Is This?</div>
				<section id="intro" class="container">
					<p class="style1">Why would I use QwikBeer?</p>
					<p class="style2">
						QwikBeer lets you order beverages<br class="mobile-hide" />
						from the comfort of your home so<br class="mobile-hide" />
						you don't have to leave!
					</p>
					<p class="style3">Simply create an account either on our website or in one of our mobile apps, enter your delivery
					address to see the available selection, submit your payment information, and wait for your delivery. Your local
					liquor store will delivery your order quickly and safely, and you won't ever have to leave the comfort of your
					own home!</p>
					<ul class="actions">
						<li><a href="inventory.php" class="button style1 big">Order Now</a></li>
					</ul>
				</section>
			</div>
		<?php include 'getapp.php'; ?>

		<?php include 'footer.php'; ?>

	</body>
</html>