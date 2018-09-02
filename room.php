<?php 
session_start();
?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
<link rel="stylesheet" href="window_thing/main.css">
<link rel="stylesheet" href="roomstyle.css">
</head>
<body>
	Protip: click and drag the top of the windows to reposition them
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
	echo '<br><div>Room id: '.$_GET['roomid'].'</div>';
	$user = $_SESSION['userid'];
	$room = $_GET['roomid'];
	require('connect.php');

	$qry = 'select pointer, username from users where userid in (select userid from characters where roomid = '
		.$room.')';

		echo('<div class="drag users" onmousedown="totop(this)"><div class="topbar"><b>Users:</b></div>');
	//this displays all users within the room in the colour they have chosen as their pointer
	$userslist = mysqli_query($connection,$qry);
	while (list($col1,$col2) = mysqli_fetch_row($userslist))
		{	
			echo '<font color ="'.$col1.'">'.$col2.'</font>, ' ;
		}
	echo '</div>';

	$qry = 'select displayname,textcolour,send_date,blurb,username from messages,aliases,users where Messages.roomid = '.$room.' and messages.alias = aliases.aliasid and messages.userid = users.userid order by send_date';

	echo('<div class="drag messages" onmousedown="totop(this)" style="left:50px;top:40px"><div class="topbar"><b>Messages:</b></div>');
	$messagelist = mysqli_query($connection,$qry);
	while (list($col1,$col2,$col3,$col4,$col5) = mysqli_fetch_row($messagelist))
		{
			echo '<h4><font color ="'.$col2.'">'.$col5.' as '.$col1.' said '.$col4.' on '.$col3.'</font></h4>';
		}

	$qry = 'select displayname,textcolour,username from Aliases,Users where aliases.owner = Users.userid and roomid = '.$room;

	echo('aliases:<br>');
	$aliaslist = mysqli_query($connection,$qry);
	while (list($col1,$col2,$col3) = mysqli_fetch_row($aliaslist))
		{
			echo '<h4><font color ="'.$col2.'">'.$col3.' as '.$col1.'</font></h4>';
		}
 ?>
 	<form name="sendmessage" method="post" action ="room.php">
 		Send<input type="text" name="message"><br>as:<input type="text" name="alias">
 		<input type="submit" name="submitmessage" value="send">
 	</form>


<script type="text/javascript" src="window_thing/interact.js"></script>
<script type="text/javascript" src="window_thing/main.js"></script>
</body>
</html>