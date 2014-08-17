<!DOCTYPE HTML>
<!--
	Striped by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>QwikBeer - Admin</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-desktop.css" />
			<link rel="stylesheet" href="css/style-wide.css" />
		</noscript>
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
	</head>
	<!--
		Note: Set the body element's class to "left-sidebar" to position the sidebar on the left.
		Set it to "right-sidebar" to, you guessed it, position it on the right.
	-->
	<body class="left-sidebar">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Content -->
					<div id="content">
						<div class="inner">
					
							<!-- Post -->
								<article class="box post post-excerpt">
									<header>
										<!--
											Note: Titles and subtitles will wrap automatically when necessary, so don't worry
											if they get too long. You can also remove the <p> entirely if you don't
											need a subtitle.
										-->
										<h2><a href="#">Welcome to QwikBeer</a></h2>
										<p>Here you can administer your store</p>
									</header>
									<!--<div class="info">
										
											Note: The date should be formatted exactly as it's shown below. In particular, the
											"least significant" characters of the month should be encapsulated in a <span>
											element to denote what gets dropped in 1200px mode (eg. the "uary" in "January").
											Oh, and if you don't need a date for a particular page or post you can simply delete
											the entire "date" element.
											
										
										<span class="date"><span class="month">Jul<span>y</span></span> <span class="day">14</span><span class="year">, 2014</span></span>
										
											Note: You can change the number of list items in "stats" to whatever you want.
										
										<ul class="stats">
											<li><a href="#" class="icon fa-comment">16</a></li>
											<li><a href="#" class="icon fa-heart">32</a></li>
											<li><a href="#" class="icon fa-twitter">64</a></li>
											<li><a href="#" class="icon fa-facebook">128</a></li>
										</ul>
									</div> -->
									<!--<a href="#" class="image featured"><img src="images/pic01.jpg" alt="" /></a>-->
									<p>
										Choose a menu item on the left to see the different sections you can administer.<br />
										<?php //echo $_SERVER['REQUEST_URI']; ?>
										<?php 
											$fileName =  $_SERVER['SCRIPT_NAME'];
											$current = '';
											if (ereg('index.php', $fileName)
											{
												$current = "index";
											}
											elseif (ereg('inv.php', $fileName)
											{
												$current = "inv";
											}
											elseif (ereg('orders.php', $fileName)
											{
												$current = "orders";
											}
											elseif (ereg('prof.php', $fileName)
											{
												$current = "prof";
											}
										?>
									</p>
								</article>

						</div>
					</div>

				<!-- Sidebar -->
					<div id="sidebar">
					
						<!-- Logo -->
							<h1 id="logo"><a href="#">QwikBeer</a></h1>
					
						<!-- Nav -->
							<nav id="nav">
								<ul>
									<li class="current"><a href="index.php">Main Page</a></li>
									<li><a href="inv.php">Inventory</a></li>
									<li><a href="orders.php">Orders</a></li>
									<li><a href="prof.php">Profile</a></li>
								</ul>
							</nav>

						
						
						<!-- Copyright -->
							<ul id="copyright">
								<li>&copy; QwikBeer.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
							</ul>

					</div>

			</div>

	</body>
</html>