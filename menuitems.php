<?php
echo '
<div id="leftbar">
	<div class="menuitem" onclick="location.href=\'create.php\';">Create room</div>
	<div class="menuitem" onclick="location.href=\'find.php\';">Find room</div>
	<div class="menuitem" onclick="location.href=\'about.php\';">About</div>
	<div class="menuitem" onclick="location.href=\'reportbug.php\';">Report a bug</div>
	<div class="menuitem" onclick="if(confirm(\'Are you sure you wish to log out\')){window.location.href=\'logout.php\';}" id="menuitem" >Logout</div>
	</div>
<div id="mainarea">
';
?>