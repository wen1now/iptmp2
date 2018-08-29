<?php
session_start()
?>

<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" href="style.css">
<center>
	<?php
	if (isset($_SESSION['userid'])){
<<<<<<< HEAD
		echo '<div id="titlestuff"><h2>Critical Miss</font></h2></div>';
=======
		echo '<div id="titlestuff">Room select</font></div>';
>>>>>>> f61b7a1a7d9439d7808d8548d4027bdb12ec1e24
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
		include('menuitemsnotloggedin.php');
		}
	?>

</body>
</html>