<?php
session_start()
?>
<!DOCTYPE html>
<html>
<head>
	<title>Log in</title>
	<style> 
body {
    background-image: url("images/bgroundtiles.jpg");
}
</style>
</head>
<body>
<center>
	<h2><font color="ffffff">Critical Miss: LOGIN</font> </h2>
	<form name="letmein" method="post" action="login.php">
		<font color="ffffff">Username:</font> <input type="text" name="username"><br>
		<font color="ffffff">Password:</font> <input type="password" name="password"><br>
		<input type="submit" value="Log In" name="submit">
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
	$qry = 'select * from Users where username = "'
		.$username
		.'" AND hash = "'
		.$password.'"';
	//execute
	$data = mysqli_query($connection,$qry);
	if (mysqli_num_rows($data) != 0)
   		{
   		echo mysqli_fetch_row($data)[0];
   		$_SESSION["username"] = $_POST["username"];
   		header("LOCATION: menu.php");}
	else
   		{ echo 'Either your username or password was incorrect :('; }

	//see all data

}
?>
</center>
</body>
</html>