<?php 

/**
 * Login Page 
 * last_update: 2019-08-03
 * Author: Narayana Madabhushi, mlnarayana95@gmail.com
 */
    require '../app/config.php';
    $heading = "Funflix - Login"; 
    $title = "Funflix Canada - Login";
    $errors = [];

    if(!empty($_GET['logout'])) {
      logout();
    }


    if('POST' == $_SERVER['REQUEST_METHOD']) {

        $v->loginFormValidate();

        if(count($errors) == 0){
        $query = "SELECT * FROM users WHERE email = :email";

        $params = array(
          ':email' => $_POST['email_address']
        );

        $stmt = $dbh->prepare($query);

        $stmt->execute($params);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!$user){
          $v->setErrors('login','Email address is not linked to any account');
          $v->getErrors();
        }
        
        if(password_verify($_POST['pass'], $user['password'])) {

          $_SESSION['logged_in'] = true;
          $_SESSION['user_id'] = $user['user_id'];
          $_SESSION['flash'] = 'Welcome! '.$user['first_name'].' '.$user['last_name'].', you have successfully logged in';
          session_regenerate_id(true);  
          header("Location: my_profile.php");
          die;
        }else{
          unset($_SESSION['logged_in']);
          $v->setErrors('login','Login Credentials do not match');
          $v->getErrors();
        }
    }
  }

    require '../inc/head.inc.php'; 
?>

<body>
  <div id="container">
   <?php require '../inc/header.inc.php'; ?>
    <?php require '../inc/flash.inc.php'; ?>
    <?php require '../inc/errors.inc.php'; ?>   
    <main><!-- Main Content starts here -->
      <div id="login_form">
        <h1><?=$heading?></h1>

        <div id="content">

          <form id="login" action="login.php" method="post" novalidate>
            <p>
              <input class="login_fields" id="email_address" name="email_address" type="email" placeholder="Email" required value="<?=clean("email_address")?>"/>
            </p>
            <p>
              <input class="login_fields" id="pass" name="pass" type="password" placeholder="Password" required /> 
            </p>   
            <p> 
              <input type="submit" id="login_submit" class="btn1" name="login_submit" value="Submit"/>  
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