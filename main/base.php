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
    <div class="band_header">
    <header>
        <h1 class="logo"></h1>
    </header>
    </div>
    
    <nav>
        <?php leftMenu(); ?>
    </nav>
    
    <section>
        <article>
            <h2>Riker Ipsum</h2>
            <p>Commander William Riker of the Starship Enterprise. I'm afraid I still don't understand, sir. The look in your eyes, I recognize it. You used to have it for me. Yesterday I did not know how to eat gagh. Some days you get the bear, and some days the bear gets you. Maybe if we felt any human loss as keenly as we feel one of those close to us, human history would be far less bloody. Why don't we just give everybody a promotion and call it a night - 'Commander'? Ensign Babyface! Worf, It's better than music. It's jazz. Maybe we better talk out here; the observation lounge has turned into a swamp. I'll be sure to note that in my log. Talk about going nowhere fast.</p>
        </article>
    </section>
    
    <footer>
        <?php footerContent(); ?>
    </footer>
</body>

</html>