<?php
   function openDB()
   {
	   $host="localhost:/var/lib/mysql/mysql.sock"; // localhost doesn't work
	   $user="c2cuser";
	   $password="pocketbagel";
	   mysql_connect($host,$user,$password);
	   mysql_select_db("classroomToCareerPathways");
   }
?>