<?php
session_start()
?>
<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<style> 
body {
    background-image: url("images/bgroundtiles.jpg");
}
</style>
</head>
<body>
	<center>
	<h2><font color="ffffff">Critical Miss: REGISTER</font></h2>
	<form name="letmein" method="post" action="register.php">
		<font color="ffffff">Username:</font> <input type="text" name="username"><br>
		<font color="ffffff">Password:</font> <input type="password" name="password"><br>
		<input type="submit" name="submit">
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
		.'","ffffff","default.jpg")';//insert picture filepath

	//execute
	if (mysqli_query($connection,$qry))
   		{ echo 'Registration successful'; }
	else
   		{ echo 'Error detected; please try again - '.mysqli_error(); }


}
?>
</center>
</body>
</html>