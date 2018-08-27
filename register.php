<?php
session_start()
?>
<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
</head>
<body>
	<h2>Critical Miss</h2>
	<form name="letmein" method="post" action="register.php">
		Username: <input type="text" name="username"><br>
		Password: <input type="password" name="password"><br>
		<input type="submit" value="register">
	</form>
<?php


if (isset($_POST['submit'])){
	//user HAS posted data
	//connect to the db
	require ('connect.php');
	//go get the raw data
	$username = $_POST['username'];
	$password = $_POST['password'];

	//plateitup
	$qry = 'insert into Users(username,hash,pointer,picture) values ("'
		.$username
		.'","'
		.$password
		.'","000000","")';//insert picture filepath

	//execute
	if (mysqli_query($connection,$qry))
   		{ echo 'Addition successful'; }
	else
   		{ echo 'Error detected; please try again - '.mysqli_error(); }

	//see all data
	echo '<p><a href="viewallsoldiers.php">See all the minions</p>';

}
?>

</body>
</html>