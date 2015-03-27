<?php

include('/inc/init-inc.php');

if (isset($_POST['username'], $_POST['password'], $_POST['repeat_password'])) {
	if (empty($_POST['username'])) {
		$errors[] = 'The username can not be empty.';
	}

	if (empty($_POST['password']) || empty($_POST['repeat_password'])) {
		$errors[] = 'the password can not be empty.';
	}

	if ($_POST['password'] !== $_POST['repeat_password']) {
		$errors[] = 'Passwords do not match.';
	}

	if (user_exists($_POST['username'])) {
		$errors[] = 'Username already taken.';
	}

	if (empty($errors)) {
		add_user($_POST['username'], $_POST['password']);

		$_SESSION['username'] = htmlentities($_POST['username']);

		header('Location: protected.php');
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