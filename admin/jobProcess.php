<?php
   include("..//included/tabledump.php");
   include("..//included/openDB.php");
   openDB();

   	$career=$_POST['job'];
	$description=$_POST['description'];
   
   $query="INSERT INTO Job "
          ." set career='$career' "
	." ,description='$description' "
          .";";

   $result=mysql_query($query);
   if ($result==0) { noerror( $result ); }




   header("Location: addJob.php");
   exit;
?>