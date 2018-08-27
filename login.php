<?php
session_start()
?>
<!DOCTYPE html>
<html>
<head>
	<title>Log in</title>
</head>
<body>
	<h2>Critical Miss</h2>
	<form name="letmein" method="post" action="login.php">
		Username: <input type="text" name="username"><br>
		Password: <input type="password" name="password"><br>
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
   		header("LOCATION: register.php");}
	else
   		{ echo 'Either your username or password was incorrect :('; }

	//see all data

}
?>
</body>
</html>