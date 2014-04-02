<?php
/*
	This page processes the delete request from alumnaAdd.php.
	The recieved value, $id, refers to the Alumna id pulled from the table on alumnaAdd.php.
*/
	session_start();
   include("..//included/tabledump.php");
   include("..//included/openDB.php");
   openDB();


if(isset($_GET['id'])) 
{
	$id = $_GET["id"];

	//Query to remove Alumna record   
	$query="DELETE FROM Alumna WHERE id='".$id."'";

	$result=mysql_query($query);
	if ($result==0) { noerror( $result ); }


	//Query to remove relationship between Alumna record and Major
	$queryB="DELETE FROM MajorAlumna WHERE alumnaID='".$id."'";

	$resultB=mysql_query($queryB);
	if ($resultB==0) {noerror($resultB);}


	header("Location: ../main/alumnaAdd.php");
	exit;
}
else
{

			$id=$_GET["ide"];
			//echo $_GET["ide"];

			$query = "SELECT * FROM Alumna WHERE id='".$id."'";
			$result = mysql_query($query);

			$row=mysql_fetch_array($result);
			$i=1;
			$name=$row[$i];
			$email=$row[2];


echo "Contact administrator to reassign major or degree";
echo "<form action=alumnaEditProcess.php?id=".$id." method=POST>";
   echo "<table>";

      echo "<tr>";
         echo "<td align=right>Name</td>";
         echo "<td> <input type=text name=name value=$name /> </td>";
      echo "</tr>";

      echo "<tr>";
         echo "<td align=right>Email</td>";
         echo "<td> <input type=text name=email value=$email /> </td>";
      echo "</tr>";

      /*echo "<tr>";
      echo "<td align=right>Major</td>";
		 	echo "<td><select name=major id=major required=required>";
				echo "<option value=Accounting>Accounting</option>";
				echo "<option value=Art Education>Art Education</option>";
				echo "<option value=Biology>Biology</option>";
				echo "<option value=Business Administration>Business Administration</option>";
				echo "<option value=Business Administration - Human Resource Management>Business Administration - Human Resource Management</option>";
				echo "<option value=Chemistry>Chemistry</option>";
				echo "<option value=Child Development>Child Development</option>";
				echo "<option value=Communication - Interpersonal Communication>Communication - Interpersonal Communication</option>";
				echo "<option value=Communication - Mass Communication>Communication - Mass Communication</option>";
				echo "<option value=Computer Science>Computer Science</option>";
				echo "<option value=Criminology>Criminology</option>";
				echo "<option value=Dance Studies>Dance Studies</option>";
				echo "<option value=Economics>Economics</option>";
				echo "<option value=Education>Education</option>";
				echo "<option value=Engineering>Engineering</option>";
				echo "<option value=English>English</option>";
				echo "<option value=Environmental Sustainability>Environmental Sustainability</option>";
				echo "<option value=Exercise & Sports Science - Health & Physical Education>Exercise & Sports Science - Health & Physical Education</option>";
				echo "<option value=Exercise & Sports Science - Health & Wellness>Exercise & Sports Science - Health & Wellness</option>";
				echo "<option value=Family & Consumer Sciences>Family & Consumer Sciences</option>";
				echo "<option value=Fashion Merchandising & Design - Merchandising>Fashion Merchandising & Design - Merchandising</option>";
				echo "<option value=Fashion Merchandising & Design - Design>Fashion Merchandising & Design - Design</option>";
				echo "<option value=Food & Nutrition>Food & Nutrition</option>";
				echo "<option value=Graphic Design>Graphic Design</option>";
				echo "<option value=History>History</option>";
				echo "<option value=Interior Design>Interior Design</option>";
				echo "<option value=International Studies>International Studies</option>";
				echo "<option value=Mathematics>Mathematics</option>";
				echo "<option value=Music>Music</option>";
				echo "<option value=Music Education>Music Education</option>";
				echo "<option value=Political Science>Political Science</option>";
				echo "<option value=Political Science - Law & Justice>Political Science - Law & Justice</option>";
				echo "<option value=Public Health>Public Health</option>";
				echo "<option value=Psychology>Psychology</option>";
				echo "<option value=Religious & Ethical Studies>Religious & Ethical Studies</option>";
				echo "<option value=Social Work>Social Work</option>";
				echo "<option value=Sociology>Sociology</option>";
				echo "<option value=Spanish>Spanish</option>";
				echo "<option value=Studio Art>Studio Art</option>";
				echo "<option value=Theatre>Theatre</option>";
			echo "</select></td>";
      echo "</tr>";

	echo "<tr>";
		echo "<td align=right>Degree</td>";
		echo "<td><select name=degree id=degree required=required>";
			echo "<option value=BA>BA</option>";
			echo "<option value=BS>BS</option>";
			echo "<option value=BSW>BSW</option>";
			echo "</select></td>";
	echo "</tr>";*/

      echo "<tr>";
         echo "<td align=right>Submit</td>";
         echo "<td> <input type=submit  name=Submit value=Submit /> </td>";
      echo "</tr>";

   echo "</table>";
echo "</form>";





}
?>