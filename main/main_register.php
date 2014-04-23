<?php
	session_start();
    include("../included/loginStatus.php");
    whoIsLogged($_SESSION['accessLv']);
	include("../included/openDB.php");
    include("../included/template.php");
    include("../included/leftMenu.php");
    include("../included/tabledump.php");
	openDB();

    // main_register.php  
    // This page has a form to let you register.  If you register, it sends you
    // to register.php to send an email to the user to complete the
    // registration.  
    //Note: the php to send you to a new page has to 
    // happen before 
    // any HTML is sent.
?>
<!-- Here's where the HTML starts -->
<!DOCTYPE HTML>
<html>
<head>
    <?php headContent(); ?>
</head>

<body>
    <div class="top_border"></div>
    <div class="band_header">
        <header>
            <h1 class="logo"></h1>
        </header>
    </div>
    <div class="bottom_border"></div>
    
    <nav>
        <?php leftMenu(); ?>
    </nav>
    
<h1 id="majorHeader">Admin Register</h1>
	      
<?php
   if(isset($_SESSION['username']))
	{
		$username=$_SESSION['username'];
		echo "<h3 id='hello'>Hello ".$username.", use this form to register admin users.</h3>";
	}
?>
</div>	   

<section id="text_content">
<article>

<p>
<?php
	displayContent($_GET['msg']);
?>
</p>
    
<form id="forms" action="../login/register.php" method="POST">
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
         <td align="right"></td>
         <td> <input type="submit"  /> </td>
      </tr>
   </table>
</form>
</article>
</section>
        
<footer>
            <?php footerContent(); ?>
        </footer>
</body>

</html>