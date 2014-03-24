<?php
	function leftMenu() 
	{
		echo"<nav>";
		echo"<ul class='links'> \n"; 
		echo"	<li><a href='http://www.meredith.edu'> Meredith College</a></li> \n"; 
		echo"	<li><a href='http://www.bitlab.meredith.edu/~c2c/'> Main Page </a></li> \n"; 
		echo"	<li><a href='index.php'> Career PathWays </a></li> \n";
        	echo"	<li><a href='quiz.php'> Major Match Maker</a></li> \n";
		
		if($_SESSION['islogged']!=0)
		{
			echo "<li> <a href=../admin/majorAdd.php?PHPSESSID=".session_id().">Major</a></li>\n";
			echo "<li> <a href=../admin/jobAdd.php?PHPSESSID=".session_id().">Job</a></li>\n";
			echo "<li> <a href=../admin/alumnaAdd.php?PHPSESSID=".session_id().">Alumna</a></li>\n";
			echo "<li> <a href=../admin/interestAdd.php?PHPSESSID=".session_id().">Interest</a></li>\n";
			echo "<li> <a href=../admin/opportunityAdd.php?PHPSESSID=".session_id().">Opportunities</a></li>\n";
			echo "<li> <a href=../admin/linkAdd.php?PHPSESSID=".session_id().">Links</a></li>\n";
			echo "<li> <a href=../login/logout.php?PHPSESSID=".session_id().">Logout</a></li>\n";
		}
		else
		{
			echo "<li> <a href=../login/main_login.php?PHPSESSID=".session_id().">Login</a></li>";
		}
		echo"</ul>	\n";
		echo"</nav>";
	}
?>