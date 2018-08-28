<?php
session_start()
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
<body background="bgroundtiles.jpg">
	<h2><font color="ffffff">Critical Miss</font></h2>
	<form name="gotologin" method="post" action="login.php">
		<input type="submit" name="Log In" value="Log In">
	</form>
	
	<form name="gotoregister" method="post" action="register.php">
		<input type="submit" name="Create Account" value="Create Account">
	</form>

</body>
</html>