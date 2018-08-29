<?php 
	session_start()
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Create Room</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
	<?php
	if (isset($_SESSION['userid'])){
		$username = $_SESSION['userid'];
		echo '<div id="titlestuff">Create</font></div>';
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
		<form name="createroom" method="post" action="create.php">
			<font>Room Name:</font> <input type="text" name="roomname"><br>
			<font>Room Key:</font> <input type="password" name="roomkey"><br>
			<font>Capacity:</font> <input type="number" name="capacity" min="1" max="9">
			<input type="submit" name="submitcreate" value="Create">
	</form>
	</center>

	<?php


	if (isset($_POST['submitcreate'])){
		//user HAS posted data
		//connect to the db
		require ('connect.php');
		//go get the raw data
		$owner = $_SESSION['userid'];
		$roomname = $_POST['roomname'];
		$roomkey = $_POST['roomkey'];
		$capacity = $_POST['capacity'];

		//plateitup
		$qry = 'insert into Rooms(owner,roomname,keyphrase,capacity) values ("'
			.$owner
			.'","'
			.$roomname
			.'","'
			.$roomkey
			.'","'
			.$capacity
			.'")';

		//execute
		if (mysqli_query($connection,$qry))
	   		{ echo 'Registration successful';}
		else
	   		{ echo 'Error detected; please try again - '.mysqli_error(); }


	}
	?>
</body>
</html>