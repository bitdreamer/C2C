<html>
<head> 
<title>Classroom to Career Pathways</title>
</head>
<body>
<h1>Add a Link</h1>
<?php
	include("../included/menu.php");
	openAddMenu();
?>
<br/>
<h2>Add New Link</h2>
<form action="processLink.php" method="POST">
   <table>
      <tr>
         <td align="right">Major</td>
         <td><select name="major" id="major" required="required">
				<option value="Accounting">Accounting</option>
				<option value="Art Education">Art Education</option>
				<option value="Biology">Biology</option>
				<option value="Business Administration">Business Administration</option>
				<option value="Business Administration - Human Resource Management">Business Administration - Human Resource Management</option>
				<option value="Chemistry">Chemistry</option>
				<option value="Child Development">Child Development</option>
				<option value="Communication - Interpersonal Communication">Communication - Interpersonal Communication</option>
				<option value="Communication - Mass Communication">Communication - Mass Communication</option>
				<option value="Computer Science">Computer Science</option>
				<option value="Criminology">Criminology</option>
				<option value="Dance Studies">Dance Studies</option>
				<option value="Economics">Economics</option>
				<option value="Education">Education</option>
				<option value="Engineering">Engineering</option>
				<option value="English">English</option>
				<option value="Environmental Sustainability">Environmental Sustainability</option>
				<option value="Exercise & Sports Science - Health & Physical Education">Exercise & Sports Science - Health & Physical Education</option>
				<option value="Exercise & Sports Science - Health & Wellness">Exercise & Sports Science - Health & Wellness</option>
				<option value="Family & Consumer Sciences">Family & Consumer Sciences</option>
				<option value="Fashion Merchandising & Design - Merchandising">Fashion Merchandising & Design - Merchandising</option>
				<option value="Fashion Merchandising & Design - Design">Fashion Merchandising & Design - Design</option>
				<option value="Food & Nutrition">Food & Nutrition</option>
				<option value="Graphic Design">Graphic Design</option>
				<option value="History">History</option>
				<option value="Interior Design">Interior Design</option>
				<option value="International Studies">International Studies</option>
				<option value="Mathematics">Mathematics</option>
				<option value="Music">Music</option>
				<option value="Music Education">Music Education</option>
				<option value="Political Science">Political Science</option>
				<option value="Political Science - Law & Justice">Political Science - Law & Justice</option>
				<option value="Public Health">Public Health</option>
				<option value="Psychology">Psychology</option>
				<option value="Religious & Ethical Studies">Religious & Ethical Studies</option>
				<option value="Social Work">Social Work</option>
				<option value="Sociology">Sociology</option>
				<option value="Spanish">Spanish</option>
				<option value="Studio Art">Studio Art</option>
				<option value="Theatre">Theatre</option>
			</select></td>
      </tr>
      
      <tr>
         <td align="right">Link</td>
         <td> <input type="url" name="link" required="required"/> </td>
      </tr>
      
      <tr>
         <td align="right">Name</td>
         <td> <input type="text" name="name" required="required"/> </td>
      </tr>
      
      <tr>
         <td align="right">Description</td>
         <td> <input type="text" name="description" required="required"/> </td>
      </tr>
      
      <tr>
         <td align="right">Category</td>
         <td> <input type="text" name="category" required="required"/> </td>
      </tr>
      
      <tr>
         <td align="right">Submit</td>
         <td> <input type="submit"  name="Submit" value="Submit"/> </td>
      </tr>

   </table>
</form>
<?php
	echo "<section>";

   include("../included/tabledump.php");
   include("../included/openDB.php");
   openDB();


	$query="SELECT * from MajorLink;";
    $result=mysql_query($query);
   
   tabledump( $result );
   
	echo "</section>";
?>

</body>
</html>
