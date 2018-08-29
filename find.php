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
		/*echo '<h2>Critical Miss: Menu</font></h2></div>
		<div id="leftbar">
			<div class="menuitem" onclick="location.href=\'logout.php\';" id="topmenuitem" >Logout</a></div>
			<div class="menuitem" onclick="location.href=\'create.php\';">Create room</div>
			<div class="menuitem" onclick="location.href=\'find.php\';">Find room</div>
			<div class="menuitem" onclick="location.href=\'about.php\';">About</div>
			<div class="menuitem" onclick="location.href=\'reportbug.php\';">Report a bug</div>
		';*/
	} else {
		//redirect user to login
		$message = "You are not logged in; login to view this page";
		echo "<script type='text/javascript'>alert('".$message."');window.location.href='login.php';</script>";
		}
	?>

</body>
</html>
