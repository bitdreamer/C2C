<?php
	session_start();
   include("..//included/tabledump.php");
   include("..//included/openDB.php");
   openDB();

if(isset($_GET['id'])) 
{
	$id = $_GET["id"];
   
   $query="DELETE FROM Opportunity WHERE id='".$id."'";

   $result=mysql_query($query);
   if ($result==0) { noerror( $result ); }

	$queryB="DELETE FROM MajorOpportunity WHERE opportunityID='".$id."'";

	$resultB=mysql_query($queryB);
	if ($resultB==0) {noerror($resultB);}

   header("Location: ../main/opportunityAdd.php");
   exit;
}
else
{
			$id=$_GET["ide"];
			//echo $_GET["ide"];

			$query = "SELECT * FROM Opportunity WHERE id='".$id."'";
			$result = mysql_query($query);

			$row=mysql_fetch_array($result);
			$i=1;
			$opportunity=$row[$i];
			$link=$row[2];
			$description=$row[3];

echo "<form action=opportunityEditProcess.php?id=".$id." method=POST>";
   echo "<table>";
      echo "<tr>";
         echo "<td align=right>Opportunity</td>";
         echo "<td> <input type=text name=opportunity value=$opportunity required=required /> </td>";
      echo "</tr>";
      
      echo "<tr>";
         echo "<td align=right>Link</td>";
         echo "<td> <input type=url name=link value=$link required=required /> </td>";
      echo "</tr>";
	
	echo "<tr>";
		echo "<td align=right>Description</td>";
		echo "<td> <input type=text name=description value=$description /></td>";
	echo "</tr>";
      
      echo "<tr>";
         echo "<td align=right>Submit</td>";
         echo "<td> <input type=submit  name=Submit value=Submit /> </td>";
      echo "</tr>";

   echo "</table>";
echo "</form>";

}
?>