<?php
   include("..//included/openDB.php");
   include("../included/tabledump.php");
   openDB();

   $major= $_POST['major'];
   $url= addslashes($_POST['link']);
   $name= $_POST['name'];
   $description= $_POST['description'];
   $category= $_POST['category'];
   
   $query="SELECT id FROM Major WHERE major='$major';";
   $result=mysql_query($query);
   $resultArray=mysql_fetch_array($result);
   $majorID=$resultArray[0];
   
   $query1="INSERT INTO MajorLink "
          ." set majorID='$majorID' "
          ." ,link='$url' "
          ." ,name='$name' "
          ." ,description='$description' "
          ." ,category='$category' "
          .";";
   $result1=mysql_query($query1);
   if ($result1==0) { noerror( $result1 ); }
   //echo "query = $query";
   header("Location: addLink.php");
   exit;
?>