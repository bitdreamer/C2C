<?php
/*
This function echoes the header, navigation bar, and footer HTML code
*/

function headContent(){
	echo"<meta charset='UTF-8'>\n
    <title>Career Pathways - Meredith College</title>\n
    <link rel='stylesheet' href='../style.css' type='text/css' />\n
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>\n
    <script src='../included/error.js'></script>\n";
}
function displayContent($msg){
	//Messages 1-4 are login messages
	if($msg==1){
		$sentence="Wrong Username or Password.  Try again."; 
	}
	elseif($msg==2){
		$sentence="Passwords don't match. Please try again.";
	}
	elseif($msg==3){
		//notif
		$sentence="This is a server error. If problem persists please tell tech support";
	}
	elseif($msg==4){
		$sentence="An account with this email or username alreasy exists.";
	}

	//Messages 5-6 are registration messages
	elseif($msg==5){
		$sentence="Failed to register. Try again.";
	}
	elseif($msg==6){
		$sentence="A registration confirmation e-mail was sent to the user you just added. Be sure to let
		him/her know to check their spam folder.";
	}

	//Messages 7-8 are 'Forgot password' messages
	elseif($msg==7){
		$sentence="An email was sent to you with your password.";
	}
	elseif($msg==8){
		$sentence="A user with that e-mail has not been found.";
	}
	echo $sentence;
}
function headerContent(){
	//Logo header
	echo"<header id=top_header>\n
		<section id=logo></section>\n
		</header>";
}
function footerContent(){
	echo"<img src='../images/meredith_college_lockup.png'/>\n
    <p>\n
		<a href='https://www.google.com/maps/place/Meredith+College/@35.7983206,-78.6889146,16z/data=!3m1!4b1!4m2!3m1!1s0x89acf5c670c2dbc5:0x179f9c722569698c'>
		3800 Hillsborough Street | Raleigh, NC 27607-5298</a>\n
		</br>
		Phone: (919) 760-8600 or 1-800 MEREDITH\n
		</p>\n";
}
?>