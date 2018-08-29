<?php 
	session_start()
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Create Room</title>
</head>
<body>
	<center>
		<h2><font color="ffffff">Critical Miss: REGISTER</font></h2>
		<form name="letmein" method="post" action="register.php">
			<font color="ffffff">Room Name:</font> <input type="text" name="roomname"><br>
			<font color="ffffff">Room Key:</font> <input type="password" name="roomkey"><br>
			<font color="ffffff">Capacity:</font> <input type="number" name="capacity" min="1" max="9">
			<input type="submit" name="submit" value="Create">
	</form>
	</center>

	<?php


	if (isset($_POST['submit'])){
		//user HAS posted data
		//connect to the db
		require ('connect.php');
		//go get the raw data
		$owner = $_SESSION['userid']
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