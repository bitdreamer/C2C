<?php
   //include allows file to reference all functions in specified files (here, tabledump.php and openDB.php
   include("..//included/tabledump.php");
   include("..//included/openDB.php");
   //openDB() is a defined function in openDB, opens the classroomtocareer database
   openDB();

	//Gathers input data from addOpportunity.php
	$arrayM=$_POST['checkboxM'];	//majors
	$arrayO=$_POST['checkboxO'];	//jobs


	connect($arrayM,$arrayO,$mindegree);

	function connect($arrayM,$arrayO,$mindegree)
	{
		$sizeM=sizeof($arrayM);
		$sizeO=sizeof($arrayO);

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

		for($j=0;$j<$sizeO;$j++)
		{
				//Defines query to get the correct Job id from the table
				$queryO="SELECT opportunityID FROM Opportunity WHERE opportunity='$arrayO[$j]'";

				//Performs defined query, result is an array
				$opportunityIDq=mysql_query($queryO);

				//Fetchs the row from the resulting array
				$opportunityIDr=mysql_fetch_row($opportunityIDq);

				//Goes to specific field (#0) in the row
				$opportunityID=$opportunityIDr[0];

				//Defines query to put the found ids and the mindegree in the MajorJob table
				$query="INSERT INTO MajorOpportunity "
					." set majorID='$majorID' "
					." ,opportunityID='$opportunityID' "
					.";";

   				//Performs insertion query, checks for errors using noerror function defined in tabledump.php	
   				$result=mysql_query($query);
   				if ($result==0) { noerror( $result ); }
		}
		}
	}
   //Header travels to specified location
   header("Location: ../main/opportunityAdd.php");
   exit;
?>