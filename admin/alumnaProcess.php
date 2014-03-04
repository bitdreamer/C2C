<?php
	session_start();
   include("..//included/tabledump.php");
   include("..//included/openDB.php");
   openDB();

   	$name=$_POST['name'];
	$email=$_POST['email'];
	$major=$_POST['major'];
	$degree=$_POST['degree'];
   
   $query="INSERT INTO Alumna "
          ." set name='$name' "
	." ,email='$email' "
	." ,degree='$degree' "
          .";";

   $result=mysql_query($query);
   if ($result==0) { noerror( $result ); }

   header("Location: alumnaAdd.php");
   exit;
?>