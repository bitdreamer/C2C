<?php
	session_start();
   include("..//included/tabledump.php");
   include("..//included/openDB.php");
   openDB();

	$id = $_GET["id"];
   
   $query="DELETE FROM Opportunity WHERE id='".$id."'";

   $result=mysql_query($query);
   if ($result==0) { noerror( $result ); }

	$queryB="DELETE FROM MajorOpportunity WHERE opportunityID='".$id."'";

	$resultB=mysql_query($queryB);
	if ($resultB==0) {noerror($resultB);}

   header("Location: opportunityAdd.php");
   exit;
?>