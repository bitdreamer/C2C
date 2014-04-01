<?php
	session_start();
   include("..//included/tabledump.php");
   include("..//included/openDB.php");
   openDB();

   $id=$_GET["id"];
   $link=$_POST["link"];
   $name=$_POST["name"];
   $description=$_POST["description"];
   $category=$_POST["category"];
   
   $query="UPDATE Link SET link='".$link."', name='".$name."', description='".$description."', category='".$category."' WHERE id='".$id."'";
   $result=mysql_query($query);
   if ($result==0) { noerror( $result ); }

   header("Location: linkAdd.php");
   exit; 
?>