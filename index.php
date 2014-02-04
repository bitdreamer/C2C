<html>
<head> 
	<link rel= "stylesheet" href="style.css" type="text/css" />
</head>

<body>

<div id="container">

<div id="logo" style=" text-align: left">
	     <img src= "images/upperlogo.png" alt="logo"/>

</div>


<div id="leftNav">
<img src= "images/sideBar.png" alt="logo"/>
<ul class="links">
		<li><a href="http://www.meredith.edu"> Meredith College</a></li>
		<li><a href="main.html"> Main Page </a></li>
</ul>		
</div>

<div id="body">
		<?php
			echo "<div id="."section".">";

   			include("included/tabledump.php");
  			include("included/openDB.php");
  			openDB();
   
			echo "</br>";

      		$query="SELECT * FROM Alumna;";
      		$result=mysql_query($query);
   
   			tabledump( $result );
   
			echo "<div id="."section".">";
		?>
	</p>
	 <p>
	 	<h1>Career PathWays</h1>
		
		Testing a change!

	    These Career Pathways are presented as introductions to different careers and topics, and are intended to be used by students for career planning and course selection

		We encourage you to remain open-minded when considering what you can do for work,
 		where, and for whom. Many of the key skills you develop in your program are transferable. These Career Pathways are here to help you see where your choices might lead you, and to showcase some sets of skills as used for different job functions or in different organizational environments, both physical and virtual.

		In Meredith collage, We offer the following Career Pathways for your consideration. Please note that this is only a partial list of the kinds of career directions you can follow.
		
		
	
</div>	

<div id="footer">
	
</div>

</div>
</body>

</html>