/*
	This page processes the delete request from alumnaAdd.php.
	The recieved value, $id, refers to the Alumna id pulled from the table on alumnaAdd.php.
*/

<?php
	session_start();
   include("..//included/tabledump.php");
   include("..//included/openDB.php");
   openDB();

	$id = $_GET["id"];


	//Query to remove Alumna record   
   $query="DELETE FROM Alumna WHERE id='".$id."'";

   $result=mysql_query($query);
   if ($result==0) { noerror( $result ); }


	//Query to remove relationship between Alumna record and Major
	$queryB="DELETE FROM MajorAlumna WHERE alumnaID='".$id."'";

	$resultB=mysql_query($queryB);
	if ($resultB==0) {noerror($resultB);}


   header("Location: alumnaAdd.php");
   exit;
?>