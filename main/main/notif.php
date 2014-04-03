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
			<p name="mainIntro">
				<?php
					displayContent($_GET['msg']);
				?>
			</p>	
		</article>
	  
	</section>
 
	<!-- footer -->
	<?php
		echo "</div>\n";
		footer();	
	?>
		
</body>
</html>