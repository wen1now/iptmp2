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

$userslist = mysqli_query($connection,$qry);

$qry = 'select * from notes'
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

</body>
</html>