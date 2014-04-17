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


   header("Location: ../main/jobAdd.php");
   exit;
}
elseif(isset($_POST['SubmitP']))
{
   	$career=$_POST['job'];
	$description=$_POST['description'];
   
   $query="INSERT INTO Job "
          ." set career='$career' "
	." ,description='$description' "
          .";";

   $result=mysql_query($query);
   if ($result==0) { noerror( $result ); }




   header("Location: ../main/jobAdd.php");
   exit;
}
else if(isset($_POST['Connect']))
{
//Gathers input data from addJob.php
	$mindegree=$_POST['MinDegree'];
	$arrayM=$_POST['checkboxM'];	//majors
	$arrayJ=$_POST['checkboxJ'];	//jobs


	function connect($arrayM,$arrayJ,$mindegree)
	{
		$sizeM=sizeof($arrayM);
		$sizeJ=sizeof($arrayJ);

		for($i=0;$i<$sizeM;$i++)
		{
				//Defines query to get the correct Major id from the table
				$queryM="SELECT id FROM Major WHERE major='$arrayM[$i]'";
				
				//Performs defined query, result is an array
				$majorIDq=mysql_query($queryM);

				//Fetchs the row from the resulting array
				$majorIDr=mysql_fetch_row($majorIDq);

				//Goes to specific field (#0) in the row
				$majorID=$majorIDr[0];

		for($j=0;$j<$sizeJ;$j++)
		{
				//Defines query to get the correct Job id from the table
				$queryJ="SELECT id FROM Job WHERE career='$arrayJ[$j]'";

				//Performs defined query, result is an array
				$jobIDq=mysql_query($queryJ);

				//Fetchs the row from the resulting array
				$jobIDr=mysql_fetch_row($jobIDq);

				//Goes to specific field (#0) in the row
				$jobID=$jobIDr[0];

				//Defines query to put the found ids and the mindegree in the MajorJob table
				$query="INSERT INTO MajorJob "
					." set majorID='$majorID' "
					." ,jobID='$jobID' "
					." ,degree='$mindegree' "
					.";";

   				//Performs insertion query, checks for errors using noerror function defined in tabledump.php	
   				$result=mysql_query($query);
   				if ($result==0) { noerror( $result ); }
		}
		}
	}

	connect($arrayM,$arrayJ,$mindegree);
   //Header travels to specified location
   header("Location: ../main/jobAdd.php");
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