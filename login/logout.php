<?php
/*logout.php
This page logs the user out.  
*/
  session_start();
    session_unset();
    session_destroy();
    session_write_close();
    setcookie(session_name(),'',0,'/');
    session_regenerate_id(true);
?>
<!-- Here's where the HTML starts -->
<html>

<head>
	<link rel= "stylesheet" type="text/css"  href="..//style.css"  />
	<title> LogOut</title>
</head>

<!--logo-->
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

<br/>
		
<div>
<h1 id="logoutH1">Log Out</h1>
	<br/>
	
	<div id="logout">
	<article>
       <p> You have logged out of C2C.  </p>
	<p>We hope you will return again soon.</p>
	<article>
	</div>
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
