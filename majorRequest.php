<?php

	session_start(); 

	include("included/openDB.php");
	include("included/leftMenu.php"); 
	include("included/tabledump.php");
	openDB();

?>

<!-- main Page -->
<html>

<head>
	<link rel= "stylesheet"type="text/css"  href="style.css"  />
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

<div id="text">
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
		echo "<h2 id='major'>$dep Department</h2> \n"; 
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

			//create table to list career options
			echo "<table class='jobs' \n"; 
				echo "	summary='List of career options for a particular major'> \n"; 
					
				echo "	<colgroup> \n"; 
				echo "	<col class='jobs' span='1' /> \n"; 
				echo "	</colgroup> \n"; 
				echo " 	<thead> \n"; 
				echo " 	<tr> \n"; 
				echo "  </tr> \n"; 
				echo "  </thead> \n"; 	
				echo "  <tbody> \n"; 
		
		for($i=0; $i<$nr; $i++)
		{
			$row = mysql_fetch_array($r2); 
			$job  = $row['career']; 
			$jdes = $row['description']; 
			$jobID  = $row['id']; 
							
				echo "  <tr> \n"; 
				echo "	  <th> \n"; 
				echo "		<a href='jobRequest.php?career=$jobID'>$job</a> \n";
				echo "	  </th> \n";
				echo " 	</tr> \n";
		}
				echo " 	</tbody> \n";
				echo "	</table> \n";
	}

	$linkQ="SELECT * FROM MajorLink, Link WHERE linkID=ID AND majorID='$majorID';"; 		//one linkID from Link table, one from MajorLink table
	$linkR=mysql_query($linkQ);
	
		echo "<h3> Related Websites</h3> \n"; 
	
	if(noerror($linkR))
	{
		$nr = mysql_num_rows($linkR);
		
		//create table for links
		echo "<table class='jobs' \n"; 
				echo "	summary='List of related sites for a particular major'> \n"; 
					
				echo "	<colgroup> \n"; 
				echo "	<col class='jobs' span='1' /> \n"; 
				echo "	</colgroup> \n"; 
				echo " 	<thead> \n"; 
				echo " 	<tr> \n"; 
				echo "  </tr> \n"; 
				echo "  </thead> \n"; 	
				echo "  <tbody> \n"; 
				
		for($i=0; $i<$nr; $i++)
		{
			$row  = mysql_fetch_array($linkR);
			$link = $row['link'];
			$name = $row['name']; 
	
				echo "  <tr> \n"; 
				echo "	  <th> \n"; 
				echo "		<a href='$link'> $name </a> \n";
				echo "	  </th> \n";
				echo " 	</tr> \n";
		}
		
				echo " 	</tbody> \n";
				echo "	</table> \n";
	}

	$iQ="SELECT * FROM MajorInterest, Interest WHERE interestID=id AND majorID='$majorID';"; 		//one linkID from Link table, one from MajorLink table
	$iR=mysql_query($iQ);
	
		echo "<h3> Interests </h3> \n"; 
	
	if(noerror($iR))
	{
		$nr = mysql_num_rows($iR);
		
				//create table for Interests
				echo "<table class='jobs' \n"; 
				echo "	summary='List of interests for a particular major'> \n"; 
				echo "	<colgroup> \n"; 
				echo "	<col class='jobs' span='1' /> \n"; 
				echo "	</colgroup> \n"; 
				echo " 	<thead> \n"; 
				echo " 	<tr> \n"; 
				echo "  </tr> \n"; 
				echo "  </thead> \n"; 	
				echo "  <tbody> \n";
				
		for($i=0; $i<$nr; $i++)
		{
			$row  = mysql_fetch_array($iR);
			$interest = $row['interest'];
					
				echo "  <tr> \n"; 
				echo "	  <th> \n"; 
				echo "		<a href='$interest'> $interest </a> \n";
				echo "	  </th> \n";
				echo " 	</tr> \n";
		}
				echo " 	</tbody> \n";
				echo "	</table> \n";
	}














//get and display Alumna and blurb 
	$alumnaID=addslashes($_GET['alumna']); 
	$query="SELECT * FROM Alumna WHERE id='$alumnaID';"; 
	$result=mysql_query($query); 
	
	if(noerror($result))
	{
		$row = mysql_fetch_array($result); 
		$name = $row[1];
		$email = $row[2]; 
		$blurb = $row[6];
		$deg = $row[3];
		$cy = $row[4];
		$job = $row[5];
		$pic = $row[7]
		
		echo "<p> \n"; 
		echo "<h1>$name</h1> \n"; 
		echo "<h2 id='degree'>$degree Degree</h2>
		echo "<h2 id= 'classYear'>$cy Class Year</h2>
		echo "<h2 id= 'job'>$job Job</h2>
		echo "<h3 id='email'>$email Email</h3> \n";
		echo "$blurb \n"; 
		echo "</p> \n"; 
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

