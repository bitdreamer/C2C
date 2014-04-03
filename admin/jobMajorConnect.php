<?php
	session_start();
   //include allows file to reference all functions in specified files (here, tabledump.php and openDB.php
   include("..//included/tabledump.php");
   include("..//included/openDB.php");
   //openDB() is a defined function in openDB, opens the classroomtocareer database
   openDB();

	//Gathers input data from addJob.php
	$mindegree=$_POST['MinDegree'];
	$arrayM=$_POST['checkboxM'];	//majors
	$arrayJ=$_POST['checkboxJ'];	//jobs


	connect($arrayM,$arrayJ,$mindegree);

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
   //Header travels to specified location
   header("Location: ../main/jobAdd.php");
   exit;
?>