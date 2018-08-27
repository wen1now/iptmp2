<?php
session_start()
?>

<!DOCTYPE html>
<html>
<head>
	<title>Critical Miss</title>
</head>
<body>
	<h3>Critical Miss</h3>
	<form name="gotologin" method="post" action="login.php">
		<input type="submit" name="Log In" value="Log In">
	</form>
	
	<form name="gotoregister" method="post" action="register.php">
		<input type="submit" name="Create Account" value="Create Account">
	</form>

</body>
</html>