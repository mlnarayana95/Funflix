<?php

/**
 * My Profile Page 
 * last_update: 2019-08-03
 * Author: Narayana Madabhushi, mlnarayana95@gmail.com
 */

    $title = "Funflix Canada - My Profile";
    $heading = "My Profile";
    require 'include/head.inc.php'; 
?>
<body>
 <div id="container">
  <?php require 'include/navheader.inc.php'; ?>
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
   <?php require 'include/footer.inc.php'; ?>
 </div>
</body>
</html>