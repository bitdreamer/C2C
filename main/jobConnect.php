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

<section>
 <article>	
	<h2>Connect Job to Major</h2>
	<form action="../admin/jobProcess.php" method="POST">
	<?php
	
	$query = "SELECT * FROM Major ORDER BY Major";
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
	
	$queryB = "SELECT * FROM Job ORDER BY career";
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
				<input type="submit" name="Connect" id="Connect" value="Submit">
				</td>
			</tr>
		</table>
	</form>

 </article>
</section>

    
        <footer>
            <?php footerContent(); ?>
        </footer>
    </div>
</body>

</html>