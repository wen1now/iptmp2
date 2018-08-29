<?php
session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<body>
	<div id="titlestuff">Report A Bug</div>
	<?php
	if (isset($_SESSION['userid'])){
		include('menuitems.php');
	} else {
		include('menuitemsnotloggedin.php');
		}
	?>
	<center>
	"It can take a site a while to figure out that there's a problem with their 'report a bug' form."<br>-- Randall Munroe<br><br>
	<img src="images/problem_reporting.png" alt="Italian Trulli"></center>
</body>
</html>
