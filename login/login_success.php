<?php
session_start();
if(!isset($_SESSION['email'])){
header("Location:../main/main_login.php");
}
?>