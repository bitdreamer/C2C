<?php
	session_start(); 
	include("../included/leftMenu.php"); 
	include("../included/template.php");
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
    
    <section id="main_content">
	
		<article>	 
			<p name="mainIntro">
				<?php
					displayContent($_GET['msg']);
				?>
			</p>	
		</article>
	  
	</section>
    
        <footer>
            <?php footerContent(); ?>
        </footer>
    </div>
</body>

</html>