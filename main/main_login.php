<?php
session_start();
include("../included/template.php");
include("../included/leftMenu.php");
// main_login.php  
// This page has a form to let you log in or register.  If you 
// try to login, it jumps
// to check_login.php to check.  If you register, it sends you
// to register.php to send an email to the user to complete the
// registration.  
//Note: the php to send you to a new page has to 
// happen before 
// any HTML is sent.
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
    
    <?php
       if(isset($_SESSION['username']))
        {
            echo "<aside>";
            $username=$_SESSION['username'];
            echo "<p>Hello, ".$username."</p>";
            echo "</aside>";
        }
    ?>
    
    <?php
       if(isset($_SESSION['username']))
        {
            echo "<aside>";
            $username=$_SESSION['username'];
            echo "<p>Hello, ".$username."</p>";
            echo "</aside>";
        }
    ?>

    <!-- text-->
    <section>
        <h2>Log in</h2> 

        <p>
            <?php
                displayContent($_GET['msg']);
            ?>
        </p>
      <form action="../login/check_login.php" method="POST">
           <table>
              <tr>
                 <td align="right">Email</td>
                 <td> <input type="text" name="email4log" /> @email.meredith.edu</td>
              </tr>
              <tr>
                 <td align="right">Password</td>
                 <td> <input type="password" name="password4log" /> </td>
              </tr>
              <tr>
                 <td align="right">Submit</td>
                 <td> <input type="submit"  name="Submit" value="Login"/> </td>
              </tr>
           </table>
          <a href="forgot_pw.php">Forgot Password</a>
        </form>
    </section>
    
        <footer>
            <?php footerContent(); ?>
        </footer>
    </div>
</body>

</html>