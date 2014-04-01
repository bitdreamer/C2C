<?php
	session_start();
	include("..//included/loginStatus.php");
	areYouLogged();
	include("..//included/tabledump.php");
	include("..//included/openDB.php");
	openDB();
?>

<!-- main Page -->
<!DOCTYPE html>
<html lang="en"> 	
<head>
<meta charset="utf-8" />
<link rel= "stylesheet" href="../style.css" type="text/css" />
<title>Add Major</title>

<script type="text/javascript">
	var k = 0;
	var preview = new Array();
	
	function previewData()
	{
		var major = document.majorForm.major.value;
		var id = document.majorForm.id.value;
		var description = document.majorForm.description.value;
		var department = document.majorForm.department.value;
		
		preview[k] = major + " | " + id + " | " + description + " | " + department;
		
		var previewData = document.getElementById("previewData");
		previewData.firstChild.nodeValue = preview[0];
	}
	
	
</script>

</head>

<!--logo-->
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
   <h1 id="majorHeader">Add Major </h1>

<section id="main_content">

 <article id="newJob">
   <p name="majorIntro">* For development purposes (ONLY)</p>

<form id="majorForm" action="majorProcess.php" method="POST">
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
         <td >ID</td>
         <td><input type="text" name="id" value="" required="required" size="3"></td>
      </tr>
	  <tr>

         <td>Description</td>
         <td><input type="text" name="description" value="" required="required" size="50"></td>
      </tr>
	<tr>
         <td >Department</td>
         <td><input type="text" name="department" value="" required="required" size="20"></td>
      </tr>
	</table>
		<div  colspan="2" ><p>Jobs in Major</p></div>
	

<?php
	$queryB = "SELECT * FROM Job";
	$resultB=mysql_query($queryB);
	jobtabledump1($resultB);
	
	function jobtabledump1( $resultB )
	{
		echo "<table>";
		echo"<p> To link associated jobs with major being created.</p>";
		echo"<h3 style='background-color:gray; height:30'> Min Degree: BS </h3>";
		echo "<tr>";
		echo "<td></td>";

		if($resultB==0)
		{
			echo "<b>Error ".mysql_errno().": ".mysql_error()."</b>";
		}
		elseif (@mysql_num_rows($resultB)==0)
		{
			echo "<b>There doesn't seem to be anything here... yet.</b><br>";
		}
		else
		{
		   $nr = mysql_num_rows($resultB);
			$c=0;
					
			for($i=0; $i<$nr; $i++ )
			{	   
				$j=1;
				$row=mysql_fetch_array($resultB);
				settype($row[$j], "string");
				if($c==5)
				{
					
					echo "</tr>";
					echo "<tr>";
					echo "<td></td>";
					echo "<td>";
					echo "<input  type=checkbox name=checkboxJ[] value="."'$row[$j]'".">".$row[$j]."</option>";
					echo "</td>";
					$c=1;
					
				}
				else
				{
					echo "<td width=200>";
					echo "<input type=checkbox name=checkboxJ[] value="."'$row[$j]'".">".$row[$j]."</option>";
					echo "</td>";
					$c++;
				}
			}
		}

		echo "</tr>";
		return $row;
	}
?>
<?php
	$queryB = "SELECT * FROM Job";
	$resultB=mysql_query($queryB);
	jobtabledump2($resultB);
	
	function jobtabledump2( $resultB )
	{
		echo "<table>";
	    echo"<h3 style='background-color:gray; height:30'>Min Degree: BA</h3>";
		echo "<tr>";
		echo "<td></td>";

		if($resultB==0)
		{
			echo "<b>Error ".mysql_errno().": ".mysql_error()."</b>";
		}
		elseif (@mysql_num_rows($resultB)==0)
		{
			echo "<b>There doesn't seem to be anything here... yet.</b><br>";
		}
		else
		{
		   $nr = mysql_num_rows($resultB);
			$c=0;
					
			for($i=0; $i<$nr; $i++ )
			{	   
				$j=1;
				$row=mysql_fetch_array($resultB);
				settype($row[$j], "string");
				if($c==5)
				{
					
					echo "</tr>";
					echo "<tr>";
					echo "<td></td>";
					echo "<td width=200>";
					echo "<input type=checkbox name=checkboxJ[] value="."'$row[$j]'".">".$row[$j]."</option>";
					$c=1;
				}
				else
				{
					echo "<td width=200>";
					echo "<input type=checkbox name=checkboxJ[] value="."'$row[$j]'".">".$row[$j]."</option>";
					echo "</td>";
					$c++;
				}
			}
		}

		echo "</tr>";
		return $row;
	}
?>
</br>
<?php
	$queryB = "SELECT * FROM Job";
	$resultB=mysql_query($queryB);
	jobtabledump3($resultB);
	
	function jobtabledump3( $resultB )
	{
		echo "<table>";
		echo"<h3 style='background-color:gray; height:30'->Min Degree: BSW</h3>";
		echo "<tr>";
		echo "<td></td>";

		if($resultB==0)
		{
			echo "<b>Error ".mysql_errno().": ".mysql_error()."</b>";
		}
		elseif (@mysql_num_rows($resultB)==0)
		{
			echo "<b>There doesn't seem to be anything here... yet.</b><br>";
		}
		else
		{
		   $nr = mysql_num_rows($resultB);
			$c=0;
					
			for($i=0; $i<$nr; $i++ )
			{	   
				$j=1;
				$row=mysql_fetch_array($resultB);
				settype($row[$j], "string");
				if($c==5)
				{
					
					echo "</tr>";
					echo "<tr>";
					echo "<td></td>";
					echo "<td width=200>";
					echo "<input type=checkbox name=checkboxJ[] value="."'$row[$j]'".">".$row[$j]."</option>";
					echo "</td>";
					$c=1;
					
				}
				else
				{
					echo "<td width=200>";
					echo "<input type=checkbox name=checkboxJ[] value="."'$row[$j]'".">".$row[$j]."</option>";
					echo "</td>";
					$c++;
				}
			}
		}

		echo "</tr>";
		return $row;
	}
?>

      <tr>
         <td colspan="2"  style="margin:200 0 0 0"> 
	 <input type="button" value="Preview Entry" onclick="previewData();"/>
         <input type="submit" value="Submit">
         </td>
      </tr>
   </table>

</form>
<p id="previewData" name="previewData"> </p>
<h3>Majors already created</h3>
<?php
	echo "<section>";


	$query="select * from Major;";
    $result=mysql_query($query);
   
	echo "<form action=majorDelete.php method=$_GET>";
   tabledumpdeltedit( $result );
	echo "</form>";
   
	echo "</section>";
?>
 </artical>
</div>
</body>

<!--footer-->	
<footer id="footer">
	   <div id="address">
	   <a href="https://www.google.com/maps/place/Meredith+College/@35.7983206,-78.6889146,16z/data=!3m1!4b1!4m2!3m1!1s0x89acf5c670c2dbc5:0x179f9c722569698c">
	      3800 Hillsborough Street | Raleigh, NC 27607-5298</a>
	      </br>
          Phone: (919) 760-8600 or 1-800 MEREDITH
       </div><!--address-->	 
         	
	</footer>
</artical>
 </section>
</div>	<!-- big_wrapper-->	


</html>