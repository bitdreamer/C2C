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
    
    <h1>Add Interest</h1>
    <section>	
<form action="../admin/interestProcess.php" method="POST">
   <table>
      <tr>
         <td align="right">Interest</td>
         <td> <input type="text" name="interest" /> </td>
      </tr>
      <tr>
         <td align="right">Submit</td>
         <td> <input type="submit" name="SubmitP" id="SubmitP" value="Submit"/> </td>
      </tr>
   </table>
</form>
    </section>
<br/>
<br/>
<?php
	echo "<section>";

	$query="select * from Interest ORDER BY interest;";
    $result=mysql_query($query);
   
	echo "<form action=../admin/interestProcess.php method=$_GET>";
   tabledumpdeltedit( $result );
	echo "</form>";
   
	echo "</section>";
?>
    
        <footer>
            <?php footerContent(); ?>
        </footer>
    </div>
</body>

</html>