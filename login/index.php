<!-- 
//main page 
 -->
<html>
<head> 
	<link rel= "stylesheet" href="style.css" type="text/css" />
</head>

<body>

<!-- 
//logo
 -->
<div id="container">
<div id="logo" style=" text-align: left">
	     <img src= "images/upperlogo.png" alt="logo"/>

</div>

<!-- 
\\ left list
 -->
<div id="leftNav">
<ul class="links">
		<li><a href="http://www.meredith.edu"> Meredith College</a></li>
		<li><a href="login/main_login.php">Admin Login</a></li>
</ul>		
</div>

<!-- 
//drop down choices for Majors and Jobs
 -->
<div id="body">
		<?php
			//echo "<div id="."section".">";

   			include("included/tabledump.php");
  			include("included/openDB.php");
  			openDB();
   
			//echo "</br>";

      		$query="SELECT * FROM Alumna;";
      		$result=mysql_query($query);
   
   			//tabledump( $result );
   
			//echo "<div id="."section".">";
 
		?>
	</p>
	 <p>
	 	<h1>Career PathWays</h1>

	    These Career Pathways are presented as introductions to different careers and topics, and are intended to be used by students for career planning and course selection

		We encourage you to remain open-minded when considering what you can do for work,
 		where, and for whom. Many of the key skills you develop in your program are transferable. These Career Pathways are here to help you see where your choices might lead you, and to showcase some sets of skills as used for different job functions or in different organizational environments, both physical and virtual.

		In Meredith collage, We offer the following Career Pathways for your consideration. Please note that this is only a partial list of the kinds of career directions you can follow.
	</p>
	
	<form action="majorRequest.php" method="POST">
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
	</form>

	<form action="jobRequest.php" method="POST">
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


<footer>
	     <img src= "images/newfooter.png" alt="footer"/>

</footer>
</div>
</body>

</html>