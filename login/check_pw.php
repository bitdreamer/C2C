<?php
	session_start(); 
	include("./included/openDB");
	
	

	header(Location: 'notif.php?msg=7&email=$email');
	//Insert header to main login, or notif. Send pw through email
?>