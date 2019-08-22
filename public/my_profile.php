<?php

/**
 * My Profile Page 
 * last_update: 2019-08-03
 * Author: Narayana Madabhushi, mlnarayana95@gmail.com
 */
    require '../app/config.php';
    $title = "Funflix Canada - My Profile";
    $heading = "My Profile";

    if(empty($_SESSION['logged_in']) || $_SESSION['logged_in'] != true){
      $_SESSION['flash'] = 'You must be logged in to view a profile';
      header("Location: login.php");
      die;
    }

    require '../inc/head.inc.php'; 
?>
<body>
 <div id="container">
  <?php require '../inc/navheader.inc.php'; ?>
  <div id="wrapper">
  <h1 style="margin-left:19px;"><?=$heading?></h1>
  <h2>Account Info</h2>
  <div id="user_details">
  <table>
  <tr>
    <th>mlnarayana95@gmail.com</th>
    <td><a href="#">Change email</a></td>
  </tr>
  <tr>
    <th>Password</th>
    <td><a href="#">********</a></td>
  </tr>
  <tr>
    <th>Phone</th>
    <td><a href="#">(732) 489-3232</a></td>
  </tr>
  <tr>
    <th>Standard</th>
    <td><a href="#">Change Plan</a></td>
  </tr>
  <tr>
    <th>Language</th>
    <td> <input list="country" name="country" />
        
          <datalist id="country">
            <option value="English(US)"></option>
            <option value="English(UK)"></option>
            <option value="Telugu"></option>
            <option value="Hindi"></option>
            <option value="Spanish"></option>
            <option value="French"></option>
            <option value="Chinese"></option>         
          </datalist>      
      </td>
  </tr>
  </table>
    <p id="buttons">
      <a href="home.php" class="btn1">Save</a>
    </p>
   </div>
   </div>
   <?php require '../inc/footer.inc.php'; ?>
 </div>
</body>
</html>