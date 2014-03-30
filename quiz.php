<?php
session_start();
include("included/openDB.php");
include("included/tabledump.php");
include("included/mainMenu.php");
openDB();
?>

<!-- main Page -->
<!doctype html>

<html lang="en"> 	
<head>
    <meta charest="utf-8" />
    <title> Carrer Pathways</title>
	<link rel= "stylesheet" type="text/css"  href="style.css"  />
</head>

<!--logo-->
<body> 
	<div id="big_wrapper">
	
<!~~ logo part~~>	 
	<header id="top_header">  
		<section id="logo"></section>
     </header>
     
<!--Left Menu-->
<div id="links">
	<nav id="left_menu">
	 <ul>
		<?php mainMenu(); ?>
	 </ul>	
	</nav>

<!~~ text~~>
<section id="main_content">
        
    <h1 name="mainHeader">Major Match Maker</h1>
    
    <p name="mainIntro">Look through the list of interests below and drag the things that interest you into the box below. Once you have dragged a few interests into the box below, the majors on the left will change size based off your interests. The larger the major, the more compatiable it is for you.</p>
    
   <div id="contentBox" >
        <artical id="column1">
              
    <form>
    <h2 id="left_h2">Interests</h2>
    
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
    </artical>
    
       <artical id="column2">
            
     <h2 id="left_h2">Majors</h2>
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
                echo "<div  style='font: normal 14px helvetica neue'
 id=MAJ$majorID size=\"4\">$major</font> &nbsp;\n</div>";
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
            </div>
        </artical>
    </section>
    
</div>

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
		
	</body>

</html>



