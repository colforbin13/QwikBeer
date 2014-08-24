<?php

    // First we execute our common code to connection to the database and start the session
    require("common.php");

    // At the top of the page we check to see whether the user is logged in or not
    if(empty($_SESSION['user']))
    {
		$logInOutText = "<a href=\"login.php\">Log In</a>";
    }
	else
	{
		$logInOutText = "<a href=\"logout.php\">Log Out</a>";
	}
?>
<!-- Nav -->
						<nav id="nav">
							<ul>
								<li class="current"><a href="index.php">Home</a></li>
								<li><?php echo $logInOutText ?></li>
								<li><a href="http://www.qwikbeer.com/blog/">Blog</a></li>
								<li><a href="#">How It Works</a></li>
								<li>
									<a href="">About Us</a>
									<ul>
										<li><a href="#">Our Story</a></li>
										<li><a href="#">Privacy Policy</a></li>
										<li><a href="#">Terms and Conditions</a></li>
									</ul>
								</li>
								<li><a href="cart.php">Cart</a></li>
							</ul>
						</nav>