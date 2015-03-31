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

<<<<<<< HEAD
	if (empty($errors) , (isset($_POST['username'], $_POST['password'], $_POST['repeat_password']))  , $_POST['password'] == $_POST['repeat_password']) {
		add_user();
=======
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
		
		
		//Check if email already exists in database
		
		//Prepare SQL
		$sql = "SELECT * FROM `users` WHERE `email` LIKE '$email' ORDER BY `user_id` ASC";
		
			//Execute query
			$result = mysql_query($sql);
				if ($result === false) {
					die("Could not query database");
					}
					
						//Check wether we found a row
						if (mysql_num_rows($result) == 1) {
							echo $errors[5];
						} elseif {
							$errors[] = 'Email is already in use.';

						} elseif {

						
						//Check if username already exists in database
							
							//Prepare SQL
							$sql = "SELECT * FROM `users` WHERE `username` LIKE '$username' ORDER BY `id` ASC";
								
								//Execute query
								$result = mysql_query($sql);
									if ($result === false) {
										die("Could not query database");
										}
								
									//Check wether we found a row
									if (mysql_num_rows($result) == 1) {
										echo $errors[5];

										}
									}		
											//Prepare for confirmation email
											
											//Generate random user_key
											$user_key = $username . $email . date("Ymd");
											$user_key = md5($user_key);
											
											//Add user to database but don't activate the user account yet
											//Prepare SQL
											$sql = "INSERT INTO `polimf_ninja`.`users` (`id`, `user_key`, `confirmed`, `email`, `username`, `password`) VALUES (NULL, '$user_key', '0', '$email', '$username', '$password');";
											
											//Execute query
											$result = mysql_query($sql);
												if ($result === false) {
													die("Could not query database");
												}
												
											
											//Send confirmation email
											$to      = "$email";
											$subject = "Registration email for $site_name";
											$message = "Please the following link to confirm your email \n$domain/registration_confirm.php?email=$email&user_key=$user_key \n\n\n if you did not register this account, please ignore this email.";
											$headers = "From: $system_mail" . "\r\n" .
												"Reply-To: $support_mail" . "\r\n";

											mail($to, $subject, $message, $headers);
	
	
	//Check if passwords match
	if ($_POST['password'] !== $_POST['repeat_password']) {
		$errors[] = 'Passwords do not match.';
>>>>>>> origin/master
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