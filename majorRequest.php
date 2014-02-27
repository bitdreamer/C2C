<?php

	session_start(); 
    $bug = false;
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

	$majorID=$_POST['major']; 
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

 			echo "<h3> Career Options </h3> \n"; 
			
	if(noerror($r2))
	{
		$nr = mysql_num_rows($r2);
		for($i=0; $i<$nr; $i++)
		{
			$row = mysql_fetch_array($r2); 
			$job = $row['career']; 
			$jdes= $row['description']; 

			echo "<p> \n";
			echo "$job \n"; 			
			echo "</p> \n"; 
		}
	}
	
	$linkQ="SELECT * FROM MajorLink, Link WHERE MajorLink.linkID=Link.linkID AND majorID='$majorID';"; 		//one linkID from Link table, one from MajorLink table
	$linkR=mysql_query($linkQ);
	
		echo "<h3> Related Websites</h3> \n"; 
	
	if(noerror($linkR))
	{
		$nr = mysql_num_rows($linkR);
		if ( $bug) { echo "number of links found = ".$nr; }
		for($i=0; $i<$nr; $i++)
		{
			$row  = mysql_fetch_array($linkR);
			$link = $row['link']; 
		
			echo "<p> \n";
			echo "$link \n";
			echo "</p> \n"; 
		}
	}	
	else { if ($bug) { echo "error in link query"; } }
			
	

	
?>

</body>
</html>

