<?php
   include("..//included/tabledump.php");
   include("..//included/openDB.php");
   openDB();

	$major=$_POST['major'];
	$job=$_POST['job'];
	$mindegree=$_POST['MinDegree'];

	$queryB="SELECT id FROM Major WHERE major='$major'";
	$queryC="SELECT id FROM Job WHERE career='$job'";

	$majorIDr=mysql_query($queryB);
	$jobIDr=mysql_query($queryC);

	$majorIDq=mysql_fetch_row($majorIDr);
	$jobIDq=mysql_fetch_row($jobIDr);

	$majorID=$majorIDq[0];
	$jobID=$jobIDq[0];

	$queryD="INSERT INTO MajorJob "
		." set majorID='$majorID' "
		." ,jobID='$jobID' "
		." ,degree='$mindegree' "
		.";";

   $resultD=mysql_query($queryD);
   if ($resultD==0) { noerror( $resultD ); }
   header("Location:addJob.php");
   exit;
?>