<?php
session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<body>
	<?php
	if (isset($_SESSION['userid'])){
		$username = $_SESSION['userid'];
		echo '<div id="titlestuff">Room select</font></div>';
		include('menuitems.php');
	} else {
		//redirect user to login
		$message = "You are not logged in; login to view this page";
		echo "<script type='text/javascript'>alert('".$message."');window.location.href='login.php';</script>";
		}
	if (isset($_POST['submitfind'])){
		$roomid = $_POST['roomid']
		$qry = 'select * from Rooms where roomid = '
			.$roomid;
		//execute
		$data = mysqli_query($connection,$qry);

	} else {
		///FIX THIS QUERY

		if (mysqli_num_rows($data) != 0)
	   		{
	   		$_SESSION["userid"] = mysqli_fetch_row($data)[0];
	   		header("LOCATION: find.php");}
		else
	   		{ echo 'Either your username or password was incorrect :('; }
	}
	?>
	<form name="findroom" method="post" action="find.php">
		<span class="preformatted">Roomid: </span><input type="text" name="roomid">
		<input type="submit" value="Search" name="submitfind">
	</form>

</body>
</html>
