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
	unset($_SESSION['userid']);
	$message = "Logout successful; you will be redirected";
	echo "<script type='text/javascript'>alert('".$message."');window.location.href='index.php';</script>";
	?>

</body>
</html>
