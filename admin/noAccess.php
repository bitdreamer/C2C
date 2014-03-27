<?php
session_start();
?>
<!-- Here's where the HTML starts -->
<html>
<head>
<link href='http://fonts.googleapis.com/css?family=Electrolize' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Cinzel:700' rel='stylesheet' type='text/css'>
<link rel= "stylesheet" type="text/css"  href="..//style.css"  />
<title>No Access</title>
</head>
<body>
	<div id="darkgray"></div>
	<div id="logo"></div>
	<div id="lightgray"></div>
<div id="links">	
<?php
	include("..//included/leftMenu.php"); 
	leftMenu();
?>
</div>

<article>
<p>You do not have enough access to view the contents of this page.</p>
</article>

</body>
	<div id="footer"></br>
	   <address >
	    		<a href="https://www.google.com/maps/place/Meredith+College/@35.7983206,
	   			   -78.6889146,16z/data=!3m1!4b1!4m2!3m1!1s0x89acf5c670c2dbc5:0x179f9c722569698c/">
	    				3800 Hillsborough Street | Raleigh, NC 27607-5298</br>
       					Phone: (919) 760-8600 or 1-800 MEREDITH
       	</address>	
      	
	</div>
</html>