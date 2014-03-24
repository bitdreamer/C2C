<?php
session_start();
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
<body>
	<div id="darkgray"></div>
	<div id="logo"></div>
	<div id="lightgray"></div>
<?php
   if(isset($_SESSION['username']))
	{
		echo "<aside>";
		$username=$_SESSION['username'];
		echo "<p>Hello, ".$username."</p>";
		echo "</aside>";
	}
?>

<div id="links">	
<?php
	include("..//included/leftMenu.php"); 
	leftMenu();
?>
</div>

<article>

<p>Login:</p>
<form action=<?php echo "check_login.php?PHPSESSID=".session_id()?> method="POST">
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
</article>

<article>
<p>Register:</p>
<form action="register.php" method="POST">
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
         <td align="right">Password</td>
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
