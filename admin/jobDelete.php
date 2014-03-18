<?php
	session_start();
   include("..//included/tabledump.php");
   include("..//included/openDB.php");
   openDB();

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


   header("Location: jobAdd.php");
   exit;
?>