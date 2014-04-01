<?php
	session_start();
   include("..//included/tabledump.php");
   include("..//included/openDB.php");
   openDB();

   $id=$_GET["id"];
   $interest=$_POST["interest"];
   
   $query="UPDATE Interest SET interest='".$interest."' WHERE id='".$id."'";
   $result=mysql_query($query);
   if ($result==0) { noerror( $result ); }

   header("Location: interestAdd.php");
   exit; 
?>