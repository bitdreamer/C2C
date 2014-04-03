<?php
	session_start();
   include("..//included/tabledump.php");
   include("..//included/openDB.php");
   openDB();

if(isset($_GET['id'])) 
{
	$id = $_GET["id"];
   
   $query="DELETE FROM Link WHERE id='".$id."'";

   $result=mysql_query($query);
   if ($result==0) { noerror( $result ); }

	$queryB="DELETE FROM MajorLink WHERE linkID='".$id."'";

	$resultB=mysql_query($queryB);
	if ($resultB==0) {noerror($resultB);}

   header("Location: ../main/linkAdd.php");
   exit;
}
else
{
			$id=$_GET["ide"];
			//echo $_GET["ide"];

			$query = "SELECT * FROM Link WHERE id='".$id."'";
			$result = mysql_query($query);

			$row=mysql_fetch_array($result);
			$i=1;
			$link=$row[$i];
			$name=$row[2];
			$description=$row[3];
			$category=$row[4];

echo "<form action=../main/linkEditProcess.php?id=".$id." method=POST>";
   echo "<table>";
      echo "<tr>";
         echo "<td align=right>Link</td>";
         echo "<td> <input type=url name=link value='".$link."' required=required /> </td>";
      echo "</tr>";
      
      echo "<tr>";
         echo "<td align=right>Name</td>";
         echo "<td> <input type=text name=name value='".$name."' required=required /> </td>";
      echo "</tr>";
      
      echo "<tr>";
         echo "<td align=right>Description</td>";
         echo "<td> <input type=text name=description value='".$description."' required=required /> </td>";
      echo "</tr>";
      
      echo "<tr>";
         echo "<td align=right>Category</td>";
         echo "<td> <input type=text name=category value='".$category."' required=required /> </td>";
      echo "</tr>";
      
      echo "<tr>";
         echo "<td align=right>Submit</td>";
         echo "<td> <input type=submit  name=Submit value=Submit /> </td>";
      echo "</tr>";

   echo "</table>";
echo "</form>";
}
?>