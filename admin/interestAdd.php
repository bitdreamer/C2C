<?php
session_start();
if(!isset($_SESSION['email'])){
header("location:..//login/main_login.php");
}
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
<h2>Add New Interest</h2>
<form action="interestProcess.php" method="POST">
   <table>
      <tr>
         <td align="right">Interest</td>
         <td> <input type="text" name="interest" /> </td>
      </tr>
      <tr>
         <td align="right">Submit</td>
         <td> <input type="submit"  name="Submit" value="Submit"/> </td>
      </tr>

   </table>
</form>

<?php
	echo "<section>";

   include("../included/tabledump.php");
   include("../included/openDB.php");
   openDB();


	$query="select * from Interest;";
    $result=mysql_query($query);
   
   tabledump( $result );
   
	echo "</section>";
?>

</body>
</html>
