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
    
    <section>
        <article>
            <h2>Classroom to Career Pathways</h2>
            <p>Many people have trouble choosing a career path and are confused on finding their calling. Whether you are in high school, graduating, or an adult, it is never too late to follow your dreams.</p>
        </article>
        
        <article>
            <h2> Choose a major or job to learn more about it. </h2>
            
                        <!-- Drop down choices for Majors and Jobs-->
                    <?php

                        //echo "</br>";
                        $query="SELECT * FROM Alumna;";
                        $result=mysql_query($query);
                        //tabledump( $result );
                        //echo "<div id="."section".">";

                    ?>

                <!-- major form-->
                <form action="majorRequest.php" method="GET">
                    <fieldset id="majorInfo">
                        <legend>What is your Major/Intended Major?</legend>

                        <?php
                            $query = "SELECT id, major FROM Major ORDER BY major"; 
                            $result = mysql_query($query); 

                            if(noerror($result))
                            {
                                echo "<select name='major'> \n";
                                $nr = mysql_num_rows($result); 

                              for($i=0; $i<$nr; $i++)
                                {
                                    $row = mysql_fetch_array($result);
                                    $majorID = $row['id']; 
                                    $major = $row['major']; 
                                    echo "<option value='$majorID'>$major</option> \n"; 
                                }					
                                echo "</select> \n";
                            }
                        ?>
                            </br>
                            <input type="submit" value="Go"/>

                   </fieldset>
                </form></br></br>

            <!-- Job Form-->
                <form action="jobRequest.php" method="GET">
                    <fieldset id="jobInfo">
                        <legend id="legends">Which of the following jobs are you most interested in?</legend>

                        <?php
                            $query = "SELECT id, career FROM Job ORDER BY career"; 
                            $result = mysql_query($query); 

                        if(noerror($result))
                          {
                                echo "<select name='career'> \n";
                                $nr = mysql_num_rows($result); 

                            for($i=0; $i<$nr; $i++)
                              {
                                 $row = mysql_fetch_array($result);
                                 $jobID = $row['id']; 
                                 $job = $row['career']; 
                                 echo "<option value='$jobID'>$job</option> \n"; 
                                }
                                echo "</select> \n";
                            }
                        ?>
                            </br>
                            <input type="submit" value="Go"/>

                    </fieldset>
                </form>		
        </article>
    </section>
    
        <footer>
            <?php footerContent(); ?>
        </footer>
    </div>
</body>

</html>