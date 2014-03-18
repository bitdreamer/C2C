<?php
	session_start();
   include("..//included/tabledump.php");
   include("..//included/openDB.php");
   openDB();

	$id = $_GET["id"];
   
   $query="DELETE FROM Major WHERE id='".$id."'";

   $result=mysql_query($query);
   if ($result==0) { noerror( $result ); }

	$queryB="DELETE FROM MajorAlumna WHERE majorID='".$id."'";

	$resultB=mysql_query($queryB);
	if ($resultB==0) {noerror($resultB);}

	$queryC="DELETE FROM MajorInterest WHERE majorID='".$id."'";

	$resultC=mysql_query($queryC);
	if ($resultC==0) {noerror($resultC);}

	$queryD="DELETE FROM MajorJob WHERE majorID='".$id."'";

	$resultD=mysql_query($queryD);
	if ($resultD==0) {noerror($resultD);}

	$queryE="DELETE FROM MajorLink WHERE majorID='".$id."'";

	$resultE=mysql_query($queryE);
	if ($resultE==0) {noerror($resultE);}

	$queryF="DELETE FROM MajorOpportunity WHERE majorID='".$id."'";

	$resultF=mysql_query($queryF);
	if ($resultF==0) {noerror($resultF);}

   header("Location: majorAdd.php");
   exit;
?>