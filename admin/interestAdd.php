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
<h1>Classroom to Career Pathways</h1>
<?php
	include("../included/menu.php");
	openAddMenu();
?>
<br/>
<h2>Connect Interest to Major</h2>
	<form action="interestMajorConnect.php" method="POST">
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
			$c=0;
					
			//echo "<td><select name=major id=major required=required>";
			
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
	
	$queryB = "SELECT * FROM Interest";
	$resultB=mysql_query($queryB);
	interesttabledump($resultB);
	
	function interesttabledump( $resultB )
	{
		echo "<table>";
		echo "<tr>";
		echo "<td align=center width=100>Interest</td>";

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
					echo "<input type=checkbox name=checkboxI[] value="."'$row[$j]'".">".$row[$j]."</option>";
					echo "</td>";
					$c=1;
				}
				else
				{
					echo "<td width=200>";
					echo "<input type=checkbox name=checkboxI[] value="."'$row[$j]'".">".$row[$j]."</option>";
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
				<td colspan="2" align="center"> 
				<input type="submit" value="Submit">
				</td>
			</tr>
		</table>
	</form>
<br/>
<h2>Add New Interest</h2>
<form action="interestProcess.php" method="POST">
   <table>
      <tr>
         <td align="right">Interest</td>
         <td> <input type="text" name="interest" /> </td>
      </tr>
      <tr>
         <td align="right">Submit</td>
         <td> <input type="submit"  name="Submit" value="Submit"/> </td>
      </tr>

   </table>
</form>

<?php
	echo "<section>";



	$query="select * from Interest;";
    $result=mysql_query($query);
   
	echo "<form action=interestDelete.php method=$_GET>";
   tabledumpdelt( $result );
	echo "</form>";
   
	echo "</section>";
?>

</body>
</html>
