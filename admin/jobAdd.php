<?php
	session_start();
	include("..//included/loginStatus.php");
	areYouLogged();
	include("..//included/tabledump.php");
	include("..//included/openDB.php");
	openDB();
	
?>
<!-- Here's where the HTML starts -->
<html>

<head>
	<link rel= "stylesheet"type="text/css"  href="..//style.css"  />
	<title> Add a Job</title>
</head>

<!--logo-->
<body> 	   
	<div id="darkgray"></div>
	<div id="logo"></div>
	<div id="lightgray"></div>

<div id="links">	
<?php
	include("..//included/leftMenu.php"); 
	leftMenu();
?>
</div>
<br/>

<h1 id="smallerH1">Add New job</h1>

<div id="text">		
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
			$c=0;
			
			for($i=0; $i<$nr; $i++ )
			{
				$j=1;
				
				$row=mysql_fetch_array($result);
				settype($row[$j], "string");
				if($c==5)
				{
					
					echo "</tr>";
					echo "<tr>";
					echo "<td></td>";
					echo "<td width=200>";
					echo "<input type=checkbox name=checkboxM[] value="."'$row[$j]'".">".$row[$j]."</option>";
					echo "</td>";
					$c=1;
					
				}
				else
				{
					echo "<td width=200>";
					echo "<input type=checkbox name=checkboxM[] value="."'$row[$j]'".">".$row[$j]."</option>";
					echo "</td>";
					$c++;
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
	<form action="jobProcess.php" method="POST">
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
	   
		echo "<form action=jobDelete.php method=$_GET>";
		tabledumpdelt( $result );
	   	echo "</form>";
		echo "</section>";
	?>
	</div>
</body>

<div id="footer"></br>
	   <address >
	    		<a href="https://www.google.com/maps/place/Meredith+College/@35.7983206,
	   			   -78.6889146,16z/data=!3m1!4b1!4m2!3m1!1s0x89acf5c670c2dbc5:0x179f9c722569698c/">
	    				3800 Hillsborough Street | Raleigh, NC 27607-5298</br>
       					Phone: (919) 760-8600 or 1-800 MEREDITH
       	</address>	
</html>