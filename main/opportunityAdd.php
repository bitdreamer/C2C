<?php
	session_start();
	include("..//included/loginStatus.php");
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
    
    <h1>Add Opportunity</h1>

<section>
 <article>		
<form action="..//admin/opportunityProcess.php" method="POST">
   <table id="majorTable">
      <tr>
         <td align="right">Opportunity</td>
         <td> <input type="text" name="opportunity" required="required"/> </td>
      </tr>
      
      <tr>
         <td align="right">Link</td>
         <td> <input type="url" name="link" required="required"/> </td>
      </tr>
	
	<tr>
		<td align="right">Description</td>
		<td> <textarea name="description" rows="3" cols="50" ></textarea></td>
	</tr>
      
      <tr>
         <td align="right">Submit</td>
         <td> <input type="submit"  name="Submit" value="Submit"/> </td>
      </tr>

   </table>
</form>

<?php
	echo "<section>";

	$query="select * from Opportunity ORDER BY opportunity;";
    $result=mysql_query($query);
   
	echo "<form action=../admin/opportunityDelete.php method=$_GET>";
   tabledumpdeltedit( $result );
	echo "</form>";
   
	echo "</section>";
?>
</article>
</section>
    
        <footer>
            <?php footerContent(); ?>
        </footer>
    </div>
</body>

</html>