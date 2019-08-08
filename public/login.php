<?php 

/**
 * Login Page 
 * last_update: 2019-08-03
 * Author: Narayana Madabhushi, mlnarayana95@gmail.com
 */

    $heading = "Funflix - Login"; 
    $title = "Funflix Canada - Login";
    require 'include/head.inc.php'; 
?>

<body>
  <div id="container">
   <?php require 'include/header.inc.php'; ?>
 
    <main><!-- Main Content starts here -->
      <div id="login_form">
        <h1><?=$heading?></h1>
        <div id="content">
          <form id="login" action="home.php" method="post">
            <p>
              <label for="email_address">Email Address</label>
              <input id="email_address" name="email_address" type="email" placeholder="Email" required />
            </p>
            <p>
              <label for="pass">Password</label>
              <input id="pass" name="pass" type="password" placeholder="Password" required /> 
            </p>   
            <p> 
              <input type="submit" id="login_submit" name="login_submit" value="Submit"/>  
            </p>
            <p>
              <input type="checkbox" name="remember_me" id="remember_me" />
              <label id="lbl_remember">Remember me</label> 
            </p> 
            <p style=" margin-top:30px;color:#f3f3f3">
              Not a user yet? Sign Up
            </p>     
          </form>
        </div> 
      </div>
    </main><!-- Main content ends here -->

   <?php require 'include/footer.inc.php'; ?>

  </div>
</body>
</html>