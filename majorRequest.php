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

	//get and display Major and description 
	$majorID=addslashes($_GET['major']); 

	$query="SELECT * FROM Major WHERE id='$majorID';"; 
	$result=mysql_query($query); 
	
	if(noerror($result))
	{
		$row = mysql_fetch_array($result); 
		$major = $row['major'];
		$des = $row['description']; 
		$dep = $row['department'];
		
		echo "<p> \n"; 
		echo "<h1>$major</h1> \n"; 
		echo "<h2>$dep Department</h2> \n"; 
		echo "$des \n"; 
		echo "</p> \n"; 
	}
	
	$q2="SELECT * FROM MajorJob, Job WHERE jobID=id AND majorID='$majorID';";
	$r2=mysql_query($q2); 

 			echo "<h3> Career Opportunities </h3> \n"; 
			
	if(noerror($r2))
	{
		$nr = mysql_num_rows($r2);
		for($i=0; $i<$nr; $i++)
		{
			$row = mysql_fetch_array($r2); 
			$job = $row['career']; 
			$jdes= $row['description']; 

			echo "<p> \n";
			echo "$job: $jdes \n"; 			
			echo "</p> \n"; 
		}
	}

	
?>

</body>
</html>

