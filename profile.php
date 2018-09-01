<?php 
	session_start()
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
	<?php
	if (isset($_SESSION['userid'])){
		//$username = $_SESSION['userid'];
		/*
		require ('connect.php');
		$userid = $_SESSION['userid'];
		$qry = 'select username from users where userid = "'.$userid.'"';
		$data = mysqli_query($connection,$qry);
		while (list($col1) = mysqli_fetch_row($data))
		{
			$username = $col1;
		}*/
		echo '<div id="titlestuff">Profile</font></div>';
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
		//redirect user to login
		$message = "You are not logged in; login to view this page";
		echo "<script type='text/javascript'>alert('".$message."');window.location.href='login.php';</script>";
		}
	?>
		<form name="changeprofile" method="post" action="profile.php">
			<font>Username:</font> <input type="text" name="newname" value=<?php echo($username);?>><br>
			<input type="submit" name="submitprofile" value="Change">
	</form>
	</center>

	<?php


	if (isset($_POST['submitprofile'])){
		//user HAS posted data
		//connect to the db
		//go get the raw data
		$user = $_SESSION['userid'];
		$newname = $_POST['newname'];

		//plateitup
		$qry = 'update users set username ="'.$newname.'" where userid ="'.$user.'"';
		if (mysqli_query($connection,$qry))
		   		{ echo 'Changes saved';
		   		header("LOCATION: find.php");}
			else
		   		{ echo 'Error detected; please try again - '.mysqli_error(); }

	}
	?>
</body>
</html>