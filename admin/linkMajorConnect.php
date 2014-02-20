<?php
   //include allows file to reference all functions in specified files (here, tabledump.php and openDB.php
   include("..//included/tabledump.php");
   include("..//included/openDB.php");
   //openDB() is a defined function in openDB, opens the classroomtocareer database
   openDB();

	//Gathers input data from addJob.php
	$mindegree=$_POST['MinDegree'];
	$arrayM=$_POST['checkboxM'];	//majors
	$arrayL=$_POST['checkboxL'];	//links


	connect($arrayM,$arrayL,$mindegree);

	function connect($arrayM,$arrayL,$mindegree)
	{
		$sizeM=sizeof($arrayM);
		$sizeL=sizeof($arrayL);

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

		for($j=0;$j<$sizeL;$j++)
		{
				//Defines query to get the correct Job id from the table
				$queryL="SELECT linkID FROM Link WHERE name='$arrayL[$j]'";

				//Performs defined query, result is an array
				$linkIDq=mysql_query($queryL);

				//Fetchs the row from the resulting array
				$linkIDr=mysql_fetch_row($linkIDq);

				//Goes to specific field (#0) in the row
				$linkID=$linkIDr[0];

				//Defines query to put the found ids and the mindegree in the MajorJob table
				$query="INSERT INTO MajorLink "
					." set majorID='$majorID' "
					." ,linkID='$linkID' "
					.";";

   				//Performs insertion query, checks for errors using noerror function defined in tabledump.php	
   				$result=mysql_query($query);
   				if ($result==0) { noerror( $result ); }
		}
		}
	}
   //Header travels to specified location
   header("Location:linkAdd.php");
   exit;
?>