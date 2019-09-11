<?php 

 /**
 * Landing Page 
 * last_update: 2019-08-03
 * Author: Narayana Madabhushi, mlnarayana95@gmail.com
 */
    require '../app/config.php';
    $heading = "Watch TV Shows and Movies anytime, anywhere"; 
    $title = "Funflix Canada - Watch TV Shows and Movies";
    require '../inc/head.inc.php'; 
?>

<body>
  <div id="container">
    <?php require '../inc/header.inc.php'; ?>
    <main>
      <div id="wrapper">
        <div id="tag_line">
          <h1 id="h1_landing"><?=esc($heading)?></h1>
          <h2 id="h2_landing">with plans starting at $8.99/month.</h2>
        </div>
        <p id="join_now">
          <a class="btn2" href="signup.php">GET FIRST 3 MONTHS FREE</a>
        </p>
      </div>
  </main>
  <?php require '../inc/footer.inc.php'; ?>

  </div>
</body>
</html>