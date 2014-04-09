<?php
	session_start(); 
	include("../included/leftMenu.php"); 
	include("../included/template.php");
?>

<!DOCTYPE html>

<html lang="en"> 	
<!-- head info -->
<?php
	head();
?>

<body> 
	<div id="big_wrapper">
	
	<!-- header -->
	<?php	
		heading();
		echo"<div id='links'>\n
		<nav id='left_menu'>\n
		<ul>\n";
		leftMenu();
		echo"</ul>\n
		</nav>\n";
	?>
	<section id="main_content">
		<article>	 
			<p>Your password will be sent to your e-mail.</p>
			<form action="../login/check_pw.php" method="POST">
				<table>
					<tr>
						<td align="right">Email</td>
						<td> <input type="text" name="email4log" /> @email.meredith.edu</td>
					</tr>
					<tr>
						<td> <input type="submit"  name="Submit" value="Submit"/> </td>
					</tr>
				</table>
			</form>	
		</article>
	</section>
	<!-- footer -->
	<?php
		echo "</div>\n";
		footer();	
	?>
		
</body>
</html>