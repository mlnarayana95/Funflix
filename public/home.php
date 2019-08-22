<?php 

 /**
 * Home Page 
 * last_update: 2019-08-03
 * Author: Narayana Madabhushi, mlnarayana95@gmail.com
 */
    require '../app/config.php';
    $title = "Funflix Canada - Home";
    $heading = "Home";
    require '../inc/head.inc.php'; 
?>
<body>
  <div id="container">
   <?php require '../inc/header_load.inc.php'; ?>
    <main>
    <div>
      <img id="daredevil" src="images/daredevil1000px.jpg" alt="main_banner"/>
    </div>
    <div id="wrapper">
  
      <div id="main_content">  
        <div id="trending_now">
          <h2>Trending Now</h2>
          <div id="trending_now_vids">
            <div class="zoom" id="box1">
              <img class="vids" src="images/Friends.jpg" alt="trending now video" />
              Friends
            </div>  

            <div class="zoom" id="box2">
              <img class="vids" src="images/sherlock.jpg" alt="trending now video" />
              Sherlock
            </div>  
            
            <div class="zoom" id="box3">
              <img class="vids" src="images/houseofcards.jpg"
              alt="trending now video">
              House of Cards
            </div>  
            
            <div class="zoom" id="box4">
              <img class="vids" src="images/arrow.jpg"
              alt="trending now video">
              Arrow
            </div>  
            
            <div class="zoom" id="box5">
              <img class="vids"  src="images/blackmirror.jpg"
              alt="trending now video">
              Black Mirror
            </div>  
          </div>
        </div>
        <div id="comedies">
          <h2>Comedies</h2>
          <div id="comedies_vids">
            <div class="zoom1" id="box6">
              <img class="vids" src="images/office.jpg" alt="Comedy video">
            </div>  
            <div class="zoom1" id="box7">
              <img class="vids" src="images/narcos.jpg" alt="Comedy video">
            </div> 
            <div class="zoom1" id="box8">
              <img class="vids" src="images/patriotact.jpg" alt="Comedy video">
            </div>  
            <div class="zoom1" id="box9">
              <img class="vids"  src="images/Daredevil3.jpg" alt="Comedy video">
            </div>  
            <div class="zoom1" id="box10">
              <img class="vids" src="images/got.jpg" alt="Comedy video">
            </div>  
          </div>
        </div>
      </div>
    </div>
    </main>

   <?php require '../inc/footer.inc.php'; ?>
  </div>
</body>
</html>