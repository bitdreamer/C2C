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
<?php
	include("..//included/leftMenu.php"); 
	leftMenu();
?>
 </ul>
 </nav>	
 </div>
 
<section id="text_content">
	<h1 name="mainHeader">Log Out</h1>
  <article>
       <p id="logout"> You have logged out of C2C. We hope you will return again soon.</p>
	</article>
 </section>
 </div><!--links--><!--footer-->	
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
