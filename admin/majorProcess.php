<?php
session_start();
   include("..//included/tabledump.php");
   include("..//included/openDB.php");
   openDB();


if(isset($_GET['id']))
{
	$id = $_GET["id"];
   
   $query="DELETE FROM Major WHERE id='".$id."'";

   $result=mysql_query($query);
   if ($result==0) { noerror( $result ); }

	$queryB="DELETE FROM MajorAlumna WHERE majorID='".$id."'";

	$resultB=mysql_query($queryB);
	if ($resultB==0) {noerror($resultB);}

	$queryC="DELETE FROM MajorInterest WHERE majorID='".$id."'";

	$resultC=mysql_query($queryC);
	if ($resultC==0) {noerror($resultC);}

	$queryD="DELETE FROM MajorJob WHERE majorID='".$id."'";

	$resultD=mysql_query($queryD);
	if ($resultD==0) {noerror($resultD);}

	$queryE="DELETE FROM MajorLink WHERE majorID='".$id."'";

	$resultE=mysql_query($queryE);
	if ($resultE==0) {noerror($resultE);}

	$queryF="DELETE FROM MajorOpportunity WHERE majorID='".$id."'";

	$resultF=mysql_query($queryF);
	if ($resultF==0) {noerror($resultF);}

   header("Location: ../main/majorAdd.php");
   exit;
}
elseif(isset($_POST['SubmitP']))
{
	$id=$_POST['id'];
   	$major=$_POST['major'];
	$description=$_POST['description'];
	$department=$_POST['department'];
   
   $query="INSERT INTO Major "
          ." set id='$id' "
	." ,major='$major' "
	." ,description='$description' "
	." ,department='$department' "
          .";";

   $result=mysql_query($query);
   if ($result==0) { noerror( $result ); }

   header("Location: ../main/majorAdd.php");
   exit;
}
else
{
			$id=$_GET["ide"];
			//echo $_GET["ide"];

			$query = "SELECT * FROM Major WHERE id='".$id."'";
			$result = mysql_query($query);

			$row=mysql_fetch_array($result);
			$description=$row[2];
			$department=$row[3];


echo "Contact admin to change major name or ID";

echo "<form action=majorEditProcess.php?id=".$id." method=POST>";
echo "<table>";
 /*echo "<td align=right>Major</td>";
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

	<tr>
         <td >ID</td>
         <td><input type="text" name="id" value="" required="required" size="3"></td>
      </tr>*/
	  

	echo "<tr>";
         echo "<td>Description</td>";
         echo "<td><input type=text name=description value='".$description."' required=required size=50 ></td>";
      echo "</tr>";
	echo "<tr>";
         echo "<td >Department</td>";
         echo "<td><input type=text name=department value='".$department."' required=required size=20></td>";
      echo "</tr>";
echo "<tr>";
				echo "<td colspan=2 align=center >";
				echo "<input type=submit value=Submit >";
				echo "</td>";
			echo "</tr>";
	echo "</table>";
	echo "</form>";
}
?>