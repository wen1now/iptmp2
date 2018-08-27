<?php
session_start()
?>
<!DOCTYPE html>
<html>
<head>
	<title>Log in</title>
</head>
<body>
	<h2>Critical Miss</h2>
	<form name="letmein" method="post" action="index.php">
		Username: <input type="text" name="username"><br>
		Password: <input type="password" name="password"><br>
		<input type="submit" value="Log In">
	</form>

<?php
$_SESSION["username"] = $_POST["username"];
$_SESSION["password"] = $_POST["password"]
?>
</body>
</html>
