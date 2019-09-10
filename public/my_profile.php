<?php

/**
 * My Profile Page 
 * last_update: 2019-08-03
 * Author: Narayana Madabhushi, mlnarayana95@gmail.com
 */

    use App\Models\Viewlist;
    use App\Models\Users;

    require '../app/config.php';
    $title = "Funflix Canada - My Profile";
    $heading = "My Profile";
    
    Users::init($dbh);    
    $user = new Users();

    if(empty($_SESSION['logged_in']) || $_SESSION['logged_in'] != true){
      $_SESSION['flash'] = 'You must be logged in to view a profile';
      header("Location: login.php");
      die;
    }else{
      $result = $user->one($_SESSION['user_id']);
    }

?>

<?php require '../inc/head.inc.php';?>
<?php require '../inc/header_load.inc.php'; ?>
  <div id="user">
      <h1><?=esc($result['first_name']) . " " . esc($result['last_name'])?></h1>
      <ul>
        <?php foreach($result as $key => $value) : ?>
        <?php if($key != 'password' && $key != 'user_id' && $key != 'updated_at') : ?>
          <li><strong><?=esc(label($key))?></strong> : <?=esc($value)?></li>
          <?php endif; ?>
        <?php endforeach; ?>
      </ul>
  </div> 


  <?php require '../inc/footer.inc.php'; ?>
</body>
</html>