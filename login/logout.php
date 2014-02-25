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

   include("..//included/menu.php");
?>
<html>
	<head>
 	  <title>  Logout </title> 
	</head>
<body>
<h1>Classroom to Career Pathways</h1>
<?php
	openMenu();
?>
	<br/>
	<article id="logout">
      <p> You have logged out of C2C.  </p><br />
         <p>We hope you will return again soon.
      </p>
	<article>
 </body>
</html>
