<?php

	session_start(); 

	include("../included/openDB.php");
	include("../included/leftMenu.php"); 
	include("../included/tabledump.php");
	openDB();

?>

<!-- main Page -->
<!DOCTYPE html>

<html lang="en"> 	
<head>
    <meta charset="utf-8" />
    <title> Job Request</title>
	<link rel= "stylesheet" type="text/css"  href="../style.css"  />
</head>
	
<!--logo-->
<body> 
	
<!-- logo part-->	 
	<header id="logo">  
     </header>
	
<aside>
	<nav>
	 <ul>
		<?php leftMenu(); ?>
	 </ul>	
</nav>

<!-- text-->
 		<h1 name="mainHeader"> Job Request</h1>
<section id="main_content">
<?php

	$jobID=addslashes($_GET['career']); 
	
	$query="SELECT * FROM Job WHERE id='$jobID';"; 
	$result=mysql_query($query); 
	
	if(noerror($result))
	{
		$row = mysql_fetch_array($result); 
		$job = $row['career']; 
		$des = $row['description']; 
		
		echo "<h1 id='h2_header'>$job</h1> \n"; 
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
</section>

<!--footer-->	
<footer id="footer">
	   <article id="address">
	   <a href="https://www.google.com/maps/place/Meredith+College/@35.7983206,-78.6889146,16z/data=!3m1!4b1!4m2!3m1!1s0x89acf5c670c2dbc5:0x179f9c722569698c">
	      3800 Hillsborough Street | Raleigh, NC 27607-5298</a>
	      </br>
          Phone: (919) 760-8600 or 1-800 MEREDITH
       </article><!--address-->	  

	</footer>
	
	</aside>
	</body>
</html>