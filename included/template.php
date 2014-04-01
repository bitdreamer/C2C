<?php
/*
This function echoes the header, navigation bar, and footer HTML code
*/

function head(){
	echo"<head>\n
		<meta charset='utf-8'/>\n
		<title>Career Pathways</title>\n
		<link rel='stylesheet' type='text/css'  href='../style.css' />\n
		</head>";
}
function displayContent($msg){
	if($msg==1){
		$sentence="Wrong Username or Password.  Try again."; 
	}
	else if($msg==2){
		$sentence="Passwords don't match. Please try again.";
	}
	else if($msg==3){
		//notif
		$sentence="This is a server error. If problem persists please tell tech support";
	}
	else if($msg==4){
		$sentence="An account with this email or username alreasy exists.";
	}
	else if($msg==5){
		$sentence="Failed to register. Try again.";
	}
	else if($msg==6){
		//notif
		$sentence="A registration confirmation e-mail was sent to the user you just added. Be sure to let
		him/her know to check their spam folder.";
	}
	
	echo $sentence;
}
function heading(){
	//Logo header
	echo"<header id=top_header>\n
		<section id=logo></section>\n
		</header>";
}
function footer(){
	echo"<footer id='footer'>\n
		<div id='address'>\n
		<a href='https://www.google.com/maps/place/Meredith+College/@35.7983206,-78.6889146,16z/data=!3m1!4b1!4m2!3m1!1s0x89acf5c670c2dbc5:0x179f9c722569698c'>
		3800 Hillsborough Street | Raleigh, NC 27607-5298</a>\n
		</br>
		Phone: (919) 760-8600 or 1-800 MEREDITH\n
		</div>\n
		</footer>";
}
?>