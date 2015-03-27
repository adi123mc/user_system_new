<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
include('/inc/init-inc.php');
$errors = array('The email can not be empty.' , 'The username can not be empty.' ,  'the password can not be empty.'  , 'Passwords do not match' ,  'Username already taken.' );

echo '<h1>You wot m8?</h1>';//Fancy stuffs ;3

if (isset($_POST['username'], $_POST['password'], $_POST['repeat_password'])) {
	if (empty($_POST['email'])) {
		echo $errors[0];
	}

	if (empty($_POST['username'])) {
		echo $errors[1];
	}

	if (empty($_POST['password']) || empty($_POST['repeat_password'])) {
		echo $errors[2];
	}

	if ($_POST['password'] !== $_POST['repeat_password']) {
		echo $errors[3];
	}

	if (user_exists($_POST['username'])) {
		echo $errors[4];
	}

	if (empty($errors)) {
		
		//Get data submitted from forms
		$email = $_POST['email'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		
		
		//Make data safe
		
		
		//Prevent HTML and JS injections
		$email = htmlspecialchars($email);
		$username = htmlspecialchars($username);
		$password = htmlspecialchars($password);
		
		//Prevent SQL injections
		$email = mysql_real_escape_string($email);
		$username = mysql_real_escape_string($username);
		$password = mysql_real_escape_string($password);
		
		//Encrypt password with sha1
		$password = sha1($password);
		
		//Make email lowercase
		$email = strtolower($email);
		
		//Check if any fields already exist
		
		
		//Send confirmation email to user
		die();
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
</head>
<body>
	<p>
		<?php

		?>
	</p>
	<form action="registered.php" method="post">
	<form action="" method="post">
		<p>
			<input type="text" name="email" id="email" placeholder="email" />
		</p>
		<p>
			<input type="text" name="username" id="username" placeholder="username" />
		</p>
		<p>
			<input type="password" name="password" id="password" placeholder="password" />
		</p>
		<p>
			<input type="password" name="repeat_password" id="repeat_password" placeholder="repeat password" />
		</p>
		<p>
			<input type="submit" value="Register" />
		</p>
	</form>

</body>
</html>