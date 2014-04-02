<?php
	session_start();
	if(!isset($_SESSION['email'])){header("location:..//login/main_login.php");}
	 include("..//included/tabledump.php");
     include("..//included/openDB.php");
     openDB();
?>
<!-- Here's where the HTML starts -->
<html>

<head>
	<link rel= "stylesheet"type="text/css"  href="..//style.css"  />
	<title> Carrer Pathways</title>
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
<div id="text">
<h1>Majors already created</h1>
<form>
  <?php
	echo "<section>";


	$query="select * from Major;";
    $result=mysql_query($query);
   
   tabledump( $result );
   
	echo "</section>";
?>
</form>
</div>
</body>

<div id="footer"></br>
	   <address >
	    		<a href="https://www.google.com/maps/place/Meredith+College/@35.7983206,
	   			   -78.6889146,16z/data=!3m1!4b1!4m2!3m1!1s0x89acf5c670c2dbc5:0x179f9c722569698c/">
	    				3800 Hillsborough Street | Raleigh, NC 27607-5298</br>
       					Phone: (919) 760-8600 or 1-800 MEREDITH
       	</address>	
</html>