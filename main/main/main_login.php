<?php
session_start();
include("../included/template.php");
// main_login.php  
// This page has a form to let you log in or register.  If you 
// try to login, it jumps
// to check_login.php to check.  If you register, it sends you
// to register.php to send an email to the user to complete the
// registration.  
//Note: the php to send you to a new page has to 
// happen before 
// any HTML is sent.
?>

<!-- Here's where the HTML starts -->
<html>
<head>
<link href='http://fonts.googleapis.com/css?family=Electrolize' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Cinzel:700' rel='stylesheet' type='text/css'>
<link rel= "stylesheet" type="text/css"  href="..//style.css"  />
<title>C2C - Login</title>
</head>

<!--logo-->
<body> 
	

<!-- logo part-->	 
	<header id="logo">  
     </header>
     
<!--Left Menu-->
<div id="links">
	<nav id="left_menu">

<?php 
	include("..//included/leftMenu.php"); 
	leftMenu();
?>
   </ul>	
</nav>
</div><!--links-->

 <div id="welcome">    
<?php
   if(isset($_SESSION['username']))
	{
		echo "<aside>";
		$username=$_SESSION['username'];
		echo "<p>Hello, ".$username."</p>";
		echo "</aside>";
	}
?>
</div>



<!-- text-->
<section id="login_content">
<h2 id="h2_header"> LogIn</h2> 

	
  <form action="../login/check_login.php" method="POST">
   <table>
      <tr>
         <td align="right">Email</td>
         <td> <input type="text" name="email4log" /> @email.meredith.edu</td>
      </tr>
      <tr>
         <td align="right">Password</td>
         <td> <input type="password" name="password4log" /> </td>
      </tr>
      <tr>
         <td align="right">Submit</td>
         <td> <input type="submit"  name="Submit" value="Login"/> </td>
      </tr>
   </table>
</form>

 	
</section>

<!--footer-->	
<footer id="footer">
	   <div id="address">
	   <a href="https://www.google.com/maps/place/Meredith+College/@35.7983206,-78.6889146,16z/data=!3m1!4b1!4m2!3m1!1s0x89acf5c670c2dbc5:0x179f9c722569698c">
	      3800 Hillsborough Street | Raleigh, NC 27607-5298</a>
	      </br>
          Phone: (919) 760-8600 or 1-800 MEREDITH
       </div><!--address-->	   	
	</footer>
	
	</aside>
		
	</body>
</html>