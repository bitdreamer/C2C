<?php
   $bug = true;
   session_start();
   include("..//included/tabledump.php");
   include("..//included/openDB.php");
   openDB();
?>

<html>
<head>
<title> Registration Processsing</title>
</head>
<body>
<h2>Registration Processing</h2>

<?php

/* register.php
   This page is sent in POST the email4Reg, firstname4reg, lastname4reg,
   password4reg, password4reg2, regnum.   
   They have been checked for length but not funny stuff.
   We make sure the passwords match and that this email is new.
   Then record a temporary Customer record in the database and 
   then send them email for them to ping back with the number.
*/
date_default_timezone_set("America/New_York");
   
$em  = @$_POST[email4reg]; // raw email address, may have bad stuff
$em .= "@email.meredith.edu";
$emas = addslashes( $em );
$pw  = @$_POST[password4reg];
$pw2 = @$_POST[password4reg2];
$un = @$_POST[username4reg];
$lv = @$_POST[access];

if ( $pw!=$pw2 )
{
   //header("Location: logger1Start.php?fun=pwmismatch");
   echo "Passwords don't match. Please go back and try again.  ";
}

if($em!="" && $em==$emas && $pw!="" && $pw==$pw2 ) // no funny stuff in email
{
   // user is trying to register.  see if email is already taken
   // If no match, go ahead and add.
   $query= "SELECT COUNT(*) FROM User WHERE email='$em';";
   $result=mysql_query($query);
   $queryU= "SELECT COUNT(*) FROM User WHERE userName='$un';";
   $resultU=mysql_query($queryU);

   if($result==0)
   {
      echo "<b>Error ".mysql_errno().": ".mysql_error()."</b>";
      echo "This is a server error.  If it persists please tell tech support. ";
      $shtats = "queryerror1";
   }
   elseif (@mysql_num_rows($result)==0)
   {
      echo "<b></b><br>";
      echo "This is a server error.  If it persists please tell tech support. ";
      $shtats = "queryerror2";
   }
   else
   {
      $row = mysql_fetch_row($result);
	$rowU = mysql_fetch_row($resultU);
      if ( $row[0]==0 && $rowU[0]==0 ) // no match is good
      {
         // registration: email address is
         // not in the database, so add this person as temp and 
         // send email to confirm.

         $shtats = "ok2add";
	 
	 //This function inserts data into the 'Register' table
         doRegister( $em, $pw, @$_POST[firstname4reg], @$_POST[lastname4reg], 
                      @$_POST[regnum], $un, $lv ); 
      }
      else
      {
         $shtats = "EmailTaken"; 
         echo "An account with this email or username already exists.  Go back "
         ." and hit the 'forgot password' option if you need to.";
      }
   }
   
}
else
{
	echo "Failed to register. Try again.";
}


   // register with email, password, firstname, lastname, and regnum
   // Note: pw, firstname and lastname may need slashing
   function doRegister( $em, $pw, $first, $last, $regnum, $un, $lv )
   {
      $shtats = "ok2add";
         
         $querydel = "DELETE FROM Register WHERE email='$em';";
         mysql_query($querydel);
         
         $now = time(); // this is a timestamp for right now
         $nowstring = date("Y-m-d", $now );
         $query= "INSERT INTO Register SET" // We 2-step this, first into Register, then after confirmation, Insert into User
         ."     first='".addslashes($first)."' "
         ."    ,last='".addslashes($last)."' "
         ."    ,regCode=$regnum "
         ."    ,regDate='$nowstring' "
         ."    ,passWord='".addslashes($pw)."' "
         ."    ,email='$em'"
	  ."	,userName='$un'"
	  ."	,accessLv='$lv'"
         ." ;";
         $result=mysql_query($query);
         noerror($result);
         
         // Email details to be sent
         $subj="Registration Confirmation";
         $msg="Congratulations. You now have admin access to the Career Pathways website. \n
	Your username is: ".$un."\n 
	Your password is: ".$pw."\n\n
	Confirm registration to Classroom to Career Pathways by clicking on this link:\n "

         ."http://www.bitlab.meredith.edu/~c2c/login/regConfirm.php"
         ."?email=$em&confirmationNumber="
         ."$regnum\" >"
         ;
         $heads="";
		
	  //Send e-mail
         mail($em,$subj,$msg,$heads);
         
         echo "Go read your email and click on the link to confirm.";
   }

?>

</body>
</html>
