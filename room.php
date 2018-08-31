<?php 
session_start();
?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
	if ((!isset($_SESSION['userid'])) or (!isset($_GET['roomid']))) {

		//header('location: find.php');
	} 
	echo 'Room id: '.$_GET['roomid'];
	$user = $_SESSION['userid'];
	$room = $_GET['roomid'];
	require('connect.php');

	$qry = 'select * from users where user in (select userid from characters where roomid = "'
		.$room.'")';


	//this displays all users within the room in the colour they have chosen as their pointer
	$userslist = mysqli_query($connection,$qry);
	echo ''.$userslist;
	while (list($col1,$col2,$col3,$col4,$col5) = mysqli_fetch_row($userslist))
		{	
			echo '<h4><font color ="'.$col4.'">'.$col3.'</font></h4><br>' ;
		}

	$qry = 'select displayname,textcolour,send_date,blurb from messages,aliases where Messages.roomid = '.$room.' and messages.alias = aliases.aliasid order by send_date'

	$messagelist = mysqli_query($connection,$qry);
	while (list($col1,$col2,$col3,$col4) = mysqli_fetch_row($messagelist))
		{
			echo '<h4><font color ="'.$col3.'">'.$col1.' said '.$col4.' on '.$col3.'</font></h4><br>';
		}

 ?>
</body>
</html>