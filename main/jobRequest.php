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
    <section id="new_text">
            <?php

                $jobID=addslashes($_GET['career']); 

                $query="SELECT * FROM Job WHERE id='$jobID';"; 
                $result=mysql_query($query); 

                if(noerror($result))
                {
                    $row = mysql_fetch_array($result); 
                    $job = $row['career']; 
                    $des = $row['description']; 

                    echo "<h1 id='h2_header'>$job</h1> \n"; 
                    echo "<p>$des</p> \n"; 
                }

                $q2="SELECT * FROM MajorJob, Major WHERE majorID=id AND jobID='$jobID';";
                $r2=mysql_query($q2); 

                if(noerror($r2))
                {
                    echo "<h3>Want to be a $job?...Major in:</h3> \n"; 

                    $nr = mysql_num_rows($r2);
                    for($i=0; $i<$nr; $i++)
                    {
                        $row     = mysql_fetch_array($r2); 
                        $major   = $row['major'];
                        $majorID = $row['id']; 

                        echo "<a href='majorRequest.php?major=$majorID'>$major</a>\n"; 
                    }
                }

            ?>
    </section>
    
        <footer>
            <?php footerContent(); ?>
        </footer>
    </div>
</body>

</html>