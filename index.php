<?php

	session_start(); 

	include("included/openDB.php");
	include("included/mainMenu.php"); 
	include("included/tabledump.php");
	openDB();

?>

<!-- main Page -->
<!doctype html>

<html lang="en"> 	
<head>
    <meta charest="utf-8" />
    <title> Carrer Pathways</title>
	<link rel= "stylesheet" type="text/css"  href="style.css"  />
</head>

<!--logo-->
<body> 
	<div id="big_wrapper">
	
<!~~ logo part~~>	 
	<header id="top_header">  
		<section id="logo"></section>
     </header>
     
<!--Left Menu-->
<div id="links">
	<nav id="left_menu">
	 <ul>
		<?php mainMenu(); ?>
	 </ul>	
	</nav>

<!~~ text~~>
<section id="main_content">
 		<h1 name="mainHeader"> Classroom to Career PathWays</h1>

      <artical>	 
		<p name="mainIntro">	
		 Many people have trouble choosing a career path and are
		 confused on finding their calling. 
		 Whether you are in high school, graduating,
		 or an adult,it is never too late to follow your dreams.</p>	
	  </artical>
	  
	
<!--<aside id="right_side">
		 <video  src="career.mp4" type="video/mp4" poster="images/meredith.jpg" controls>
		 </video>-->
		 
 <artical id="left_side">
		    <h2 id="left_h2"> Choose a major or job to learn more about it. </h2>
<!-- Drop down choices for Majors and Jobs-->
		<?php

			//echo "</br>";
      		$query="SELECT * FROM Alumna;";
      		$result=mysql_query($query);
   			//tabledump( $result );
			//echo "<div id="."section".">";

		?>
		
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
<h2 id="left_h2"> OR choose from Job</h2>
	<form action="jobRequest.php" method="GET">
		<fieldset id="jobInfo">
			<legend id="legends">Which of the following jobs are you most interested in?</legend>

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

</aside>
</section>
 
	
</div>

<!--footer-->	
<footer id="footer">
	   <div id="address">
	   <a href="https://www.google.com/maps/place/Meredith+College/@35.7983206,-78.6889146,16z/data=!3m1!4b1!4m2!3m1!1s0x89acf5c670c2dbc5:0x179f9c722569698c">
	      3800 Hillsborough Street | Raleigh, NC 27607-5298</a>
	      </br>
          Phone: (919) 760-8600 or 1-800 MEREDITH
       </div><!--address-->	   	
	</footer>
	
</div>	<!-- big_wrapper-->	
		
	</body>

</html>