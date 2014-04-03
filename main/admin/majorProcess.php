<?php
session_start();
   include("..//included/tabledump.php");
   include("..//included/openDB.php");
   openDB();

	$id=$_POST['id'];
   	$major=$_POST['major'];
	$description=$_POST['description'];
	$department=$_POST['department'];
   
   $query="INSERT INTO Major "
          ." set id='$id' "
	." ,major='$major' "
	." ,description='$description' "
	." ,department='$department' "
          .";";

   $result=mysql_query($query);
   if ($result==0) { noerror( $result ); }

   header("Location: ../main/majorAdd.php");
   exit;
?>