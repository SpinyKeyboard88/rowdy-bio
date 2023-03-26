<?php
echo "<!DOCTYPE html>";
echo "<html>";
echo "<head>";
echo "<title>Sign Up Form</title>";
echo "</head>";
echo "<body>";
$data = $_GET['status'];

echo "<p>The data for status is $data</p>";
switch($data){
	case 'success':
		echo "<h1>Succesfully logged in</h1>";
		break;
	case "incorrectPassword":
		echo "<h1>Incorrect password</h1>";
		break;
	case "noUsernameFound":
		echo "<h1>No username was found</h1>";
		break;
	default:
		echo "<h1>Go ahead and log in</h1>";
		break;
}


if(isset($_POST['submitLogin']) && (isset($_POST['password']) && isset($_POST['email']) )) {
		
	include("functions.php");
	$dblink=db_connect("rowdy_site");
	$sql="Select `email`, `password` from `User`";
	$result=$dblink->query($sql) or
			die("Something went wrong with: $sql<br>".$dblink->error);
	$success = false;
	while ($data=$result->fetch_array(MYSQLI_ASSOC)) {
		if($data['email'] == $_POST['email']) {
			if($data['password'] == $_POST['password']) {
				redirect("signin.php?status=success");
				//echo "<p>Success somewhere</p>";
			} else {
				redirect("signin.php?status=incorrectPassword");
				//echo "<p>incorrect password</p>";
			}
		} else{
			redirect("signin.php?status=noUsernameFound");
			//echo "<p>No username found</p>";
		}
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