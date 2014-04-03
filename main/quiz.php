<?php
session_start();
include("../included/openDB.php");
include("../included/tabledump.php");
include("../included/leftMenu.php");
openDB();
?>
<!--main page-->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
      <script src="../included/error.js"></script>
    <link rel= "stylesheet"type="text/css"  href="../style.css"  />
    <title>major Match Maker</title>
</head>

<!--logo-->
<body> 	

<!-- logo part-->	 
	<header id="logo">  
     </header>
<!--Left Menu-->
<aside>
	<nav>
	 <ul>
		<?php leftMenu(); ?>
	 </ul>	
</nav>

<!-- text-->
    <h1 name="mainHeader">Major Match Maker</h1>
    
<section id="main_content">
 
    <p name="mainIntro">Look through the list of interests below and drag the things that interest you into the box below. Once you have dragged a few interests into the box below, the majors on the left will change size based off your interests. The larger the major, the more compatiable it is for you.</p>
    
   <article id="contentBox">
        
    <form id="column1">
    
    <h2 id="h2_header">Intrests</h2>
    <!-- query to list all the interets on one side of the page -->
    <?php
        $query="SELECT DISTINCT interestID, majorID, interest, major From MajorInterest, Interest, Major WHERE MajorInterest.interestID=Interest.id AND MajorInterest.majorID=Major.id Order By Interest.interest;";
        $result=mysql_query($query); 
        if(noerror($result))
	    {
            $nr = mysql_num_rows($result);
            $lastInterest="";
            for($i=0; $i<$nr; $i++)
            {
		      $row = mysql_fetch_array($result); 
                $interest=$row['interest'];
                $interestID=$row['interestID'];
                if($interest!=$lastInterest)
                {
                    echo "<input type=\"button\" value=\"$interest\" onclick=\"dealWith$interestID();\" />&nbsp; \n";
                    $lastInterest=$interest;
                }
            }
        }
    ?>
        
    </form>
   </article> 
   
<article id="column2">            
    <h2 id="h2_header">Majors</h2>
    <!-- qurey to list all the majors on the other side of the page -->
    <?php
        $query="SELECT * From Major";
        $result2=mysql_query($query);

        if(noerror($result))
        {
            $nr=mysql_num_rows($result2);
            for($i=0; $i<$nr; $i++)
            {
                $row=mysql_fetch_array($result2);
                $major=$row['major'];
                $majorID=$row['id'];
                echo "<a href=\"majorRequest.php?major=$majorID\"><font id=MAJ$majorID size=\"2\">$major</font></a> &nbsp;\n";
            }
        }

    ?>
           
           <?php
          
            echo "<script>\n";
            if(noerror($result))
	        {
                mysql_data_seek($result,0);
                $nr = mysql_num_rows($result); 
                $oldInterestID="";
                for($i=0; $i<$nr; $i++)
                {
                  $row = mysql_fetch_array($result); 
                    $interest=$row['interest'];
                    $interestID=$row['interestID'];
                    $majorID=$row['majorID'];
                    if ($interestID!=$oldInterestID)
                    {
                        if($oldInterestID!="")
                        {
                            echo "}}\n";
                        }
                        echo "var done$interestID=false;\n";
                        echo "function dealWith$interestID()\n";
                        echo "{\n";
                        echo "if(!done$interestID)";
                        echo "{";
                        echo "done$interestID=true;";
                            
                     
                        $oldInterestID=$interestID;
                    }
                    
                
                        echo "  augment(\"$majorID\");\n";
                    
                    
                }

            echo "}}\n";
        
            echo "function augment(x)\n";
            echo "{\n";
            echo "var majorName=\"MAJ\"+x;\n";
            echo "var major =document.getElementById(majorName);\n";
            echo "major.size++;\n";
            echo "}\n";
            echo "</script>";
            }
?>

</article>
</section>
 
	
<!--footer-->	
<footer id="footer">
	   <article id="address">
	   <a href="https://www.google.com/maps/place/Meredith+College/@35.7983206,-78.6889146,16z/data=!3m1!4b1!4m2!3m1!1s0x89acf5c670c2dbc5:0x179f9c722569698c">
	      3800 Hillsborough Street | Raleigh, NC 27607-5298</a>
	      </br>
          Phone: (919) 760-8600 or 1-800 MEREDITH
       </article><!--address-->	   	
	</footer>
	
</aside>
	
	</body>

</html>
