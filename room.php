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
	/*
	if (isset($_POST['submitcreate'])){
		//user HAS posted data
		//connect to the db
		require ('connect.php');
		//go get the raw data
		$user = $_SESSION['userid'];
		$message = $_POST['message'];
		$roomkey = $_POST['alias'];

		//check alias is valid

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
	   		{ echo '';}
		else
	   		{ echo 'Error detected; please try again - '.mysqli_error(); }*/

	if ((!isset($_SESSION['userid'])) or (!isset($_GET['roomid']))) {

		//header('location: find.php');
	} 
	echo 'Room id: '.$_GET['roomid'].'<br>';
	$user = $_SESSION['userid'];
	$room = $_GET['roomid'];
	require('connect.php');

	$qry = 'select pointer, username from users where userid in (select userid from characters where roomid = '
		.$room.')';


	//this displays all users within the room in the colour they have chosen as their pointer
	$userslist = mysqli_query($connection,$qry);
	while (list($col1,$col2) = mysqli_fetch_row($userslist))
		{	
			echo '<font color ="'.$col1.'">'.$col2.'</font>, ' ;
		}

	$qry = 'select displayname,textcolour,send_date,blurb from messages,aliases where Messages.roomid = '.$room.' and messages.alias = aliases.aliasid order by send_date';

	$messagelist = mysqli_query($connection,$qry);
	while (list($col1,$col2,$col3,$col4) = mysqli_fetch_row($messagelist))
		{
			echo '<h4><font color ="'.$col3.'">'.$col1.' said '.$col4.' on '.$col3.'</font></h4><br>';
		}

 ?>
 	<form name="sendmessage" method="post" action ="room.php">
 		Send<input type="text" name="message">as:<input type="text" name="alias">
 		<input type="submit" name="submitmessage" value="send">
 	</form>


</body>
</html>