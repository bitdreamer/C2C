<?php
	function mainMenu() 
	{
		echo"<nav>";
		echo"<ul>"; 
		echo"	<li><a href=./index.php?PHPSESSID=".session_id().">Career PathWays</a></li>";
        	echo"	<li><a href=./quiz.php?PHPSESSID=".session_id().">Major Match Maker</a></li>";

		echo "<li><strong>Admin</strong></li>";
		
		if($_SESSION['islogged']!=0)
		{
			echo "<li> <a href=./admin/majorAdd.php?PHPSESSID=".session_id().">Major</a></li>";
			echo "<li> <a href=./admin/jobAdd.php?PHPSESSID=".session_id().">Job</a></li>";
			echo "<li> <a href=./admin/alumnaAdd.php?PHPSESSID=".session_id().">Alumna</a></li>";
			echo "<li> <a href=./admin/interestAdd.php?PHPSESSID=".session_id().">Interest</a></li>";
			echo "<li> <a href=./admin/opportunityAdd.php?PHPSESSID=".session_id().">Opportunities</a></li>";
			echo "<li> <a href=./admin/linkAdd.php?PHPSESSID=".session_id().">Links</a></li>";

			if($_SESSION['accessLv'] == 2)
			{
				echo "<li> <a href=./login/main_register.php?PHPSESSID=".session_id().">Add Admin</a></li>";
			}

			echo "<li> <a href=./login/logout.php?PHPSESSID=".session_id().">Logout</a></li>";

		}
		else
		{
			echo "<li> <a href=./login/main_login.php?PHPSESSID=".session_id().">Login</a></li>";
		}
		echo"</ul>";
		echo"</nav>";
	}
?>