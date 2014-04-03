<?php
	session_start();
	include("../included/loginStatus.php");
	areYouLogged();
	include("../included/tabledump.php");
	include("../included/openDB.php");
	openDB();
	
?>
<!-- Here's where the HTML starts -->
<!DOCTYPE html>
<html lang="en"> 	
<head>
<meta charset="utf-8" />
<link rel= "stylesheet" href="../style.css" type="text/css" />
<title>Add New Link</title>
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
	</div><!--links-->


<h1 id="majorHeader">Add a Link</h1>
<section id="next_text">
<article id="newJob">

	<h2 id="left_h2">Connect Link to Major</h2>

 <div id="newLink">

	<form  action="../admin/linkMajorConnect.php" method="POST">
	<?php
	
	$query = "SELECT * FROM Major ORDER BY major";
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
	
	$queryB = "SELECT * FROM Link ORDER BY name";
	$resultB=mysql_query($queryB);
	linktabledump($resultB);
	
	function linktabledump( $resultB )
	{
		echo "<table>";
		echo "<tr>";
		echo "<td align=center width=100>Link</td>";

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
				$j=2;
				$row=mysql_fetch_array($resultB);
				settype($row[$j], "string");
				if($c==5)
				{
					
					echo "</tr>";
					echo "<tr>";
					echo "<td></td>";
					echo "<td width=200>";
					echo "<input type=checkbox name=checkboxL[] value="."'$row[$j]'".">".$row[$j]."</option>";
					echo "</td>";
					$c=1;
				}
				else
				{
					echo "<td width=200>";
					echo "<input type=checkbox name=checkboxL[] value="."'$row[$j]'".">".$row[$j]."</option>";
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
	<tr>
				<td colspan="2" align="center"> 
				<input type="submit" value="Submit">
				</td>
			</tr>
			</div>
</form>

<h2 id="left_h2">Add New Link</h2>
<form action="../admin/linkProcess.php" method="POST">
   <table>
      <tr>
         <td align="right">Link</td>
         <td> <input type="url" name="link" required="required"/> </td>
      </tr>
      
      <tr>
         <td align="right">Name</td>
         <td> <input type="text" name="name" required="required"/> </td>
      </tr>
      
      <tr>
         <td align="right">Description</td>
         <td> <input type="text" name="description" required="required"/> </td>
      </tr>
      
      <tr>
         <td align="right">Category</td>
         <td> <input type="text" name="category" required="required"/> </td>
      </tr>
      
      <tr>
         <td align="right">Submit</td>
         <td> <input type="submit"  name="Submit" value="Submit"/> </td>
      </tr>

   </table>
</form>
<br/>
<?php
	echo "<section>";

	$query="SELECT * from Link ORDER BY name;";
    $result=mysql_query($query);
   
	echo "<form action=../admin/linkDelete.php method=$_GET>";
   tabledumpdeltedit( $result );
	echo "</form>";
   
	echo "</section>";
?>

</article>
<div>

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
</section>		
</body>
</html>
