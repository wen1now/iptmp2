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
<div id="back" onclick="window.location.href='find.php'"><- Back</div>
<div>Protip: click and drag the top of the windows to reposition them</div>
<?php
	if ((!isset($_SESSION['userid'])) or (!isset($_GET['roomid']))) {

		header('location: find.php');
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

	$qry = 'select displayname,textcolour,send_date,blurb,username from messages,aliases,users where Messages.roomid = '.$room.' and Messages.roomid = aliases.roomid and users.userid = aliases.owner order by send_date desc limit 20';

	echo('<div class="drag messages" onmousedown="totop(this)" style="left:50px;top:40px"><div class="topbar"><b>Messages:</b></div>');
	$messagelist = mysqli_query($connection,$qry);
	echo '<div id="messagelist">';
	while (list($col1,$col2,$col3,$col4,$col5) = mysqli_fetch_row($messagelist))
		{
			echo '<font color ="'.$col2.'">'.$col4.' <span class="small">'.$col1.' as '.$col5.', '.$col3.'</span></font><br>';
		}
	echo '</div>';


	if (isset($_POST['submitmessage']) and $_POST['message']!=''){
		//user HAS posted data
		//connect to the db
		require ('connect.php');
		//go get the raw data
		$message = $_POST['message'];
		$alias = $_POST['alias'];

		//check alias is valid
		$qry = 'select * from Aliases where owner='.$user.' and roomid = '.$room;
		$data = mysqli_query($connection,$qry);
		if (mysqli_num_rows($data) == 0){
			$qry = 'select username,pointer from Users where userid='.$user;
			$data = mysqli_query($connection,$qry);
   			list($username,$colour) = mysqli_fetch_row($data);
			$qry = 'insert into Aliases(displayname,textcolour,roomid,owner) values ("'
			.$username
			.'","'
			.$colour
			.'",'
			.$room
			.','
			.$user
			.')';
			mysqli_query($connection,$qry);

		} else {echo "Invalid alias; view the aliases window for ones that you may use.";}


		//plateitup
		$qry = 'insert into Messages(roomid,userid,alias,send_date,blurb) values ('
			.$room
			.','
			.$user
			.',"'
			.$alias
			.'","'
			.date("Y-m-d H:i:s")
			.'","'
			.$message
			.'")';
		//execute
		if (mysqli_query($connection,$qry))
	   		{}
		else
	   		{ echo 'Unfortunately that is not a valid alias; check the available aliases (above) for a valid one'; }
	  }
	echo '
 	<div id="sendmessage">
 	<form name="sendmessage" method="post" action ="">
 		Send<input type="text" name="message"><br>as:<input type="text" name="alias">
 		<input type="submit" name="submitmessage" value="send">
 	</form>
 	</div></div>';
	echo('<div class="drag aliases" onmousedown="totop(this)" style="left:100px;top:80px"><div class="topbar"><b>Aliases:</b></div>');
	$qry = 'select displayname,textcolour,username from Aliases,Users where aliases.owner = Users.userid and roomid = '.$room;
	$aliaslist = mysqli_query($connection,$qry);
	while (list($col1,$col2,$col3) = mysqli_fetch_row($aliaslist))
		{
			echo '<font color ="'.$col2.'">'.$col3.' as '.$col1.'</font>';
		}
	echo '</div>';
 ?>


<script type="text/javascript" src="window_thing/interact.js"></script>
<script type="text/javascript" src="window_thing/main.js"></script>
</body>
</html>