<?php 
 
 /**
 * Header Include Page 
 * last_update: 2019-08-03
 * Author: Narayana Madabhushi, mlnarayana95@gmail.com
 */
?>

<header>
    <span id="logo">
      <a href="index.php"><img id="landing_logo" src="images/logo.png" alt="logo" /></a>
    </span>
    <div id="header_button">
    <?php if($title == 'Funflix Canada - Login')  : ?>
         <a href="signup.php" class="btn1"><strong>Sign Up</strong></a>
    <?php else : ?>
      <a href="signup.php" class="btn1"><strong>Sign Up</strong></a>
      <a href="login.php" class="btn1"><strong>Sign In</strong></a>
  	<?php endif; ?>
  	  ?>
    </div>
</header>