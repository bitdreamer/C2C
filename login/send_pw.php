<?php
	session_start(); 
	include("../included/openDB.php");
	openDB();
	
	//get email from previous form in main/forgot_pw.php
	$em = @$_POST[email];
	
	//get user info and pw
	$pwquery = "SELECT * FROM User WHERE email='$em'";
	$result = mysql_query($pwquery);
	$rowCount = mysql_num_rows($result);
	
	//If a row is returned, then continure searching for user password. (Only one possible result)
	if($rowCount == 1){
		$userInfo = mysql_fetch_array($result);
		$pw = $userInfo[3];

	
		//creates email content
		$subj = "Career Pathways - Password Reminder";
		$msg="We're sorry you forgot your password. Try to remember it next time. :)\n
		Your password is: ".$pw;

		//sends mail and redirects
		mail($em,$subj,$msg,$heads);
		header("Location: ../main/notif.php?msg=7");
	}
	//If not, notify that a user with specified e-mail address does not exist.
	else {
		header("Location: ../main/notif.php?msg=8&email=$em");
	}
?>