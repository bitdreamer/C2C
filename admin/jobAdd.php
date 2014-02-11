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
	<h2>Connect Job to Major</h2>
	<form action="jobMajorConnect.php" method="POST">
	<?php
	
	$query = "SELECT * FROM Major";
	$result=mysql_query($query);
	majortabledump($result);
	
	function majortabledump( $result )
	{
		echo "<table>";
		echo "<tr>";
		echo "<td align=center width=100>Major</td>";

		if($result==0)
		{
			echo "<b>Error ".mysql_errno().": ".mysql_error()."</b>";
		}
		elseif (@mysql_num_rows($result)==0)
		{
			echo "<b>There doesn't seem to be anything here... yet.</b><br>";
		}
		else
		{
			$nr = mysql_num_rows($result);
					
			//echo "<td><select name=major id=major required=required>";
			
			for($i=0; $i<$nr; $i++ )
			{
				$j=1;
				$row=mysql_fetch_array($result);
				settype($row[$j], "string");
				if($i==5 || $i==10 || $i==15)
				{
					
					echo "</tr>";
					echo "<tr>";
					echo "<td></td>";
					echo "<td width=200>";
					echo "<input type=checkbox name=checkboxM[] value="."'$row[$j]'".">".$row[$j]."</option>";
					echo "</td>";
					
				}
				else
				{
					echo "<td width=200>";
					echo "<input type=checkbox name=checkboxM[] value="."'$row[$j]'".">".$row[$j]."</option>";
					echo "</td>";
				}

			}
		}

		echo "</tr>";
		echo "</table>";
		return $row;

	}
	
	$queryB = "SELECT * FROM Job";
	$resultB=mysql_query($queryB);
	jobtabledump($resultB);
	
	function jobtabledump( $resultB )
	{
		echo "<table>";
		echo "<tr>";
		echo "<td align=center width=100>Job</td>";

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
		echo "</table>";
		return $row;
	}
	?>
		<table>
			<tr>
				<td align="right">Minimum Required Degree</td>
				<td><select name="MinDegree" id="MinDegree" required="required">
					<option value="BA">BA</option>
					<option value="BS">BS</option>
					<option value="BSW">BSW</option>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center"> 
				<input type="submit" value="Submit">
				</td>
			</tr>
		</table>
	</form>
	<br/>
	<br/>
	<h2>Add New Job</h2>
	<form action="processJob.php" method="POST">
	   <table>
			<tr>
				<td align="right">Job</td>
				<td><input type="text" name="job" value="" required="required" size="20" style="height:20px"></td>
			</tr>
			<tr>
				<td align="right">Description</td>
				<td><input type="text" name="description" value="" required="required" size="75" style="height:75px"></td>
			</tr>
			<tr>
				<td colspan="2" align="center"> 
				<input type="submit" value="Submit">
				</td>
			</tr>
		</table>
	</form>
	<?php
		echo "<section>";

		$query="select * from Job;";
		$result=mysql_query($query);
	   
		tabledump( $result );
	   
		echo "</section>";
	?>
</body>
</html>