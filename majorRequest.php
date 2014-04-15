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
    <title> Major Request</title>
	<link rel= "stylesheet" type="text/css"  href="../style.css"  />
</head>
	

<!--body-->
<body> 
	<div id="big_wrapper">
	
<!-- logo part-->	 
	<header id="top_header">  
		<section id="logo"></section>
     </header>
     
<!--Left Menu-->
<div id="links">
	<nav id="left_menu">
	 <ul>
		<?php leftMenu(); ?>
	 </ul>	
</nav>
</div>

<!-- text-->
  <!-- <h1 name="mainHeader"> Major Request</h1> -->

<section id="new_text">

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
		echo "<h1 id='request_header1'>$major</h1> \n"; 
		echo "<h2 id='request_header2'>$dep Department</h2> \n"; 
		echo "$des \n"; 
	}
	
	//get and display job options 
	$q2="SELECT * FROM MajorJob, Job WHERE jobID=id AND majorID='$majorID';";
	$r2=mysql_query($q2); 

		//if(!isEmpty($r2))
		//{
		//	echo "<br/> <br/><h2 id='h2_header'> Career Options </h2> \n"; 
		//}	
	if(noerror($r2))
	{
		$nr = mysql_num_rows($r2);

			//create table to list career options
			echo "<table class='jobs' \n"; 
				echo "	summary='List of career options for a particular major' style='float:left'> \n"; 
					
				echo "	<colgroup> \n"; 
				echo "	<col class='jobs' span='1' /> \n"; 
				echo "	</colgroup> \n"; 
				echo " 	<thead> \n"; 
				echo " 	<tr> \n"; 
				echo "  </tr> \n"; 
				echo "  </thead> \n"; 	
				echo "  <tbody> \n"; 
				
				if(!isEmpty($r2))
				{
					echo "<th><td> Career Options </th></td> \n"; 
				}	
				
		
		for($i=0; $i<$nr; $i++)
		{
			$row = mysql_fetch_array($r2); 
			$job  = $row['career']; 
			$jdes = $row['description']; 
			$jobID  = $row['id']; 
							
				echo "  <tr> \n"; 
				echo "	  <td> \n"; 
				echo "		<a href='jobRequest.php?career=$jobID'>$job</a> \n";
				echo "	  </td> \n";
				echo " 	</tr> \n";
		}
				echo " 	</tbody> \n";
				echo "	</table> \n";
	}

	
	$linkQ="SELECT * FROM MajorLink, Link WHERE linkID=ID AND majorID='$majorID';"; 		//one linkID from Link table, one from MajorLink table
	$linkR=mysql_query($linkQ);
	
		if(!isEmpty($linkR))
		{
			echo "<br/><br/><h2 id='h2_header'> Related Websites</h3> \n"; 
		}
		
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
				echo "	  <td> \n"; 
				echo "		<a href='$link'> $name </a> \n";
				echo "	  </td> \n";
				echo " 	</tr> \n";
		}
		
				echo " 	</tbody> \n";
				echo "	</table> \n";
	}

	$iQ="SELECT * FROM MajorInterest, Interest WHERE interestID=id AND majorID='$majorID';"; 		//one linkID from Link table, one from MajorLink table
	$iR=mysql_query($iQ);
	
		if(!isEmpty($iR))
		{
			echo "</br/> <h2 id='h2_header'> Interests </h2> \n"; 
		}
	
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
				echo "	  <td> \n"; 
				echo "	 $interest \n";
				echo "	  </td> \n";
				echo " 	</tr> \n";
		}
				echo " 	</tbody> \n";
				echo "	</table> \n";
	}

    $alumnaQ="SELECT * FROM MajorAlumna, Alumna WHERE alumnaID=ID AND majorID='$majorID';"; 		//one alumnaID from Alumna table, one from MajorAlumna table
	$alumnaR=mysql_query($alumnaQ);
	
		if(!isEmpty($alumnaR))
		{
			echo "<h2 id='h2_header'> Alumna Profiles</h2>"; 
		}
	
	if(noerror($alumnaR))
	{
		$nr = mysql_num_rows($alumnaR);
		
		//create table for alumna
		echo "<table class='jobs' \n"; 
				echo "	summary='List of alumna for a particular major'> \n"; 
					
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
			$row  = mysql_fetch_array($alumnaR);
			$name = $row['name'];
			$email = $row['email']; 
			$blurb = $row['blurb'];
			$deg = $row['degree'];
			$cy = $row['class year'];
			$job = $row['job'];
			$pic = $row['picture'];
	
 
				echo "<th><td>$name</td></th>\n"; 
				echo "<tr><td>$degree</td></tr> \n";
				echo "<tr><td>$cy</td></tr> \n";
				echo "<tr><td>$job</td></tr> \n";
				echo "<tr><td>$email</td></tr> \n";
				echo "<tr><td>$blurb</td></tr> \n"; 
		}
		
				echo " 	</tbody> \n";
				echo "	</table> \n";
				

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
	
	</body>
</html>

