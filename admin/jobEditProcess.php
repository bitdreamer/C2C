<?php
	session_start();
   include("..//included/tabledump.php");
   include("..//included/openDB.php");
   openDB();

   $id=$_GET["id"];
   $career=$_POST["career"];
   $description=$_POST["description"];
   
   $query="UPDATE Job SET career='".$career."', description='".$description."' WHERE id='".$id."'";
   $result=mysql_query($query);
   if ($result==0) { noerror( $result ); }

   header("Location: jobAdd.php");
   exit; 
?>