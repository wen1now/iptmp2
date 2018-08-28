<?php
session_start();
if (!isset($_session['username'])) {
 header("LOCATION: index.php");
 }
 ?>
<!DOCTYPE html>
<html>
<head>
<style> 
body {
    background-image: url("images/bgroundtiles.jpg");
}
</style>
</head>
<body>
	<?php
	$username = $_SESSION['username'];
	echo '<h3><font color="ffffff">Welcome '.$username.'</font></h3>';
	 
	?>
	<h2><font color ='ffffff'>Critical Miss: Menu</font></h2>
	<h3><font color = 'ffffff'></font></h3>
	<form name="gomakeroom" method="post" action="">
		<input type="submit" name="Log In" value="Log In">
	</form>
	
	<form name="gofindroom" method="post" action="">
		<input type="submit" name="Create Account" value="Find Room">
	</form>>

	<form name="gocollection" method="post" action="">
		<input type="submit" name="Create Account" value="Create Room">
	</form>
	<form name="gologout" method="post" action="index.php">
		<input type="submit" name="Sign Out" value="Log Out">
	</form>
</body>
</html>
