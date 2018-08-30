<?php 
session_start();
if (!isset($_SESSION['userid'])) or !isset($_SESSION['roomid']) {
	header('location: find.php');
} 
$user = $_SESSION['userid'];
$room = $_SESSION['roomid'];
require('connect.php');

$qry = 'select * from users where user in (select userid from characters where roomid = "'
	.$room.'")';


//this displays all users within the room in the colour they have chosen as their pointer
$userslist = mysqli_query($connection,$qry);
while list($col1,$col2,$col3,$col4,$col5) = mysql_fetch_row($userslist)
	{	
		echo('<h4><font color ="'.$col4.'">'.$col3.'</font><h4>');
	}


 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

</body>
</html>