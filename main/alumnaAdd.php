<?php
session_start();
include("../included/loginStatus.php");
areYouLogged();
?>

<!-- main Page -->
<!DOCTYPE html>
<html lang="en"> 	
<head>
<meta charset="utf-8" />
<link rel= "stylesheet" href="../style.css" type="text/css" />
<title>Add an Alumna </title>


<!--body-->
<body> 
	<div id="big_wrapper">
	
<!-- logo part-->	 
	<header id="top_header">  
		<section id="logo"></section>
     </header>

<!--Left Menu-->
<div id="links">
	<nav id="left_menu">
	 <ul>
<?php
	include("../included/leftMenu.php");
	leftMenu();
?>

   </ul>	
</nav>
</div><!--links-->

     <h1 id="majorHeader">Add New Alumna</h1>

<!-- text-->
<section id="main_content">

<article id="newAlum">	 
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
         <td align="right">Submit</td>
         <td> <input type="submit"  name="Submit" value="Submit"/> </td>
      </tr>

   </table>
</form>
<?php
	//This section will show the contents of the Alumna table
	echo "<section>";
	
		/*tabledump contains a function (tabledump()) that iterates through a table and displays all of its contents
		opeDB contains a function (opeDB()) that grants access to the database*/

   		include("../included/tabledump.php");
  	 	include("../included/openDB.php");
		
  	 	openDB();

		//MySQL query
		$query="SELECT * from Alumna ORDER BY name;";
    		$result=mysql_query($query);
   
		
		echo "<form action=../admin/alumnaDelete.php method=$_GET>";
   		tabledumpdeltedit( $result );
   		echo "</form>";
	echo "</section>";
?>
</artical>
</section>

<!--footer-->	
<footer id="footer">
	   <div id="address">
	   <a href="https://www.google.com/maps/place/Meredith+College/@35.7983206,-78.6889146,16z/data=!3m1!4b1!4m2!3m1!1s0x89acf5c670c2dbc5:0x179f9c722569698c">
	      3800 Hillsborough Street | Raleigh, NC 27607-5298</a>
	      </br>
          Phone: (919) 760-8600 or 1-800 MEREDITH
       </div><!--address-->	   	
	</footer>
	
</div>	<!-- big_wrapper-->	
		
	</body>
</html>