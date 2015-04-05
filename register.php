<?php
//Turn of deprecated and strict warnings
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

include('/inc/init-inc.php');

$errors = array();

if (isset($_POST['username'], $_POST['password'], $_POST['repeat_password'])) {
	if (empty($_POST['username'])) {
		$errors[] = 'The username can not be empty.';
	}

	if (empty($_POST['password']) || empty($_POST['repeat_password'])) {
		$errors[] = 'Passwords do not match';
	}

	if ($_POST['password'] !== $_POST['repeat_password']) {
		$errors[] = 'The passwords are not match';
	}

	if ($_POST['username'] === $_POST['password']) {
		$errors[] = 'Dont use your username as a password';
	}

	if (user_exists($_POST['username'])) {
		$errors[] = 'Username already taken.';
	}
	
	if (empty($errors)) {
		add_user($_POST['username'] , $_POST['password']);

		$_SESSION['username'] = htmlentities($_POST['username']);

		header('Location: protected.php');
		die();
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
</head>
<body>
	<div>
		<?php

		if (empty($errors) === false) {
			?>
			<ul>
				<?php

				foreach ($errors as $error) {
					echo "<li>{$error}</li>";
				}

				?>
			</ul>
		<?php } ?>
	</div>
	<form action="" method="post">
		<p>
			<label for="username">Username: </label>
			<input type="text" name="username" id="username" placeholder="username" value="<?php if (isset($_POST['username'])) { echo htmlentities($_POST['username']); } ?>" />
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