<?php

include('/inc/init-inc.php');

$errors = array();

if (isset($_POST['username'], $_POST['password'])) {
	if (empty($_POST['username'])) {
		$errors[] = 'Please enter your username.';
	}

	if (empty($_POST['password'])) {
		$errors[] = 'Please enter your password.';
	}

	if (vaild_credentials($_POST['username'], $_POST['password']) === false) {
		$errors[] = 'Username / Password incorrect.';
	} 

	if (empty($errors)) {
		$_SESSION['username'] = htmlentities($_POST['username']);
		
		header('Location: protected.php');
		die();
	}
}
?>
<html>
	<head>
		<title>Login</title>
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
			<?php
			} else {
			echo 'Need an account? <a href="register.php">click here!</a>';
			}
			?>
		</div>
		<form action="" method="post"></form>
			<ul>
				<p>
					<label for="username">Username: </label>
					<input type="text" name="username" id="username" value="<?php if (isset($_POST['username'])) { echo htmlentities($_POST['username']); } ?>" />
				</p>
				<p>
					<label for="password">Password: </label>
					<input type="password" name="password" id="password" />
				</p>
			</ul>
			<p>
				<input type="submit" value="login">
			</p>
		</form>
	</body>
</html>