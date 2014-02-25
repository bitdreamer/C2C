<?php
session_start();
// logger1.php  
// This page has a form to let you log in or register.  If you 
// try to login, it jumps
// to logger2CheckPW.php to check.  If you register, it send you
// to logger3Reg.php to send email to the user to complete the
// registration.  Note: the php to send you to a new page has to 
// happen before 
// any HTML is sent.

	echo "<h1>Classroom to Career Pathways</h1>";
?>

<!-- Here's where the HTML starts -->
<html>
<head>
<link href='http://fonts.googleapis.com/css?family=Electrolize' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Cinzel:700' rel='stylesheet' type='text/css'>
<title>C2C - Login</title></head>
<body>
<br/>
<?php
   if(isset($_SESSION['username']))
	{
		echo "<aside>";
		$username=$_SESSION['username'];
		echo "<p>Hello, ".$username."</p>";
		echo "</aside>";
	}
?>
<article id="center">
<p> Login for admin only. :)
</p>
</article>

<article>

<h2>Login:</h2>
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
<h2>Register:</h2>
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
</html>
