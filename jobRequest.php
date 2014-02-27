<?php

	session_start(); 

	include("included/openDB.php");
	include("included/leftMenu.php"); 
	include("included/tabledump.php");
	openDB();

?>

<html>
<head> 
	<link rel= "stylesheet" href="style.css" type="text/css" />
</head>

<body>

<div id="container">

<div id="logo" style=" text-align: left">
	     <img src= "images/upperlogo.png" alt="logo"/>

</div>

<?php leftMenu(); ?>

<?php

	$jobID=addslashes($_GET['career']); 
	$query="SELECT * FROM Job WHERE id='$jobID';"; 
	$result=mysql_query($query); 
	
	if(noerror($result))
	{
		tabledump($result); 
	}
	
	$q2="SELECT * FROM MajorJob, Major WHERE majorID=id AND jobID='$jobID';";
	$r2=mysql_query($q2); 
	
	if(noerror($r2))
	{
		tabledump($r2);
	}
	
?>

</body>
</html>

