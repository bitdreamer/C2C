<?php
	session_start();
   include("..//included/tabledump.php");
   include("..//included/openDB.php");
   openDB();

   $id=$_GET["id"];
   $opportunity=$_POST["opportunity"];
   $link=$_POST["link"];
   $description=$_POST["description"];
   
   $query="UPDATE Opportunity SET opportunity='".$opportunity."', link='".$link."', description='".$description."' WHERE id='".$id."'";
   $result=mysql_query($query);
   if ($result==0) { noerror( $result ); }

   header("Location: ../main/opportunityAdd.php");
   exit; 
?>