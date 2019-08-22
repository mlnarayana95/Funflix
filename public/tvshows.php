<?php 

/**
 * TV Shows Page 
 * last_update: 2019-08-03
 * Author: Narayana Madabhushi, mlnarayana95@gmail.com
 */
    require '../app/config.php';
    $title = "Funflix Canada - TV Shows";
    $heading = "TV Shows";
    require '../inc/head.inc.php'; 
?>

<body>
 <div id="container">
    <?php require '../inc/navheader.inc.php'; ?>
    <div id="wrapper">  
      <h1><?=$heading?></h1>
      <div id="trending_now">
        <h2>Thriller</h2>
        <div id="trending_now_vids">
          <div class="zoom" id="box1"><img src="images/Friends.jpg" alt="thriller video"></div>  
          <div class="zoom" id="box2"><img src="images/sherlock.jpg" alt="thriller video"></div>  
          <div class="zoom" id="box3"><img src="images/houseofcards.jpg" alt="thriller video"></div> 
          <div class="zoom" id="box4"><img src="images/arrow.jpg" alt="thriller video"></div>  
          <div class="zoom" id="box5"><img src="images/blackmirror.jpg" alt="thriller video"></div>  
        </div>
      </div>
      <div id="comedies">
        <h2>Crime</h2>
        <div id="comedies_vids">
        <div class="zoom1" id="box6"><img src="images/office.jpg" alt="crime video"></div>  
        <div class="zoom1" id="box7"><img src="images/narcos.jpg" alt="crime video"></div> 
        <div class="zoom1" id="box8"><img src="images/patriotact.jpg" alt="crime video"></div>  
        <div class="zoom1" id="box9"><img src="images/Daredevil3.jpg" alt="crime video"></div>  
        <div class="zoom1" id="box10"><img src="images/got.jpg" alt="crime video"></div>  
        </div>
      </div>
    </div>
    <?php require '../inc/footer.inc.php'; ?>
 
  </div>
</body>
</html>