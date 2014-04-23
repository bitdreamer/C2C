<?php
	session_start();
    include("../included/loginStatus.php");
	areYouLogged();
	include("../included/openDB.php");
    include("../included/template.php");
    include("../included/leftMenu.php");
    include("../included/tabledump.php");
	openDB();
?>
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
    
    <h1>Add Job</h1>

<section>
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

		$query="select id, career from Job ORDER BY career;";
		$result=mysql_query($query);
	   
		echo "<form action=../admin/jobProcess.php method=$_GET>";
		tabledumpdeltedit( $result );
	   	echo "</form>";
		echo "</section>";
	?>
 </section>
    
        <footer>
            <?php footerContent(); ?>
        </footer>
    </div>
</body>

</html>