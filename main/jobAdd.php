<?php
	session_start();
	include("..//included/loginStatus.php");
	areYouLogged();
	include("..//included/tabledump.php");
	include("..//included/openDB.php");
	openDB();
	
?>
<!-- main Page -->
<!DOCTYPE html>
<html lang="en"> 	
<head>
<meta charset="utf-8" />
<link rel= "stylesheet" href="../style.css" type="text/css" />
<title>Add New Job</title>
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
	include("../included/leftMenu.php");
	leftMenu();
?>

   </ul>	
</nav>
</div><!--links-->

<h1 id="majorHeader">Add New job</h1>

<section id="text_content">
<div id="newMajor">
 <article>
	<form action="../admin/jobProcess.php" method="POST">
	   <table>
			<tr>
				<td align="right">Job</td>
				<td><input type="text" name="job" value="" required="required" size="20" style="height:20px"></td>
			</tr>
			<tr>
				<td align="right">Description</td>
				<td><textarea name="description" value="" required="required" size="75" rows="3" cols="50"></textarea></td>
			</tr>
			<tr>
				<td colspan="2" align="center"> 
				<input type="submit" name="SubmitP" id="SubmitP" value="Submit">
				</td>
			</tr>
		</table>
	</form>
	<?php
		echo "<section>";

		$query="select * from Job ORDER BY career;";
		$result=mysql_query($query);
	   
		echo "<form action=../admin/jobProcess.php method=$_GET>";
		tabledumpdeltedit( $result );
	   	echo "</form>";
		echo "</section>";
	?>
 </article>
 </div>
</body>

<!--footer-->	
<footer id="footer">
	   <div id="address">
	   <a href="https://www.google.com/maps/place/Meredith+College/@35.7983206,-78.6889146,16z/data=!3m1!4b1!4m2!3m1!1s0x89acf5c670c2dbc5:0x179f9c722569698c">
	      3800 Hillsborough Street | Raleigh, NC 27607-5298</a>
	      </br>
          Phone: (919) 760-8600 or 1-800 MEREDITH
       </div><!--address-->	 
         	
	</footer>
 </section>
</div>	<!-- big_wrapper-->	


</html>