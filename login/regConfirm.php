<?php

// This page is the target of the link from the email we sent
// to the user.  It should have in the URL username=whatever
// and confirmationNumber=42 (or whatever).
// They should also do it the same day as when they started 
// registration.

   include("..//included/tabledump.php");
   include("..//included/openDB.php");
   openDB();

   date_default_timezone_set("America/New_York");

$email = @$_GET[email];
$confirmationNumber = @$_GET[confirmationNumber];

         
   $now = time(); // this is a timestamp for right now
   $nowstring = date("Y-m-d", $now );

   $query=stripSlashes(
       "SELECT * FROM Register WHERE email='$email'".
             " AND regCode='$confirmationNumber'"
            ." AND regDate='$nowstring'"
            .";"      );
   $result=mysql_query($query);

   if($result==0)
   {
      // echo "<b>Error ".mysql_errno().": ".mysql_error()."</b>";
      $shtats = "regfailed";
   }
   elseif (@mysql_num_rows($result)==0)
   {
      // echo "<b>Query completed.  Empty result.</b><br>";
      $shtats = "regfailed";
   }
   else
   {
      $row = mysql_fetch_array($result);
      $first = $row['first'];
      $last = $row['last'];
      $regDate = $row['regDate'];
      $password = $row['password'];
	$userName = $row['userName'];
	$accessLv = $row['accessLv'];
      
      $query = "SELECT MAX(userID) from User";
      $result = mysql_query( $query );
      if ( noerror( $result ) )
      {
         $row = mysql_fetch_row($result);
         $userID = $row[0] + 1; // might want to check that this is not 1
 
         // change confN in db to 0, tell user they're good
         $query="INSERT INTO User SET "
               ."  first='$first' "
               ." ,last='$last' "
               ." ,userID='$userID' "
               ." ,email='$email' "
               ." ,password='$password' "
               ." ,regDate='$regDate' "
		." ,userName='$userName' "
		." ,accessLv='$accessLv' "
               .";";
         $result=mysql_query($query);
         // Give click option back to login page.
         $shtats = "regsuccessful";
      }
      else { $shtats = "regfailed"; }
   }

?>

<html>
<body>

<h2>Hooray!</h2> 
<?php
if ( $shtats=="regsuccessful" )
{
   echo "Registration was successful. <br />";
}
else
{
   echo "Registration failed. <br /> ";
}

?>

<a href="main_login.php"> Click here to login </a> 

</body>
</html>
