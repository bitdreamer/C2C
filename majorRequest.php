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
	
	//get and display job options 
	$q2="SELECT * FROM MajorJob, Job WHERE jobID=id AND majorID='$majorID';";
	$r2=mysql_query($q2); 

 			echo "<h3> Career Options </h3> \n"; 
			
	if(noerror($r2))
	{
		$nr = mysql_num_rows($r2);
		for($i=0; $i<$nr; $i++)
		{
			$row = mysql_fetch_array($r2); 
			$job  = $row['career']; 
			$jdes = $row['description']; 
			$jobID  = $row['id']; 

			//echo "<a href='jobRequest.php?career=$jobID'>$job</a> \n"; 			
			
			echo "<table class='jobs' \n"; 
				echo "	summary='List of career options for a particular major'> \n"; 
					
				echo "	<colgroup> \n"; 
				echo "	<col class='jobs' span='1' /> \n"; 
				echo "		</colgroup> \n"; 
				echo " 	<thead> \n"; 
				echo " 	<tr> \n"; 
				echo "  </tr> \n"; 
				echo "  </thead> \n"; 

				echo "  <tbody> \n"; 
				echo "  <tr> \n"; 
				echo "	  <th> \n"; 
				echo "		<a href='jobRequest.php?career=$jobID'>$job</a> \n";
				echo "	  </th> \n";
				echo " 	</tr> \n";
				echo " 	</tbody> \n";
				echo "	</table> \n";
		}
	}
	
	$linkQ="SELECT * FROM MajorLink, Link WHERE linkID=ID AND majorID='$majorID';"; 		//one linkID from Link table, one from MajorLink table
	$linkR=mysql_query($linkQ);
	
		echo "<h3> Related Websites</h3> \n"; 
	
	if(noerror($linkR))
	{
		$nr = mysql_num_rows($linkR);
		for($i=0; $i<$nr; $i++)
		{
			$row  = mysql_fetch_array($linkR);
			$link = $row['link']; 
		
			//echo "<p> \n";
			//echo "<a href='$link'> $link </a> \n";
			//echo "</p> \n"; 
			
			echo "<table class='links' \n"; 
				echo "	summary='List of related links for a particular major'> \n"; 
					
				echo "	<colgroup> \n"; 
				echo "	<col class='links' span='1' /> \n"; 
				echo "		</colgroup> \n"; 
				echo " 	<thead> \n"; 
				echo " 	<tr> \n"; 
				echo "  </tr> \n"; 
				echo "  </thead> \n"; 

				echo "  <tbody> \n"; 
				echo "  <tr> \n"; 
				echo "	  <th> \n"; 
				echo "		<a href='$link'> $link </a> \n";
				echo "	  </th> \n";
				echo " 	</tr> \n";
				echo " 	</tbody> \n";
				echo "	</table> \n";
		}
	}

	
?>

</body>
</html>

