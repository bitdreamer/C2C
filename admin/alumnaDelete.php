<?php
	session_start();
   include("..//included/tabledump.php");
   include("..//included/openDB.php");
   openDB();
   
   $query="DELETE FROM Alumna WHERE id=$id";

   $result=mysql_query($query);
   if ($result==0) { noerror( $result ); }

   header("Location: addAlumna.php");
   exit;
?>