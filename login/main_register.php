<?php
session_start();
include("../included/template.php");
include("../included/loginStatus.php");

whoIsLogged($_SESSION['accessLv']);

// main_register.php  
// This page has a form to let you register.  If you register, it sends you
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
	<div id="big_wrapper">
	
<!-- logo part-->	 
	<header id="top_header">  
		<section id="logo"></section>
     </header>

</div>
<!--Left Menu-->
<div id="links">
	<nav id="left_menu">
	 <ul>
<?php
	include("../included/leftMenu.php");
	leftMenu();
?>

   </ul>	
</nav>
</div><!--links-->
	   <h1 id="majorHeader"> Register</h1>

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
	   
<section id="main_content">
<div id="new">
<article>

<p>
<?php
	displayContent($_GET['msg']);
?>
</p
<p>Register:</p>
<form id="forms" action="register.php" method="POST">
   <table>
      <tr>
         <td align="right">First Name</td>
         <td> <input type="text" name="firstname4reg" /> </td>
      </tr>
      <tr>
         <td align="right">Last Name</td>
         <td> <input type="text" name="lastname4reg" /> </td>
      </tr>
      <tr>
	<td align="right">Access Level</td>
	<td><select name="access" required="required">
			<option value="1">Partial - Add Content</option>
			<option value="2">Full - Add Content + Users</option>
		</select>
	</td>
      </tr>
      <tr>
         <td align="right">Email</td>
         <td> <input type="text" name="email4reg" /> @email.meredith.edu</td>
      </tr>
	<tr>
		<td align="right">Username</td>
		<td> <input type="text" name="username4reg" /> </td>
      <tr>
         <td align="right">Password</td>
         <td> <input type="password" name="password4reg" /> </td>
      </tr>
      <tr>
         <td align="right">Re-enter Password</td>
         <td> <input type="password" name="password4reg2" /> </td>
      </tr>
<script type="text/javascript">
   document.writeln("<input type=\"hidden\" value=\""
                    +Math.ceil(Math.random()*1000000)
                    +"\" name=\"regnum\" />"
                   );
</script>
      <tr>
         <td align="right">Submit</td>
         <td> <input type="submit"  /> </td>
      </tr>
   </table>
</form>
</artical>
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
	
</div>	<!-- big_wrapper-->	
		
	</body>
</html>