<?php
session_start();
   include("..//included/tabledump.php");
   include("..//included/openDB.php");
   openDB();

  $description= $_POST['description'];
   $url= addslashes($_POST['link']);
   $opportunity= $_POST['opportunity'];
   
   /*$query="SELECT id FROM Major WHERE major='$major';";
   $result=mysql_query($query);
   $resultArray=mysql_fetch_array($result);
   $majorID=$resultArray[0];*/
   
   $query1="INSERT INTO Opportunity "
          ." set opportunity='$opportunity' "
          ." ,link='$url' "
	   ." ,description='$description' "
          .";";
          
   $result=mysql_query($query1);
   if ($result==0) { noerror( $result ); }
   //echo "query = $query";

   header("Location: opportunityAdd.php");
   exit;
   
?>