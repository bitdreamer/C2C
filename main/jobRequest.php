<?php

	session_start(); 

	include("../included/openDB.php");
	include("../included/leftMenu.php"); 
	include("../included/tabledump.php");
	openDB();

?>

<!-- main Page -->
<html>

<head>
	<link rel= "stylesheet"type="text/css"  href="../style.css"  />
	<title> Carrer Pathways</title>
</head>

<!--logo-->
<body> 	   
	<div id="darkgray"></div>
	<div id="logo"></div>
	<div id="lightgray"></div>
	
	
<!--left Menu-->
<div id="links">
	<?php leftMenu(); ?>
</div>

<!--main content-->
<div id="text">
    <!-- <div id="content" style="background-color:#EEEEEE;height:200px;width:400px;float:right;">-->
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
			
			echo "<a href='majorRequest.php?major=$majorID'>$major</a> \n</p>"; 
		}
	}
	
?>
 </div>
 
   <div id="footer"></br>
	   <address >
	    		<a href="https://www.google.com/maps/place/Meredith+College/@35.7983206,
	   			   -78.6889146,16z/data=!3m1!4b1!4m2!3m1!1s0x89acf5c670c2dbc5:0x179f9c722569698c/">
	    				3800 Hillsborough Street | Raleigh, NC 27607-5298</br>
       					Phone: (919) 760-8600 or 1-800 MEREDITH
       	</address>	
      	
	</div>	
		
</body>
</html>

