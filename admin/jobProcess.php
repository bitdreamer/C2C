<?php
session_start();
   include("..//included/tabledump.php");
   include("..//included/openDB.php");
   openDB();

if(isset($_GET['id'])) 
{
	$id = $_GET["id"];
   
   $query="DELETE FROM Job WHERE id='".$id."'";

   $result=mysql_query($query);
   if ($result==0) { noerror( $result ); }


	$queryB="DELETE FROM JobInterest WHERE jobID='".$id."'";

	$resultB=mysql_query($queryB);
	if ($resultB==0) {noerror($resultB);}


	$queryC="DELETE FROM MajorJob WHERE jobID='".$id."'";

	$resultC=mysql_query($queryC);
	if ($resultC==0) {noerror($resultC);}


   //header("Location: ../main/jobAdd.php");
   exit;
}
else if(isset($_POST['SubmitP']))
{
   	$career=$_POST['job'];
	$description=$_POST['description'];
   
   $query="INSERT INTO Job "
          ." set career='$career' "
	." ,description='$description' "
          .";";

   $result=mysql_query($query);
   if ($result==0) { noerror( $result ); }




   //header("Location: ../main/jobAdd.php");
   exit;
}
else
{

			$id=$_GET["ide"];
			//echo $_GET["ide"];

			$query = "SELECT * FROM Job WHERE id='".$id."'";
			$result = mysql_query($query);

			$row=mysql_fetch_array($result);
			$i=1;
			$career=$row[$i];
			$description=$row[2];


	echo "<form action=jobEditProcess.php?id=".$id." method=POST>";
	   echo "<table>";
			echo "<tr>";
				echo "<td align=right>Job</td>";
				echo "<td><input type=text name=career value='".$career."' required=required size=20 style=height:20px></td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td align=right>Description</td>";
				echo "<td><input type=text name=description value='".$description."' required=required size=75 style=height:75px></td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td colspan=2 align=center >";
				echo "<input type=submit value=Submit >";
				echo "</td>";
			echo "</tr>";
		echo "</table>";
	echo "</form>";
}
?>