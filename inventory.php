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
			if ($_POST['username']) {
				$loggedUser = ', ' . $_POST['username'];
			}
			else {
				$loggedUser = '';
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
				<div class="title">Pick your drinks<?php echo $loggedUser; ?></div>
				<div class="row oneandhalf">
					<div class="3u">
						<a href="inventory-details.php?name=millerlite">
						<section class="highlight">
							<span class="section-link"></span>
							<a class="image featured"><img src="images/lite_logo.png" alt="" /></a>
							<h3>Miller Lite</h3>
							<p>This classic American pilsner yadda yadda</p>
						</section>
						</a>
					</div>
					<hr class="mobile-rule" />
					<div class="3u">
						<a href="inventory-details.php?name=samadamsbostonlager">
						<section class="highlight">
							<span class="section-link"></span>
							<a href="#" class="image featured"><img src="images/sam-adams-beer.jpg" alt="" /></a>
							<h3>Sam Adams Boston Lager</h3>
							<p>Sam Adams Boston Lager. Brewer and patriot Sam Adams inspired this brewery...</p>
						</section>
						</a>
					</div>
					<hr class="mobile-rule" />
					<div class="3u">
						<a href="inventory-details.php?name=corona">
						<section class="highlight">
							<span class="section-link"></span>
							<a href="#" class="image featured"><img src="images/Corona-Logo.jpg" alt="" /></a>
							<h3>Corona Extra</h3>
							<p>This Mexican import is famous for being enjoyed on a beach with a lime wedge.</p>
						</section>
						</a>
					</div>
					<hr class="mobile-rule" />
					<div class="3u">
						<a href="inventory-details.php?name=mikeshard">
						<section class="highlight">
							<span class="section-link"></span>
							<a href="#" class="image featured"><img src="images/Mikes_newlogo.jpg" alt="" /></a>
							<h3>Mike's Hard</h3>
							<p>Mike's Hard has many varieties from the standard lemonade to a tropical variety pack. Choose
							what's right for your party.</p>
						</section>
						</a>
					</div>
				</div>
			</div>

		<?php include 'footer.php'; ?>

	</body>
</html>