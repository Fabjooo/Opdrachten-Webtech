
<?php
if (!empty($_POST['btnSignup'])):
	if (!empty($_POST['nameSign']) && !empty($_POST['emailSign'] && !empty($_POST['passwordSign'] ))){
		session_start();
		$_SESSION['user'] = array();
		array_push($_SESSION['user'], $_POST['emailSign'], $_POST['passwordSign']);
	}
	else
	{
		echo '<SCRIPT LANGUAGE="JavaScript">
         <!--
         window.alert("Please fill in every field!")
         // -->
         </SCRIPT>';
	}
endif;
if (!empty($_POST['btnLogin'])) {
	session_start();
	if (($_SESSION['user'][0]) == $_POST['username'] && ($_SESSION['user'][1]) == $_POST['password']) {
		header('Location: createpost.php');
	}
	else if((($_SESSION['user'][0]) == $_POST['username'] && ($_SESSION['user'][1]) != $_POST['password']))
	{
		echo '<SCRIPT LANGUAGE="JavaScript">
         <!--
         window.alert("Wrong password")
         // -->
         </SCRIPT>';
	}
	else if((($_SESSION['user'][0]) != $_POST['username'] && ($_SESSION['user'][1]) == $_POST['password']))
	{
		echo '<SCRIPT LANGUAGE="JavaScript">
         <!--
         window.alert("Wrong username")
         // -->
         </SCRIPT>';
	}
}?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>IMD Talks</title>
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/twitter.css">
	
</head>
<body>


	<header>
		<h1>Welcome to IMD-Talks</h1>
		<h2>Find out what other IMD'ers are building around you.</h2>
	</header>
	
	<div id="rightside">
		<?php
		if(!isset($_SESSION['user'])):
			?>
			<section id="signup">

				<h2>New to IMD-Talks? <span>Sign Up</span></h2>
				<form action="" method="post">
					<input type="text" name="nameSign" placeholder="Full name" />
					<input type="text" name="emailSign" placeholder="Email" />
					<input type="password" name="passwordSign" placeholder="Password" />
					<input type="submit" name="btnSignup" value="Sign up for IMD Talks" />
				</form>

			</section>


			<?php
		else: ?>
			<section id="login">
				<form action="" method="post">
					<input type="email" name="username" placeholder="Email" />
					<input type="password" name="password" placeholder="Password" />
					<input type="checkbox" name="rememberme" value="yes" id="rememberme">
					<label for="rememberme">Remember me</label>
					<input type="submit" name="btnLogin" value="Sign in" />
				</form>

			</section>
		<?php
		endif;
		?>

	

	</div>
</body>
</html>