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
	require ('connect.php');
	if (isset($_SESSION['userid'])){
		$username = $_SESSION['userid'];
		echo '<div id="titlestuff">Room select</font></div>';
		include('menuitems.php');
		echo '
	<form name="findroom" method="post" action="find.php">
		<span class="preformatted">Roomid: </span><input type="text" name="roomid">
		<input type="submit" value="Search" name="submitfind">
	</form>';
	} else {
		//redirect user to login
		$message = "You are not logged in; login to view this page";
		echo "<script type='text/javascript'>alert('".$message."');window.location.href='login.php';</script>";
		}
	if (isset($_POST['submitfind'])){
		$roomid = $_POST['roomid'];
		$qry = 'select username,roomname,roomid from Rooms,Users where Rooms.owner = Users.userid
		and roomid = "'.$roomid.'"';

	} else {
		$qry = 'select username,roomname,roomid from Rooms,Users where Rooms.owner = Users.userid limit 10';
	}
		//execute
	$data = mysqli_query($connection,$qry);

	if (mysqli_num_rows($data) != 0)
   		{while (list($username, $roomname, $roomid) = mysqli_fetch_row($data)){
   			echo '<div class="roomitem" onclick = "window.location.href=\'room.php?roomid='.$roomid.'\';">
   			<div class="roomname">'.$roomname.'</div><div class="owner">'.$username.'</div></div>';
   		}}
	else
   		{ echo 'There are no rooms at the moment'; }
	?>

</body>
</html>
