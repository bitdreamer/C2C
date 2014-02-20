<?php
	session_start();
   //include allows file to reference all functions in specified files (here, tabledump.php and openDB.php
   include("..//included/tabledump.php");
   include("..//included/openDB.php");
   //openDB() is a defined function in openDB, opens the classroomtocareer database
   openDB();

	//Gathers input data from addInterest.php
	$arrayM=$_POST['checkboxM'];	//majors
	$arrayI=$_POST['checkboxI'];	//interests


	connect($arrayM,$arrayI);

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
   //Header travels to specified location
   header("Location:interestAdd.php");
   exit;
?>