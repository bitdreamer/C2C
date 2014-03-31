<?php
   $bug = true;
   session_start();
   include("..//included/tabledump.php");
   include("..//included/openDB.php");
   openDB();

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
   header("Location: main_register.php?PHPSESSID=".session_id()."&msg=2");
   exit();
}
if($em!="" && $em==$emas && $pw!="" && $pw==$pw2 )// no funny stuff in email
{
	// user is trying to register.  see if email is already taken
	// If no match, go ahead and add.
	$query= "SELECT COUNT(*) FROM User WHERE email='$em';";
	$result=mysql_query($query);
	$queryU= "SELECT COUNT(*) FROM User WHERE userName='$un';";
	$resultU=mysql_query($queryU);

	if($result==0)
	{
		header("Location: notif.php?PHPSESSID=".session_id()."&msg=3");
		exit();
	}
	elseif (@mysql_num_rows($result)==0)
	{
		header("Location: notif.php?PHPSESSID=".session_id()."&msg=3");
		exit();
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
			 //This function inserts data into the 'Register' table
			 doRegister( $em, $pw, @$_POST[firstname4reg], @$_POST[lastname4reg], 
				      @$_POST[regnum], $un, $lv ); 
			header("Location: notif.php?PHPSESSID=".session_id()."&msg=6");
			exit();
		}
		else
		{
			 header("Location: main_register.php?PHPSESSID=".session_id()."&msg=4");
			 exit();
		}
	}
}
else
{
	header("Location: main_register.php?PHPSESSID=".session_id()."&msg=5");
	exit();
}
   // register with email, password, firstname, lastname, and regnum
   // Note: pw, firstname and lastname may need slashing
   function doRegister( $em, $pw, $first, $last, $regnum, $un, $lv )
   {         
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
   }
?>
