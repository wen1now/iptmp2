<?php
session_start()
?>
<!DOCTYPE html>
<html>
<head>
	<title>Register</title>

<link rel="stylesheet" href="style.css">
</head>
<body>
	<div id="titlestuff">Register</div>
<?php
	if (isset($_SESSION['userid'])){
		include('menuitems.php');
	} else {
		include('menuitemsnotloggedin.php');
		}
?>
	<center>
	<form name="registerform" method="post" action="register.php">
		<span class="preformatted">Username:</span><input type="text" name="username"><br>
		<span class="preformatted">Password:</span><input type="password" name="password"><br>
		<input type="submit" name="submitregister">
	</form>
<?php


if (isset($_POST['submitregister'])){
	//user HAS posted data
	//connect to the db
	require ('connect.php');
	//go get the raw data
	$username = $_POST['username'];
	$password = $_POST['password'];

	$check = 'select * from Users where username ="'.$username.'"';

	$data = mysqli_query($connection,$check);
	if (mysqli_num_rows($data) == 0)
   		{
		$qry = 'insert into Users(username,hash,pointer,picture) values ("'
				.$username
				.'","'
				.$password
				.'","ffffff","default.jpg")';//insert picture filepath

			//execute
			/////!!!!!!!!!!!!!!!!!!!!!!!!!!!---make sure no such username already exists
			if (mysqli_query($connection,$qry))
		   		{ echo 'Registration successful';
		   		header("LOCATION: login.php");}
			else
		   		{ echo 'Error detected; please try again - '.mysqli_error(); }
   		}
   	else {
   		echo('Username is already in use, sorry');
   	}
	


}
?>
</center>
</body>
</html>