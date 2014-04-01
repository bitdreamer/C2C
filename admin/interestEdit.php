<?php
	session_start();
   include("..//included/tabledump.php");
   include("..//included/openDB.php");
   openDB();

$id=$_GET["$id"];

$query = "SELECT * FROM Interest WHERE id='".$id."'";
$result = mysql_query($query);

$row=mysql_fetch_array($result);
$i=1;
$interest=$row[$i];

echo "<form action=interestEditProcess.php?id=".$id." method=POST>";
   echo "<table>";
     echo "<tr>";
         echo "<td align=right>Interest</td>";
         echo "<td> <input type=text name=interest value=$interest /> </td>";
      echo "</tr>";
      echo "<tr>";
         echo "<td align=right>Submit</td>";
         echo "<td> <input type=submit  name=Submit value=Submit /> </td>";
      echo "</tr>";
   echo "</table>";
echo "</form>";

?>