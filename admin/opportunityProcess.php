<?php
session_start();
   include("..//included/tabledump.php");
   include("..//included/openDB.php");
   openDB();

  $major= $_POST['major'];
   $url= addslashes($_POST['link']);
   $opportunity= $_POST['opportunity'];
   
   $query="SELECT id FROM Major WHERE major='$major';";
   $result=mysql_query($query);
   $resultArray=mysql_fetch_array($result);
   $majorID=$resultArray[0];
   
   $query1="INSERT INTO MajorOpportunities "
          ." set majorID='$majorID' "
          ." ,opportunity='$opportunity' "
          ." ,link='$url' "
          .";";
          
   $result=mysql_query($query1);
   if ($result==0) { noerror( $result ); }
   //echo "query = $query";

   header("Location: opportunityAdd.php");
   exit;
   
?>