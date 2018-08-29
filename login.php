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
	<div id="titlestuff">Critical Miss: Login</font></div>
	<?php
	if (isset($_SESSION['userid'])){
		include('menuitems.php');
		/*echo '<h2>Critical Miss: Menu</font></h2></div>
		<div id="leftbar">
			<div class="menuitem" onclick="location.href=\'logout.php\';" id="topmenuitem" >Logout</a></div>
			<div class="menuitem" onclick="location.href=\'create.php\';">Create room</div>
			<div class="menuitem" onclick="location.href=\'find.php\';">Find room</div>
			<div class="menuitem" onclick="location.href=\'about.php\';">About</div>
			<div class="menuitem" onclick="location.href=\'reportbug.php\';">Report a bug</div>
		';*/
	} else {
		include('menuitemsnotloggedin.php');
		}
	?>
<center>
	<form name="letmein" method="post" action="login.php">
		<span class="preformatted">Username:</span><input type="text" name="username"><br>
		<span class="preformatted">Password:</span><input type="password" name="password"><br>
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