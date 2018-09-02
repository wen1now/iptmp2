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
		echo '<div id="titlestuff">Critical Miss</font></div>';
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
	<p>
		Hi there!<br>
		<- Navigate the site using the menu bar located to the left. 'About' will give a general description of what this site is about.
		

</body>
</html>