<?php
	session_start();
   include("..//included/tabledump.php");
   include("..//included/openDB.php");
   openDB();

	$id = $_GET["id"];
   
   $query="DELETE FROM Job WHERE id='".$id."'";

   $result=mysql_query($query);
   if ($result==0) { noerror( $result ); }

   header("Location: jobAdd.php");
   exit;
?>