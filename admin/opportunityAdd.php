<?php
	session_start();
	if(!isset($_SESSION['email'])){
	header("location:..//login/main_login.php");
	}
	include("..//included/tabledump.php");
	include("..//included/openDB.php");
	openDB();
	
?>
<html>
<head> 
<title>Classroom to Career Pathways</title>
</head>
<body>
<h1>Add Opportunity</h1>
	<?php
		include("../included/menu.php");
		openAddMenu();
	?>
	<br/>
<h2>Connect Opportunity to Major</h2>
	<form action="opportunityMajorConnect.php" method="POST">
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
				if($i==5 || $i==10 || $i==15 || $i==20 || $i==25 || $i==30 || $i==35 || $i==40 || $i==45 || $i==50)
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
	
	$queryB = "SELECT * FROM Opportunity";
	$resultB=mysql_query($queryB);
	opptabledump($resultB);
	
	function opptabledump( $resultB )
	{
		echo "<table>";
		echo "<tr>";
		echo "<td align=center width=100>Opportunity</td>";

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
				if($i==5 || $i==10 || $i==15 || $i==20 || $i==25 || $i==30 || $i==35 || $i==40 || $i==45 || $i==50)
				{
					
					echo "</tr>";
					echo "<tr>";
					echo "<td></td>";
					echo "<td width=200>";
					echo "<input type=checkbox name=checkboxO[] value="."'$row[$j]'".">".$row[$j]."</option>";
					echo "</td>";
					
				}
				else
				{
					echo "<td width=200>";
					echo "<input type=checkbox name=checkboxO[] value="."'$row[$j]'".">".$row[$j]."</option>";
					echo "</td>";
				}
			}
		}

		echo "</tr>";
		echo "</table>";
		return $row;
	}
	?>
		<tr>
				<td colspan="2" align="center"> 
				<input type="submit" value="Submit">
				</td>
			</tr>
</form>

<br />
<h2>Add New Opportunity</h2>
<form action="opportunityProcess.php" method="POST">
   <table>
      <tr>
         <td align="right">Opportunity</td>
         <td> <input type="text" name="opportunity" required="required"/> </td>
      </tr>
      
      <tr>
         <td align="right">Link</td>
         <td> <input type="url" name="link" required="required"/> </td>
      </tr>
	
	<tr>
		<td align="right">Description</td>
		<td> <input type="text" name="description" /></td>
	</tr>
      
      <tr>
         <td align="right">Submit</td>
         <td> <input type="submit"  name="Submit" value="Submit"/> </td>
      </tr>

   </table>
</form>

<?php
	echo "<section>";

	$query="select * from Opportunity;";
    $result=mysql_query($query);
   
   tabledump( $result );
   
	echo "</section>";
?>

</body>
</html>
