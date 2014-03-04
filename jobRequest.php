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

     <div id="content" style="background-color:#EEEEEE;height:200px;width:400px;float:right;">
<?php

	$jobID=addslashes($_GET['career']); 
	
	$query="SELECT * FROM Job WHERE id='$jobID';"; 
	$result=mysql_query($query); 
	
	if(noerror($result))
	{
		$row = mysql_fetch_array($result); 
		$job = $row['career']; 
		$des = $row['description']; 
		
		echo "<h1>$job</h1> \n"; 
		echo "<p>$des</p> \n"; 
	}
	
	$q2="SELECT * FROM MajorJob, Major WHERE majorID=id AND jobID='$jobID';";
	$r2=mysql_query($q2); 
	
	if(noerror($r2))
	{
		echo "<h3>Want to be a $job?...Major in:</h3> \n"; 
		
		$nr = mysql_num_rows($r2);
		for($i=0; $i<$nr; $i++)
		{
			$row     = mysql_fetch_array($r2); 
			$major   = $row['major'];
			$majorID = $row['id']; 
			
			echo "<a href='majorRequest.php?major=$majorID'>$major</a> \n"; 
		}
	}
	
?>
   </div>
</body>
</html>

