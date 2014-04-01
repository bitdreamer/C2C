<?php
	session_start();
   include("..//included/tabledump.php");
   include("..//included/openDB.php");
   openDB();

   $id=$_GET["id"];
   $description=$_POST["description"];
   $department=$_POST["department"];
   
   $query="UPDATE Major SET description='".$description."', department='".$department."' WHERE id='".$id."'";
   $result=mysql_query($query);
   if ($result==0) { noerror( $result ); }

   header("Location: majorAdd.php");
   exit; 
?>