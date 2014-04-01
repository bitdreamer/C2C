<?php
	/*This function checks if user is logged in*/
	function areYouLogged(){
		//If the user is not logged in, redirect to main_login.php
		if(!isset($_SESSION['email'])){
			header("Location:..//login/main_login.php");
		}
	}
	/*This function checks who is logged in.
	Levels of access:
	1 - The ability to add database content
	2 - the ability to add new admins, and to add database content
	*/
	function whoIsLogged($accessLevel){
		if(isset($_SESSION['email'])){
		//Send to page that states the person has o access to it, and add link to forward to previous page.
			if($accessLevel == 1){
				header("Location:..//login/notif.php?msg=7");
			}
		}
		else{
			header("Location:..//login/main_login.php");
		}
	}
?>