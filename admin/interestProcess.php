<?php
session_start();
   include("../included/tabledump.php");
   include("../included/openDB.php");
   openDB();

   $interest= $_POST['interest'];
   
   $query="INSERT INTO Interest "
          ." set interest='$interest' "
          .";";
   $result=mysql_query($query);
   if ($result==0) { noerror( $result ); }
   //echo "query = $query";

   header("Location: ../main/interestAdd.php");
   exit; 
?>