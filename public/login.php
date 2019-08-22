<?php 

/**
 * Login Page 
 * last_update: 2019-08-03
 * Author: Narayana Madabhushi, mlnarayana95@gmail.com
 */

    $heading = "Funflix - Login"; 
    $title = "Funflix Canada - Login";
    require '../inc/head.inc.php'; 
?>

<body>
  <div id="container">
   <?php require '../inc/header.inc.php'; ?>
 
    <main><!-- Main Content starts here -->
      <div id="login_form">
        <h1><?=$heading?></h1>
        <div id="content">
          <form id="login" action="home.php" method="post">
            <p>
              <input class="login_fields" id="email_address" name="email_address" type="email" placeholder="Email" required />
            </p>
            <p>
              <input class="login_fields" id="pass" name="pass" type="password" placeholder="Password" required /> 
            </p>   
            <p> 
              <input type="submit" id="login_submit" class="btn1" name="login_submit" value="Submit"/>  
            </p>
            <p>
              <input type="checkbox" name="remember_me" id="remember_me" />
              <label id="lbl_remember" for="remember_me">Remember me</label> 
            </p> 
            <p style="display:inline-block;float:left;color:#f3f3f3">
              Not a user yet? <a style="color:#c32625" href="signup.php">Sign Up</a>
            </p>     
          </form>
        </div> 
      </div>
    </main><!-- Main content ends here -->

   <?php require '../inc/footer.inc.php'; ?>

  </div>
</body>
</html>