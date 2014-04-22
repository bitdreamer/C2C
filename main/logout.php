<?php
/*logout.php
This page logs the user out.  
*/
    session_start();
    session_unset();
    session_destroy();
    session_write_close();
    setcookie(session_name(),'',0,'/');
    session_regenerate_id(true);
    include("../included/template.php");
    include("../included/leftMenu.php");
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
	<h1>Log Out</h1>
       <p> You have logged out of the Career Pathways - Admin website. Thank you for your contribution.</p>
 </section>
    
        <footer>
            <?php footerContent(); ?>
        </footer>
    </div>
</body>

</html>