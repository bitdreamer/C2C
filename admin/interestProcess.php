<?php
session_start();
   include("../included/tabledump.php");
   include("../included/openDB.php");
   openDB();



		if(isset($_GET['id'])) //Delete
		{
			$id = $_GET["id"];

			$query="DELETE FROM Interest WHERE id='".$id."'";
			$result=mysql_query($query);
			if ($result==0) { noerror( $result ); }

			$queryB="DELETE FROM MajorInterest WHERE interestID='".$id."'";
			$resultB=mysql_query($queryB);
			if ($resultB==0) {noerror($resultB);}

			header("Location: ../main/interestAdd.php");
			exit;
		} 
		elseif(isset($_POST['SubmitP'])) //Add new
		{
 			$interest= $_POST['interest'];
   
   			$query="INSERT INTO Interest "
   			       ." set interest='$interest' "
      			    .";";
  			 $result=mysql_query($query);
  			 if ($result==0) { noerror( $result ); }
   			//echo "query = $query";

   			header("Location: ../main/interestAdd.php");
   			exit; 
		}
		else if(isset($_POST['Connect'])) //Connect
		{
	//Gathers input data from addInterest.php
	$arrayM=$_POST['checkboxM'];	//majors
	$arrayI=$_POST['checkboxI'];	//interests


	

	function connect($arrayM,$arrayI)
	{
		$sizeM=sizeof($arrayM);
		$sizeI=sizeof($arrayI);

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

		for($j=0;$j<$sizeI;$j++)
		{
				//Defines query to get the correct Interest id from the table
				$queryI="SELECT id FROM Interest WHERE interest='$arrayI[$j]'";

				//Performs defined query, result is an array
				$interestIDq=mysql_query($queryI);

				//Fetches the row from the resulting array
				$interestIDr=mysql_fetch_row($interestIDq);

				//Goes to specific field (#1) in the row
				$interestID=$interestIDr[0];


				//Defines query to put the found ids and insert into the MajorInterest table
				$query="INSERT INTO MajorInterest "
					." set majorID='$majorID' "
					." ,interestID='$interestID' "
					.";";

   				//Performs insertion query, checks for errors using noerror function defined in tabledump.php	
   				$result=mysql_query($query);
   				if ($result==0) { noerror( $result ); }
		}
		}
	}

	connect($arrayM,$arrayI);
   //Header travels to specified location
   header("Location: ../main/interestAdd.php");
   exit;
		}
		else  //Edit
		{
			$id=$_GET["ide"];
			//echo $_GET["ide"];

			$query = "SELECT * FROM Interest WHERE id='".$id."'";
			$result = mysql_query($query);

			$row=mysql_fetch_array($result);
			$i=1;
			$interest=$row[$i];
			

			echo "<form action=interestEditProcess.php?id=".$id." method=POST>";
   				echo "<table>";
     					echo "<tr>";
         					echo "<td align=right>Interest</td>";
         					echo "<td> <input type=text name=interest value='".$interest."' /> </td>";
     					 echo "</tr>";
     					 echo "<tr>";
         					echo "<td align=right>Submit</td>";
         					echo "<td> <input type=submit  name=Submit value=Submit /> </td>";
      					echo "</tr>";
  				 echo "</table>";
			echo "</form>";

			//header("Location: interestAdd.php");
			//exit;
		}
?>