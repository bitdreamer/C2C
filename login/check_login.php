<?php
   session_start();
   include("..//included/tabledump.php");
   include("..//included/openDB.php");
   openDB();
   
   date_default_timezone_set("America/New_York");

//username and password are sent from form
$em = @$_POST[email4log]; // raw email address, may have bad stuff
$em .= "@email.meredith.edu";
$emas = addslashes( $em ); // slashes version 
$pw = @$_POST[password4log];
$pwas = addSlashes( $pw );

//look for user
$emas = mysql_real_escape_string($emas);
$pwas = mysql_real_escape_string($pwas);
$sql="SELECT * FROM User WHERE email='$emas' and password='$pwas'";
$result=mysql_query($sql);
// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If result matched $emas and $pwas, table row must be 1 row
if($count==1){

	// Register $emas, $pwas and redirect to file "login_success.php"
	$_SESSION['email'] = $emas;
	$_SESSION['password'] = $pwas;
	
	//get the userID and username to store in session variable
	$email = $_SESSION['email'];
	$query1 = "SELECT * FROM User WHERE email='$email';";
	$result1 = mysql_query($query1);
	$userInfo = mysql_fetch_array($result1);
	$getuserID = $userInfo[4];
	$getusername = $userInfo[6];
	$getaccessLv = $userInfo[7];
	settype($getuserID, "integer");
	settype($getusername, "string");
	
	$_SESSION['userID'] = $getuserID;
	$_SESSION['username'] = $getusername;
	$_SESSION['accessLv'] = $getaccessLv;
	
	//Will be 1 if logged in, 0 if not.
	$_SESSION['islogged'] = 1;
	if(isset($_SESSION['prevpage']))	
	{
		//if you were redirected, go back to where you came from
		$urlString = $_SESSION['prevpage'];
		header($urlString);
	}
	else	
	{
		//go home
		header("Location: ../admin/majorAdd.php");
	}
}
else {
header ("Location: main_login.php?msg=1");
}
?>
</body>
</html>
