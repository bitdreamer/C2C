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

echo "<li> <a href=../admin/addMajor.php>Major</a></li>";
echo "<li> <a href=../admin/addJob.php>Job</a></li>";
echo "<li> <a href=../admin/addAlumna.php>Alumna</a></li>";
echo "<li> <a href=../admin/addInterest.php>Interest</a></li>";
echo "<li> <a href=../admin/addOppertunity.php>Oppertunities</a></li>";
echo "<li> <a href=../admin/addAssociation.php>Associations</a></li>";
echo "<li> <a href=../admin/addLink.php>Links</a></li>";

echo "</ul>";
echo "</nav>";
}
?>