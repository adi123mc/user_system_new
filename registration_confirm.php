<?php
//Get info from url
$email = $_GET['email'];
$user_key = $_GET['user_key'];

//Prevent HTML and JS injections
$email = htmlspecialchars($email);
$user_key = htmlspecialchars($user_key);

//Prevent SQL injections
$email = mysql_real_escape_string($email);
$user_key = mysql_real_escape_string($user_key);


//Prepare sql
	$sql = "SELECT * FROM `users` WHERE `user_key` = '$user_key' AND `email` LIKE '$email' ";

	//Execute query
	$result = mysql_query($sql);
	if ($result === false) {
		die("Could not query database");
	}
		
	//Check wether we found a row
	if (mysql_num_rows($result) == 1) {
	
		//fetch row
		$row = mysql_fetch_assoc($result);
		
		//check data
		if ($row["email"] == $_GET["email"] && $row["user_key"] == $_GET["user_key"]) {
			
			
			//Activate user account
			//Prepare SQL
			$sql = "UPDATE `polimf_ninja`.`users` SET `confirmed` = '1' WHERE `users`.`email` LIKE '$email' ";
			
			//Execute query
			$result = mysql_query($sql);
			if ($result === false) {
				die("Could not query database");
			}
			
			echo "Your account has been verified, you can now log in.";
			
		} else {echo 'Invalid data combination! (1) <br />';}
	} else {echo 'No rows have been found! (2)<br />';}

?>