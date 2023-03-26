<?php
session_start();
echo "<!DOCTYPE html>";
echo "<html>";
echo "<head>";
echo "	<title>Sign Up Form</title>";
echo "</head>";
echo "<body>";

		
if(isset($_POST['submitThird']) && (isset($_POST['bio'])) ) {

	include("functions.php");
	$dblink=db_connect("rowdy_site");

	$firstName = addslashes($_SESSION['firstname']);
	$lastName = addslashes($_SESSION['lastname']);
	$password = addslashes($_SESSION['password']);
	$email = addslashes($_SESSION['email']);
	$pronouns = addslashes($_SESSION['pronouns']);
	$pronunciation = addslashes($_SESSION['pronunciation']);
	$location = addslashes($_SESSION['location']);
	$age = addslashes($_SESSION['age']);
	$bio = addslashes($_POST['bio']);
	
	$sql="Insert into `User` (`first_name`, `last_name`, `password`, `email`, `pronouns`, `pronunciation`, `location`, `age`, `bio`) Values ('$firstName', '$lastName', '$password', '$email', '$pronouns', '$pronunciation','$location', '$age', '$bio')";
	$dblink->query($sql) or
		die("Something went wrong with $sql<br>".$dblink->error);
	redirect("index.php");
	

} else {
	
	if(isset($_POST['submitSecond']) && (isset($_POST['pronouns']) && isset($_POST['pronunciation']) && isset($_POST['location'])  && isset($_POST['age']) ) ) {
		
		echo 	'<form method="post" action="">';
		echo 	"<h2>Finally, your online biography for everyone to see</h2>";

		echo	'<label for="bio">Bio:</label><br>';
		echo '<textarea id="bio" name="bio" rows="4" cols="50"></textarea>';

		echo '<button type="submit" name="submitThird" value="submitThird">Submit</button>';
		echo    '</form>';
		
					
		$_SESSION['pronouns'] = $_POST['pronouns'];
		$_SESSION['pronunciation'] = $_POST['pronunciation'];
		$_SESSION['location'] = $_POST['location'];
		$_SESSION['age'] = $_POST['age'];
	
		

	} else {
		
		if(isset($_POST['submitFirst']) && (isset($_POST['firstname']) && isset($_POST['lastname'])  && isset($_POST['password']) && isset($_POST['email']) )) {

			echo 	'<form method="post" action="">';
			echo 	"<h2>Now for some optional (but recommended) prompts</h2>";

			echo	'<label for="pronouns">What pronouns do you use (if any):</label><br>';
			echo   	'<input type="text" id="pronouns" name="pronouns"><br>';

			echo	'<label for="location">From:</label><br>';
			echo   	'<input type="text" id="location" name="location"><br>';

			echo	'<label for="age">Age:</label><br>';
			echo   	'<input type="text" id="age" name="age"><br>';

			echo   	'<label for="pronunciation">How do you pronounce ' . $_POST['firstname'] . ' ' . $_POST['lastname'] . ':</label><br>';
			echo  	'<input type="text" id="pronunciation" name="pronunciation"><br>';


			echo '<button type="submit" name="submitSecond" value="submitSecond">Submit</button>';
			echo    '</form>';				
			
				$_SESSION['firstname'] = $_POST['firstname'];
				$_SESSION['lastname'] = $_POST['lastname'];
				$_SESSION['password'] = $_POST['password'];
				$_SESSION['email'] = $_POST['email'];
	
		} else {
			echo 	'<form method="post" action="">';
			echo 	"<h2>Sign Up</h2>";
			echo	'<label for="firstname">First name:</label><br>';
			echo   	'<input type="text" id="username" name="firstname"><br>';

			echo	'<label for="lastname">Last name:</label><br>';
			echo   	'<input type="text" id="username" name="lastname"><br>';


			echo   	'<label for="email">Email:</label><br>';
			echo  	'<input type="email" id="email" name="email"><br>';

			echo	'<label for="password">Password:</label><br>';
			echo 	'<input type="password" id="password" name="password"><br>';

			echo '<button type="submit" name="submitFirst" value="submitFirst">Submit</button>';
			echo    '</form>';			
		}	
				
	}	
	
}

echo '</body>';
echo '</html>';