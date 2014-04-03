<?php
	session_start();
   include("..//included/tabledump.php");
   include("..//included/openDB.php");
   openDB();

   $id=$_GET["id"];
   $name=$_POST["name"];
   $email=$_POST["email"];
   
   $query="UPDATE Alumna SET name='".$name."', email='".$email."' WHERE id='".$id."'";
   $result=mysql_query($query);
   if ($result==0) { noerror( $result ); }

   header("Location: ../main/alumnaAdd.php");
   exit; 
?>