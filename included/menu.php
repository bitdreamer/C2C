<?php
//Creates normal menu bar
function openMenu()
{
echo "<nav>";
echo"<ul>";

echo "<li> <a href=../index.html>Main</a></li>";

echo "</ul>";
echo "</nav>";
}


//Creates menu bar for adding additional info
function openAddMenu()
{
echo "<nav>";
echo "<ul>";

echo "<li> <a href=../admin/majorAdd.php?PHPSESSID=".session_id().">Major</a></li>";
echo "<li> <a href=../admin/jobAdd.php?PHPSESSID=".session_id().">Job</a></li>";
echo "<li> <a href=../admin/alumnaAdd.php?PHPSESSID=".session_id().">Alumna</a></li>";
echo "<li> <a href=../admin/interestAdd.php?PHPSESSID=".session_id().">Interest</a></li>";
echo "<li> <a href=../admin/opportunityAdd.php?PHPSESSID=".session_id().">Opportunities</a></li>";
echo "<li> <a href=../admin/linkAdd.php?PHPSESSID=".session_id().">Links</a></li>";
if($_SESSION['islogged']!=0)
		{echo "<li> <a href=../login/logout.php?PHPSESSID=".session_id().">Logout</a></li>";}
	echo $_SESSION['loginok'];
echo "</ul>";
echo "</nav>";
}
?>