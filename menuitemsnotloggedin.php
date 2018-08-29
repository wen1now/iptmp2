<?php
//add something at the top to indicate not logged in
echo '
<div id="leftbar">
	<div class="menuitem" onclick="location.href=\'login.php\';">Login</a></div>
	<div class="menuitem" onclick="location.href=\'register.php\';">Register</div>
	<div class="menuitem" onclick="location.href=\'about.php\';">About</div>
	<div class="menuitem" onclick="location.href=\'reportbug.php\';">Report a bug</div>
	</div>
<div id="mainarea">
';
?>