<?php
//Turn of deprecated and strict warnings
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

//Include global vars
include('/inc/vars-inc.php');

include('/inc/init-inc.php');

include('/inc/user-inc.php');

$errors = array('<br /> The email can not be empty. <br />' , ' <br /> The username can not be empty. <br />' ,  '<br /> the password can not be empty. <br />'  , '<br /> Passwords do not match. <br />' ,  '<br /> Username already taken. <br />'  , '<br /> Email is already in use. <br />');

echo $current_page;

//Checking 
	if (empty($_POST['username'])) {
		echo $errors[1];
		}

	if (empty($_POST['password']) || empty($_POST['repeat_password'])) {
		echo $errors[2];
	}

	//Check if passwords match
	if ($_POST['password'] !== $_POST['repeat_password']) {
		echo $errors[3];
	}
	
	if (empty($errors)) {	
		die();
	}

	if (user_exists($_POST['username'])) {
		echo $errors[4];
	}

	if (empty($errors) , (isset($_POST['username'], $_POST['password'], $_POST['repeat_password']))  , $_POST['password'] == $_POST['repeat_password']) {
		add_user();
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
	<form action="" method="post">
		<p>
			<label for="username">Username: </label>
			<input type="text" name="username" id="username" placeholder="username" />
		</p>
		<p>
			<label for="password">Password: </label>
			<input type="password" name="password" id="password" placeholder="password" />
		</p>
		<p>
			<label for="repeat_password">Repeat Password: </label>
			<input type="password" name="repeat_password" id="repeat_password" placeholder="repeat password" />
		</p>
		<p>
			<input type="submit" value="Register" />
		</p>
	</form>

</body>
</html>