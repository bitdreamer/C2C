<html>
<head> 
<title>Classroom to Career Pathways</title>
</head>
<body>
<h1>Classroom to Career Pathways</h1>
<?php
//menu.php iclude function that echoes navigation bar
	include("../included/menu.php");
	openAddMenu();
?>
<br/>
<h2>Add New Alumna</h2>

<!--Begin form.  
action attribute denotes where the informatio will be directed.  
method attribute type POST will create an array with submitted information.  
The POST array will be indexed using the respective input type's name -->

<form action="processAlumna.php" method="POST">
   <table>

      <tr>
         <td align="right">Name</td>
         <td> <input type="text" name="name" /> </td>
      </tr>

      <tr>
         <td align="right">Email</td>
         <td> <input type="text" name="email" /> </td>
      </tr>

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
		<td align="right">Degree</td>
		<td><select name="degree" id="degree" required="required">
			<option value="BA">BA</option>
			<option value="BS">BS</option>
			<option value="BSW">BSW</option>
			</select></td>
	</tr>

      <tr>
         <td align="right">Submit</td>
         <td> <input type="submit"  name="Submit" value="Submit"/> </td>
      </tr>

   </table>
</form>
<?php
	//This section will show the contents of the Alumna table
	echo "<section>";
	
		/*tabledump contains a function (tabledump()) that iterates through a table and displays all of its contents
		opeDB cotains a function (opeDB()) that grants access to the database*/

   		include("../included/tabledump.php");
  	 	include("../included/openDB.php");
		
  	 	openDB();

		//MySQL query
		$query="SELECT * from Alumna;";
    		$result=mysql_query($query);
   
   		tabledump( $result );
   
	echo "</section>";
?>
</body>
</html>
