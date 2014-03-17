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
	<title> Career Pathways</title>
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

<div id="content">
<h1>Career PathWays</h1>



<!-- drop down choices for Majors and Jobs-->

<div id="body">

		<?php

			//echo "</br>";
      		$query="SELECT * FROM Alumna;";
      		$result=mysql_query($query);
   			//tabledump( $result );
			//echo "<div id="."section".">";

		?>

	<p> You can choose from Majors.</p>
	
	<!-- major form-->
	<form action="majorRequest.php" method="GET">
	    <fieldset id="majorInfo">
		    <legend>What is your Major/Intended Major?</legend>

			<?php
				$query = "SELECT id, major FROM Major ORDER BY major"; 
				$result = mysql_query($query); 
				
				if(noerror($result))
				{
					echo "<select name='major'> \n";
					$nr = mysql_num_rows($result); 
					
				  for($i=0; $i<$nr; $i++)
					{
						$row = mysql_fetch_array($result);
						$majorID = $row['id']; 
						$major = $row['major']; 
						echo "<option value='$majorID'>$major</option> \n"; 
					}					
					echo "</select> \n";
				}
			?>
				</br>
				<input type="submit" value="Go"/>

	   </fieldset>
	</form></br></br>
	
<!-- Job Form-->
<p> OR choose from Job</p>
	<form action="jobRequest.php" method="GET">
		<fieldset id="jobInfo">
			<legend>Which of the following jobs are you most interested in?</legend>

			<?php
				$query = "SELECT id, career FROM Job ORDER BY career"; 
				$result = mysql_query($query); 
				
			if(noerror($result))
			  {
					echo "<select name='career'> \n";
					$nr = mysql_num_rows($result); 
					
				for($i=0; $i<$nr; $i++)
				  {
				     $row = mysql_fetch_array($result);
					 $jobID = $row['id']; 
					 $job = $row['career']; 
					 echo "<option value='$jobID'>$job</option> \n"; 
					}
					echo "</select> \n";
				}
			?>
				</br>
				<input type="submit" value="Go"/>
				
		</fieldset>
	</form>		

	</div>
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