<?php

    // First we execute our common code to connection to the database and start the session
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

    // This if statement checks to determine whether the edit form has been submitted
    // If it has, then the account updating code is run, otherwise the form is displayed
    if(!empty($_POST))
    {
        // Make sure the user entered a valid E-Mail address
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
        {
            die("Invalid E-Mail Address");
        }

        // If the user is changing their E-Mail address, we need to make sure that
        // the new value does not conflict with a value that is already in the system.
        // If the user is not changing their E-Mail address this check is not needed.
        if($_POST['email'] != $_SESSION['user']['email'])
        {
            // Define our SQL query
            $query = "
                SELECT
                    1
                FROM users
                WHERE
                    email = :email
            ";

            // Define our query parameter values
            $query_params = array(
                ':email' => $_POST['email']
            );

            try
            {
                // Execute the query
                $stmt = $db->prepare($query);
                $result = $stmt->execute($query_params);
            }
            catch(PDOException $ex)
            {
                // Note: On a production website, you should not output $ex->getMessage().
                // It may provide an attacker with helpful information about your code.
                die("Failed to run query: " . $ex->getMessage());
            }

            // Retrieve results (if any)
            $row = $stmt->fetch();
            if($row)
            {
                die("This E-Mail address is already in use");
            }
        }

        // If the user entered a new password, we need to hash it and generate a fresh salt
        // for good measure.
        if(!empty($_POST['password']))
        {
            $salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647));
            $password = hash('sha256', $_POST['password'] . $salt);
            for($round = 0; $round < 65536; $round++)
            {
                $password = hash('sha256', $password . $salt);
            }
        }
        else
        {
            // If the user did not enter a new password we will not update their old one.
            $password = null;
            $salt = null;
        }

        // Initial query parameter values
        $query_params = array(
            ':email' => $_POST['email'],
            ':user_id' => $_SESSION['user']['id'],
        );

        // If the user is changing their password, then we need parameter values
        // for the new password hash and salt too.
        if($password !== null)
        {
            $query_params[':password'] = $password;
            $query_params[':salt'] = $salt;
        }

        // Note how this is only first half of the necessary update query.  We will dynamically
        // construct the rest of it depending on whether or not the user is changing
        // their password.
        $query = "
            UPDATE users
            SET
                email = :email
        ";

        // If the user is changing their password, then we extend the SQL query
        // to include the password and salt columns and parameter tokens too.
        if($password !== null)
        {
            $query .= "
                , password = :password
                , salt = :salt
            ";
        }

        // Finally we finish the update query by specifying that we only wish
        // to update the one record with for the current user.
        $query .= "
            WHERE
                id = :user_id
        ";

        try
        {
            // Execute the query
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
        }
        catch(PDOException $ex)
        {
            // Note: On a production website, you should not output $ex->getMessage().
            // It may provide an attacker with helpful information about your code.
            die("Failed to run query: " . $ex->getMessage());
        }

        // Now that the user's E-Mail address has changed, the data stored in the $_SESSION
        // array is stale; we need to update it so that it is accurate.
        $_SESSION['user']['email'] = $_POST['email'];

        // This redirects the user back to the members-only page after they register
        header("Location: inventory.php");

        // Calling die or exit after performing a redirect using the header function
        // is critical.  The rest of your PHP script will continue to execute and
        // will be sent to the user if you do not die or exit.
        die("Redirecting to inventory.php");
    }

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
	</head>
	<body class="homepage">
	<?php //print_r($_SESSION); ?>

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
				<div class="title">Edit Account</div>
						<section class="highlight">
							<form action="edit_account.php" method="post">
								<h3><?php echo htmlentities($_SESSION['user']['firstName'], ENT_QUOTES, 'UTF-8'); ?> <?php echo htmlentities($_SESSION['user']['lastName'], ENT_QUOTES, 'UTF-8'); ?></h3>
								<label for="username">Username:</label>
								<input type="text" name="username" value="<?php echo htmlentities($_SESSION['user']['username'], ENT_QUOTES, 'UTF-8'); ?>" readonly />
								<label for="password">E-Mail Address:</label>
								<input type="email" name="email" value="<?php echo htmlentities($_SESSION['user']['email'], ENT_QUOTES, 'UTF-8'); ?>" />
								<label for="password">Password: <i>(leave blank if you do not want to change your password)</i></label>
								<input type="password" name="password" value="" />
								<label for="username">Billing Address:</label>
								<input type="text" name="username" value="<?php echo htmlentities($_SESSION['user']['billingAddress1'], ENT_QUOTES, 'UTF-8'); ?>" />
								<input type="text" name="username" value="<?php echo htmlentities($_SESSION['user']['billingAddress2'], ENT_QUOTES, 'UTF-8'); ?>" />
								<label for="username">City:</label>
								<input type="text" name="username" value="<?php echo htmlentities($_SESSION['user']['billingCity'], ENT_QUOTES, 'UTF-8'); ?>" />
								<label for="username">State:</label>
								<input type="text" name="username" value="<?php echo htmlentities($_SESSION['user']['billingState'], ENT_QUOTES, 'UTF-8'); ?>" />
								<input class="button style1 big" type="submit" value="Update Account" />
							</form>
						</section>
				</div>
			</div>

		<?php include 'footer.php'; ?>

	</body>
</html>