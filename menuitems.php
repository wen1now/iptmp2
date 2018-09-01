<?php
require ('connect.php');
		$userid = $_SESSION['userid'];
		$qry = 'select username from users where userid = "'.$userid.'"';
		$data = mysqli_query($connection,$qry);
		while (list($col1) = mysqli_fetch_row($data))
		{
			$username = $col1;
		}
echo '
<div id="leftbar">
	<div class="menuitem" onclick="location.href=\'profile.php\';">Welcome, '.$username.'</div>
	<div class="menuitem" onclick="location.href=\'create.php\';">Create room</div>
	<div class="menuitem" onclick="location.href=\'find.php\';">Find room</div>
	<div class="menuitem" onclick="location.href=\'about.php\';">About</div>
	<div class="menuitem" onclick="location.href=\'reportbug.php\';">Report a bug</div>
	<div class="menuitem" onclick="if(confirm(\'Are you sure you wish to log out\')){window.location.href=\'logout.php\';}" id="menuitem" >Logout</div>
	</div>
<div id="mainarea">
';
?>