<?php
echo "<!DOCTYPE html>";
echo "<html>";
echo "<head>";
echo "	<title>Sign Up Form</title>";
echo "</head>";
echo "<body>";

if(isset($_POST['submitFirst']) && (isset($_POST['password']) && isset($_POST['email']) )) {
	
	include("functions.php");
	$dblink=db_connect("rowdy_website");
	$sql="Select `id`, `email`, `password` from `User`";
	$result=$dblink->query($sql) or
			die("Something went wrong with: $sql<br>".$dblink->error);
	$success = false;
	while ($data=$result->fetch_array(MYSQLI_ASSOC)) {
		if($data['email'] == $data['password']) {
			$success = true;
		}
	}
	
	if ($success == false) {
		redirect("signin.php");
	} else {
		redirect("index.php");		
	}
	
	
} else {
	echo 	'<form method="post" action="">';
	echo 	"<h2>Sign in here</h2>";

	echo   	'<label for="email">Email:</label><br>';
	echo  	'<input type="email" id="email" name="email"><br>';

	echo	'<label for="password">Password:</label><br>';
	echo 	'<input type="password" id="password" name="password"><br>';

	echo '<button type="submit" name="submitLogin" value="submitLogin">Log in</button>';
	echo    '</form>';	
	
}
echo '</body>';
echo '</html>';

?>