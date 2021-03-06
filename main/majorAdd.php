<?php
	session_start();	  
    include("..//included/loginStatus.php");
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
    
    <h1 name="mainHeader">Add Major </h1>
   
<section>
 <article>	
   <p id="majorIntro">* For development purposes (ONLY)</p>

<form id="majorForm" action="../admin/majorProcess.php" method="POST">
<table id="majorTable">
 <tr>
      <td align="left">Major</td>

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
         <td><textarea name="description" value="" required="required" rows="3" cols="50"></textarea></td>
      </tr>
	<tr>
         <td >Department</td>
         <td><input type="text" name="department" value="" required="required" size="20"></td>
      </tr>
	</table>
		<div  colspan="2" ><h2 id="left_h2">Jobs in Major</h2></div>
	

<?php
	$queryB = "SELECT * FROM Job ORDER BY career";
	$resultB=mysql_query($queryB);
	jobtabledump1($resultB);
	
	function jobtabledump1( $resultB )
	{
		echo "<table>";
		echo"<p id='majorIntro'> To link associated jobs with major being created.</p>";
		echo"<h3 id='majorHeaders'> Min Degree: BS </h3>";
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
					echo "<input  type=checkbox name=checkboxJ1[] value="."'$row[$j]'".">".$row[$j]."</option>";
					echo "</td>";
					$c=1;
					
				}
				else
				{
					echo "<td width=200>";
					echo "<input type=checkbox name=checkboxJ1[] value="."'$row[$j]'".">".$row[$j]."</option>";
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
	$queryB = "SELECT * FROM Job ORDER BY career";
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
					echo "<input type=checkbox name=checkboxJ2[] value="."'$row[$j]'".">".$row[$j]."</option>";
					$c=1;
				}
				else
				{
					echo "<td width=200>";
					echo "<input type=checkbox name=checkboxJ2[] value="."'$row[$j]'".">".$row[$j]."</option>";
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
	$queryB = "SELECT * FROM Job ORDER BY career";
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
					echo "<input type=checkbox name=checkboxJ3[] value="."'$row[$j]'".">".$row[$j]."</option>";
					echo "</td>";
					$c=1;
					
				}
				else
				{
					echo "<td width=200>";
					echo "<input type=checkbox name=checkboxJ3[] value="."'$row[$j]'".">".$row[$j]."</option>";
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
         <input type="submit" name="SubmitP" id="SubmitP" value="Submit">
         </td>
      </tr>
   </table>

</form>


<p id="previewData" name="previewData"> </p>
<h2 id="left_h2">Majors already created</h2>
<?php
	echo "<section>";


	$query="select id, major, department from Major ORDER BY major;";
    $result=mysql_query($query);
   
	echo "<form action=../admin/majorProcess.php method=$_GET>";
   tabledumpdeltedit( $result );
	echo "</form>";
   
	echo "</section>";
?>

 </article>
 </section>
    
        <footer>
            <?php footerContent(); ?>
        </footer>
    </div>
</body>

</html>