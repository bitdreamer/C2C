<?php
	session_start(); 
	include("./included/openDB");
	
	$em = @$_POST[email]
	
	$pwquery = "SELECT password FROM User WHERE email ='$em';";
	$result = mysql_query($pwquery);
	
	$row = mysql_fetch_row($result);
	
	$subj = "Career Pathways - Password Reminder";
	$msg="We're sorry you forgot your password. Try to remember it next time. :)\n
	Your password is: ".$pw;
	
	if($row !=  0){
		mail($em,$subj,$msg,$heads);
		header(Location: 'notif.php?msg=7&email=$em');
	}
	else {
		header(Location: 'notif.php?msg=8&email=$em');
	}
	
	//Insert header to main login, or notif. Send pw through email
?>