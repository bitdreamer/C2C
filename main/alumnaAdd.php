<?php
	session_start();
	include("../included/loginStatus.php");
	areYouLogged();
	include("../included/openDB.php");
    include("../included/template.php");
    include("../included/leftMenu.php");
    include("../included/tabledump.php");
	openDB();
?>
<!DOCTYPE HTML>
<html>
<head>
    <?php headContent(); ?>
</head>

<body>
    <div class="top_border"></div>
    <div class="band_header">
        <header>
            <h1 class="logo"></h1>
        </header>
    </div>
    <div class="bottom_border"></div>
    
    <nav>
        <?php leftMenu(); ?>
    </nav>
    
    <h1>Add New Alumna</h1>

<!-- text-->
<section>	 
<!--Begin form.  
action attribute contains the name of the file where the information will be directed.  
method attribute type POST will create an array with submitted information.  
The POST array will be indexed using the respective input type's name -->

<form action="../admin/alumnaProcess.php" method="POST">
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
		<td align="right">Class Year</td>
		<td><input type="text" name="classYear" /></td>
	</tr>

	<tr>
		<td align="right">Job</td>
		<td><input type="text" name="job" /></td>
	</tr>

	<tr>
		<td align="right">Blurb</td>
		<td><input type="text" name="blurb" /></td>
	</tr>

      <tr>
         <td align="right">Submit</td>
         <td> <input type="submit"  name="SubmitP" id="SubmitP" value="Submit"/> </td>
      </tr>

   </table>
</form>
<br/>
<br/>
<?php
	//This section will show the contents of the Alumna table
	echo "<section>";
	
		/*tabledump contains a function (tabledump()) that iterates through a table and displays all of its contents
		opeDB contains a function (opeDB()) that grants access to the database*/

		//MySQL query
		$query="SELECT * from Alumna ORDER BY name;";
    		$result=mysql_query($query);
   
		
		echo "<form action=../admin/alumnaProcess.php method=$_GET>";
   		tabledumpdeltedit( $result );
   		echo "</form>";
	echo "</section>";
?>
</section>
    
        <footer>
            <?php footerContent(); ?>
        </footer>
    </div>
</body>

</html>