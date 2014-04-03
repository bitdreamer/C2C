<?php
	session_start();
	include("../included/loginStatus.php");
	areYouLogged();
	include("..//included/tabledump.php");
	include("..//included/openDB.php");
	openDB();
	
?>
<!-- Here's where the HTML starts -->
<!DOCTYPE html>
<html lang="en"> 	
<head>
	<meta charset="utf-8" />
	<link rel= "stylesheet" href="../style.css" type="text/css" />
	<title>Add New Interest </title>
</head>

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

<h1 id="majorHeader">Add New Interest</h1>
<section id="text_content">

<div id="newMajor">
 <article >	
<h2 id="left_h2">Connect Interest to Major</h2>
	<form action="../admin/interestProcess.php" method="POST">
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
	
	$queryB = "SELECT * FROM Interest ORDER BY interest";
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
				<input type="submit" name="Connect" id="Connect" value="Submit">
				</td>
			</tr>
		</table>
	</form>
<br/>
<h2 id="left_h2">Add New Interest</h2>
<form action="../admin/interestProcess.php" method="POST">
   <table>
      <tr>
         <td align="right">Interest</td>
         <td> <input type="text" name="interest" /> </td>
      </tr>
      <tr>
         <td align="right">Submit</td>
         <td> <input type="submit" name="SubmitP" id="SubmitP" value="Submit"/> </td>
      </tr>
   </table>
</form>
<br/>
<br/>
<?php
	echo "<section>";

	$query="select * from Interest ORDER BY interest;";
    $result=mysql_query($query);
   
	echo "<form action=../admin/interestProcess.php method=$_GET>";
   tabledumpdeltedit( $result );
	echo "</form>";
   
	echo "</section>";
?>
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
</html>
