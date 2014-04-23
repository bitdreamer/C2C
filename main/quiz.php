<?php
	session_start();
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
    
    <!-- text-->
    <section>
        
            <h1>Major Match Maker</h1>
            <p>Look through the list of interests below and drag the things that interest you into the box below. Once you have dragged a few interests into the box below, the majors on the left will change size based off your interests. The larger the major, the more compatiable it is for you.</p>

           <div id="contentBox" style="margin: 0px auto; width:85%">
                <div id="column1" style="float:left; margin:0; width:40%;">
            <form>
            <h3><i><b>Interests</h3></i></b>
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
                            echo "<input type=\"button\" id=\"$interestID\" value=\"$interest\" style=\"background-color:#D0D0D0\" onclick=\"dealWith$interestID(); setColor($interestID);\" />&nbsp; \n";
                            $lastInterest=$interest;
                        }
                    }
                }
            ?>

            </form>
            </div>
               <div id="column2" style="float:left; margin:0; width:40%;">

            <h3><i><b>Majors</b></i></h3>
            <!-- query to list all the majors on the other side of the page -->
            <?php
                $query="SELECT * From Major";
                $result2=mysql_query($query);

                if(noerror($result2))
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
            <pre><p id="majorTable">Your Results: <br></p></pre>

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


                            echo "augment(\"$majorID\");\n";

                        }

                    echo "}}\n";

                    echo "function augment(x)\n";
                    echo "{\n";
                    echo "var majorName=\"MAJ\"+x;\n";

                    echo "var major =document.getElementById(majorName);\n";
                    echo "major.size++;\n";
                    echo "makeTable();\n";

                    echo "}\n";

                    echo "function setColor(btn){\n";
                    echo "var property=document.getElementById(btn);\n";

                    echo "      property.style.backgroundColor=\"#D000D0\";\n";

                    echo "}\n";
                    echo "var majorList = new Array();\n";
                    echo "var majorIDList = new Array();\n";
                    if(noerror($result2))
                    {
                        mysql_data_seek($result2,0);
                        $nr=mysql_num_rows($result2);
                        for($i=0; $i<$nr; $i++)
                        {
                            $row=mysql_fetch_array($result2);
                            $major=$row['major'];
                            $majorID=$row['id'];
                            echo "majorList[$i]=\"$major\";\n";
                            echo "majorIDList[$i]=\"$majorID\";\n";
                        }
                    }


                    echo "</script>";
                    }
                    ?>
           
        </div>
       </div>
    </section>
    
        <footer>
            <?php footerContent(); ?>
        </footer>
    </div>
</body>
<script>
    function makeTable()
    {
        var whale="";
        for (var i=0; i<majorList.length; i++)
        {
            
            var z =document.getElementById("MAJ"+majorIDList[i]);
            var z2=z.size;
            z2=z2-2;
            whale+=""+z2+" "+majorList[i]+"\n";
            
        }
        
        var mt=document.getElementById("majorTable");
        mt.firstChild.nodeValue=whale;
    }
            
</script>

</html>