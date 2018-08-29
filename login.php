<?php
session_start()
?>
<!DOCTYPE html>
<html>
<head>
	<title>Log in</title>

<link rel="stylesheet" href="style.css">
</head>
<body>
	<div id="titlestuff">Login</font></div>
	<?php
	if (isset($_SESSION['userid'])){
		include('menuitems.php');
	} else {
		include('menuitemsnotloggedin.php');
		}
	?>
<center>
	<form name="letmein" method="post" action="login.php">
		<span class="preformatted">Username:</span><input type="text" name="username"><br>
		<span class="preformatted">Password:</span><input type="password" name="password"><br>
		<input type="submit" value="Log In" name="submitlogin">
	</form>

<?php
if (isset($_POST['submitlogin'])){
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
   		$_SESSION["userid"] = mysqli_fetch_row($data)[0];
   		header("LOCATION: find.php");}
	else
   		{ echo 'Either your username or password was incorrect :('; }

	//see all data

}
?>
</center>
</body>
</html>