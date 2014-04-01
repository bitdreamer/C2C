<?php
	function mainMenu() 
	{
		//Always display the main links, and the Admin list header
		echo"<nav>\n
			<ul>\n
			<li><a href='./index.php'>Career PathWays</a></li>\n
        		<li><a href='./quiz.php'>Major Match Maker</a></li>\n
			
			<li><strong>Admin</strong></li>\n";
		
		//If admin is logged in, display pages that all admins can access, and the logout link
		if($_SESSION['islogged']!=0)
		{
			echo"<li> <a href='./admin/majorAdd.php'>Major</a></li>\n
				<li> <a href='./admin/jobAdd.php'>Job</a></li>\n
				<li> <a href='./admin/alumnaAdd.php'>Alumna</a></li>\n
				<li> <a href='./admin/interestAdd.php'>Interest</a></li>\n
				<li> <a href='./admin/opportunityAdd.php'>Opportunities</a></li>\n
				<li> <a href='./admin/linkAdd.php'>Links</a></li>\n";
			
			//If full-admin is logged in, dislay main_register page link
			if($_SESSION['accessLv'] == 2)
			{
				echo "<li> <a href='./login/main_register.php'>Add Admin</a></li>\n";
			}

			echo "<li> <a href='./login/logout.php'>Logout</a></li>\n";
		}
		//If user id NOT logged in, display the login link
		else
		{
			echo "<li> <a href='./login/main_login.php'>Login</a></li>\n";
		}
		echo"</ul>\n
			</nav>\n";
	}
?>