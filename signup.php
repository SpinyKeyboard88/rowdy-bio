<?php
echo "<!DOCTYPE html>";
echo "<html>";
echo "<head>";
echo "	<title>Sign Up Form</title>";
echo "</head>";
echo "<body>";

if(isset($_POST['submitFirst']) && (isset($_POST['firstname']) && isset($_POST['lastname'])  && isset($_POST['password']) && isset($_POST['email']) )) {
	
	if(isset($_POST['submitSecond']) && (isset($_POST['pronouns']) && isset($_POST['pronounciation']) && isset($_POST['location'])  && isset($_POST['age']) ) ) {
		
		if(isset($_POST['submitThird']) && (isset($_POST['bio'])) ) {
			
			echo "<h1>Here is the data</h1>";
			echo '<p>"' . $_POST['firstname'] .'"</p>';
			echo '<p>"' . $_POST['lastname'] .'"</p>';
			echo '<p>"' . $_POST['password'] .'"</p>';
			echo '<p>"' . $_POST['email'] .'"</p>';
			echo '<p>"' . $_POST['pronouns'] .'"</p>';
			echo '<p>"' . $_POST['pronounciation'] .'"</p>';
			echo '<p>"' . $_POST['location'] .'"</p>';
			echo '<p>"' . $_POST['age'] .'"</p>';
			echo '<p>"' . $_POST['bio'] .'"</p>';
		
		} else {
			echo 	'<form method="post" action="">';
			echo 	"<h2>Finally, your online biography for everyone to see</h2>";

			echo	'<label for="bio">Bio:</label><br>';
			echo '<textarea id="bio" name="bio" rows="4" cols="50"></textarea>';

		echo '<button type="submit" name="submitThird" value="submitThird">Submit</button>';
			echo    '</form>';
		}
		
	} else {

		echo 	'<form method="post" action="">';
		echo 	"<h2>Now for some optional (but recommended) prompts</h2>";

		echo	'<label for="pronouns">What pronouns do you use (if any):</label><br>';
		echo   	'<input type="text" id="pronouns" name="pronouns"><br>';

		echo	'<label for="location">From:</label><br>';
		echo   	'<input type="text" id="location" name="location"><br>';

		echo	'<label for="age">Age:</label><br>';
		echo   	'<input type="text" id="age" name="age"><br>';

		echo   	'<label for="pronounciation">How do you pronounce ' . $_POST['firstname'] . ' ' . $_POST['lastname'] . ':</label><br>';
		echo  	'<input type="text" id="pronounciation" name="pronounciation"><br>';


		echo '<button type="submit" name="submitSecond" value="submitSecond">Submit</button>';
		echo    '</form>';			
		
	}

	
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
echo '</body>';
echo '</html>';

?>