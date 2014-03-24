<?php
	//Connects with database.  Include wherever you must access the database, and call openDB.
   function openDB()
   {
	   $host="localhost:/var/lib/mysql/mysql.sock"; // localhost doesn't work
	   $user="c2cuser";
	   $password="pocketbagel";
	   mysql_connect($host,$user,$password);
	   mysql_select_db("classroomToCareerPathways");
   }
?>