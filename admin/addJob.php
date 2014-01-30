<?php
	session_start();
	include("..//included/tabledump.php");
   include("..//included/openDB.php");
   openDB();
?>
<html>
<head>
<title>Classroom to Career Pathways</title>
</head>
<body>
<h1>Classroom to Career Pathways</h1>
<?php
	include("../included/menu.php");
	openAddMenu();
?>

<br/>
<article id="newJob">
<h2>Add New Job</h2>
<form action="processJob.php" method="POST">
   <table>
	<tr>
         <td align="right">Job</td>
         <td><input type="text" name="job" value="" required="required" size="20" style="height:20px"></td>
      </tr>
	  <tr>
         <td align="right">Description</td>
         <td><input type="text" name="description" value="" required="required" size="75" style="height:75px"></td>
      </tr>
      <tr>
         <td colspan="2" align="center"> 
         <input type="submit" value="Submit">
         </td>
      </tr>
   </table>

</form>


<?php
	echo "<section>";


	$query="select * from Job;";
    $result=mysql_query($query);
   
   tabledump( $result );
   
	echo "</section>";
?>

</article>
</body>
</html>

