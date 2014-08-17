						<!-- Logo -->
							<h1 id="logo"><a href="#">QwikBeer</a></h1>
					
						<!-- Nav -->	
								<nav id="nav">
								<ul>
								<?php 
									$fileName =  $_SERVER['SCRIPT_NAME'];
									$current = '';
									if (preg_match("/index/", $fileName)) {
										echo "<li class=\"current\"><a href=\"index.php\">Main Page</a></li>";
									}
									else {
										echo "<li><a href=\"index.php\">Main Page</a></li>";
									}
									if (preg_match("/inv/", $fileName)) {
										echo "<li class=\"current\"><a href=\"inv.php\">Inventory</a></li>";
									}
									else {
										echo "<li><a href=\"inv.php\">Inventory</a></li>";
									}
									if (preg_match("/orders/", $fileName)) {
										echo "<li class=\"current\"><a href=\"orders.php\">Orders</a></li>";
									}
									else {
										echo "<li><a href=\"orders.php\">Orders</a></li>";
									}
									if (preg_match("/prof/", $fileName)) {
										echo "<li class=\"current\"><a href=\"prof.php\">Profile</a></li>";
									}
									else {
										echo "<li><a href=\"prof.php\">Profile</a></li>";
									}
								?>
								</ul>
							</nav>						
						
						<!-- Copyright -->
							<ul id="copyright">
								<li>&copy; QwikBeer</li>
							</ul>