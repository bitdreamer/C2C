<?php
session_start();
include("included/openDB.php");
include("included/tabledump.php");
include("included/leftMenu.php");
openDB();
?>

<html>
<head>
    <link rel= "stylesheet"type="text/css"  href="style.css"  />
    <title>Career Pathways</title>
</head>
<body>
    <div id="darkgray"></div>
	<div id="logo"></div>
	<div id="lightgray"></div>
    
    <!--left Menu-->
    <div id="links">
	   <?php leftMenu(); ?>
    </div>
    
    <!--main content-->
    <div id="text">
        <!-- <div id="content" style="background-       color:#EEEEEE;height:200px;width:400px;float:right;">-->
        
    <h1>Major Match Maker</h1>
    <br>
    <br>
    <p>Look through the list of interests below and drag the things that interest you into the box below. Once you have dragged a few interests into the box below, the majors on the left will change size based off your interests. The larger the major, the more compatiable it is for you.</p>
    
   <div id="contentBox" style="margin: 0px auto; width:70%">
        <div id="column1" style="float:left; margin:0; width:50%;">
    <form>
    <h3><i><b>Interests</h3></i></b>
    <!-- query to list all the interets on one side of the page -->
    <?php
        $query="SELECT interestID, majorID, interest, major From MajorInterest, Interest, Major WHERE MajorInterest.interestID=Interest.id";
        $result=mysql_query($query); 


        if(noerror($result))
	    {
            $nr = mysql_num_rows($result); 
            for($i=0; $i<$nr; $i++)
            {
		      $row = mysql_fetch_array($result); 
                $interest=$row['interest'];
                echo "<li><input type='button' value='$interest' onclick='dealWith$interest();' /></li> \n"; 
            }
        }
    ?>
        
    </form>
    </div>
       <div id="column2" style="float:left; margin:0; width:50%;">
            
    <h3><i><b>Majors</b></i></h3>
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
                echo "<td><li id=$majorID>$major</li></td> \n";
            }
        }

    ?>
           
           <?php
            
            echo "<script>";
            if(noerror($result))
	        {
                mysql_data_seek($result);
                $nr = mysql_num_rows($result); 
                $oldInterest=null;
                for($i=0; $i<$nr; $i++)
                {
                  $row = mysql_fetch_array($result); 
                    $interest=$row['interest'];
                    if ($interestID!=$oldInterestID)
                    {
                        echo "function dealWith$interestID()";
                        echo "{";
                        echo "augment($majorID)";
                        echo "}";
                        $oldInterestID=$interestID;
                    }
                    
                    else
                    {
                        echo "augment($majorID);";
                    }
                }

            echo "function agument(int x)";
            echo "{";
            echo "var major document.getElementById($majorID);";
            echo "major.textcolor=purple;";
            echo "}";
            echo "</script>";
            }
            ?>
           
           </div>
       </div>
        </div>
         
 <!-- adds the address line at the bottom of the page -->
        <div id="footer"></br>
	       <address >
	       <a href="https://www.google.com/maps/place/Meredith+College/@35.7983206,
	   			   -78.6889146,16z/data=!3m1!4b1!4m2!3m1!1s0x89acf5c670c2dbc5:0x179f9c722569698c/">
	    				3800 Hillsborough Street | Raleigh, NC 27607-5298</br>
       					Phone: (919) 760-8600 or 1-800 MEREDITH
       	</address>	
      	
	</div>	
		
</body>
</html>



