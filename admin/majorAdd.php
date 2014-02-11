<?php
	session_start();
	include("..//included/tabledump.php");
   include("..//included/openDB.php");
   openDB();
?>
<html>
<head>
<title>Classroom to Career Pathways</title>
</head>
<body>
<h1>Classroom to Career Pathways</h1>
<?php
	include("../included/menu.php");
	openAddMenu();
?>

<br/>
<article id="newJob">
<h2>Add Major (For development purposes ONLY)</h2>
<form action="processMajor.php" method="POST">
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
         <td align="right">ID</td>
         <td><input type="text" name="id" value="" required="required" size="3" style="height:20px"></td>
      </tr>
	  <tr>
         <td align="right">Description</td>
         <td><input type="text" name="description" value="" required="required" size="75" style="height:75px"></td>
      </tr>
	<tr>
         <td align="right">Department</td>
         <td><input type="text" name="department" value="" required="required" size="20" style="height:20px"></td>
      </tr>
	<tr>
		<td align="center" colspan="2"><h3>Add Jobs</h3></td>
	</tr>

<?php
	$queryB = "SELECT * FROM Job";
	$resultB=mysql_query($queryB);
	jobtabledump1($resultB);
	
	function jobtabledump1( $resultB )
	{
		echo "<table>";
		echo "<tr>";
		echo "<td align=center width=150>Min Degree: BA</td>";

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
					
			for($i=0; $i<$nr; $i++ )
			{	   
				$j=1;
				$row=mysql_fetch_array($resultB);
				settype($row[$j], "string");
				if($i==5 || $i==10 || $i==15)
				{
					
					echo "</tr>";
					echo "<tr>";
					echo "<td></td>";
					echo "<td width=200>";
					echo "<input type=checkbox name=checkboxJ[] value="."'$row[$j]'".">".$row[$j]."</option>";
					echo "</td>";
					
				}
				else
				{
					echo "<td width=200>";
					echo "<input type=checkbox name=checkboxJ[] value="."'$row[$j]'".">".$row[$j]."</option>";
					echo "</td>";
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
		echo "<tr>";
		echo "<td align=center width=150>Min Degree: BS</td>";

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
					
			for($i=0; $i<$nr; $i++ )
			{	   
				$j=1;
				$row=mysql_fetch_array($resultB);
				settype($row[$j], "string");
				if($i==5 || $i==10 || $i==15)
				{
					
					echo "</tr>";
					echo "<tr>";
					echo "<td></td>";
					echo "<td width=200>";
					echo "<input type=checkbox name=checkboxJ[] value="."'$row[$j]'".">".$row[$j]."</option>";
					echo "</td>";
					
				}
				else
				{
					echo "<td width=200>";
					echo "<input type=checkbox name=checkboxJ[] value="."'$row[$j]'".">".$row[$j]."</option>";
					echo "</td>";
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
	jobtabledump3($resultB);
	
	function jobtabledump3( $resultB )
	{
		echo "<table>";
		echo "<tr>";
		echo "<td align=center width=150>Min Degree: BSW</td>";

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
					
			for($i=0; $i<$nr; $i++ )
			{	   
				$j=1;
				$row=mysql_fetch_array($resultB);
				settype($row[$j], "string");
				if($i==5 || $i==10 || $i==15)
				{
					
					echo "</tr>";
					echo "<tr>";
					echo "<td></td>";
					echo "<td width=200>";
					echo "<input type=checkbox name=checkboxJ[] value="."'$row[$j]'".">".$row[$j]."</option>";
					echo "</td>";
					
				}
				else
				{
					echo "<td width=200>";
					echo "<input type=checkbox name=checkboxJ[] value="."'$row[$j]'".">".$row[$j]."</option>";
					echo "</td>";
				}
			}
		}

		echo "</tr>";
		return $row;
	}
?>


      <tr>
         <td colspan="2" align="center"> 
         <input type="submit" value="Submit">
         </td>
      </tr>
   </table>

</form>

<h3>Majors already created</h3>
<?php
	echo "<section>";


	$query="select * from Major;";
    $result=mysql_query($query);
   
   tabledump( $result );
   
	echo "</section>";
?>

</article>
</body>
</html>