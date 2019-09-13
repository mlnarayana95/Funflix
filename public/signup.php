<?php 

  /**
   * SignUp Page 
   * last_update: 2019-09-13
   * Author: Narayana Madabhushi, mlnarayana95@gmail.com
   */
    require '../app/config.php';

    use \App\Validator;
    use \App\Models\Users;

    Users::init($dbh);
    $v = new Validator();
    $user = new Users();  

    $heading ="Funflix - Canada Registration Form";
    $title = "Funflix Canada - Sign Up";
    $errors = [];

    // Check if the request method of the submitted method is equal to POST 
  if('POST' == $_SERVER['REQUEST_METHOD']) {

    $string_fields = ['first_name','last_name','city','province','country'];

    foreach($_POST as $key => $value) {
      $v->required($key);  
      $v->lengthValidator($key); 
    }

    foreach($string_fields as $key) {
      $v->stringValidator($key);
    }

    $v->validatePhone(esc($_POST['phone']));
    $v->postalCodeValidator(esc($_POST['postal_code']));
    $v->emailValidator(esc($_POST['email_address']));
    $v->passwordValidator($_POST['pass']);

    $errors = $v->getErrors();

    $hashed_password = password_hash($_POST['pass'], PASSWORD_DEFAULT);
    $_POST['hashed_password'] = $hashed_password;

    if (empty($errors)){
            
      $user_id = $user->createUser($_POST);

      if($user_id > 1) {
        $_SESSION['logged_in'] = true;
        $_SESSION['user_id'] = $user_id;
        $_SESSION['flash'] = 'Thank you for registering!';
        session_regenerate_id(true);  
        header("Location: my_profile.php");
        die;
      }else {
         $errors[] = 'There was a problem creating a new user';
      } 
    }     

  }

  require '../inc/head.inc.php'; 

?>
    <body>   
       <?php require '../inc/header_load.inc.php'; ?>
      <div id="container">
        <h1><?=esc($heading)?></h1>
        <?php require '../inc/errors.inc.php'; ?> 

        <div id="signup"> <!-- 960px width to wrap a page -->
           <form id="sign_up" name="sign_up" method="post" 
           action="<?=esc_attr($_SERVER['PHP_SELF'])?>" autocomplete="on" 
           novalidate>
              <input type="hidden" name="csrf" value="<?=csrf()?>" />
                <h2 style="font-weight: 700;font-family: Tahoma;padding-bottom: 35px;"
                >Let us know you better</h2>
              <p >    
                <label for="first_name">First Name</label>
                <input type="text" name="first_name" id="first_name"
                 required placeholder="First name" value="<?= clean('first_name')?>"/>
              </p>
              <p>
                <label for="last_name">Last Name</label>
                <input type="text" name="last_name" id="last_name" 
                placeholder="Last name" value="<?= clean('last_name')?>" />
              </p>
              <p>
                <label for="street">Street</label>
                <input type="text" id="street" name="street" maxlength="40" 
                size="25"  required placeholder="Street" 
                value="<?= clean('street')?>"/>
              </p>
              <p>
                <label for="city">City</label>
                <input type="text" name="city" id="city" required 
                placeholder="City" value="<?= clean('city')?>"/>
              </p>
              <p>
                <label for="postal_code">Postal Code</label>
                <input type="text" name="postal_code" id="postal_code"
                 placeholder="Postal Code" value="<?= clean('postal_code')?>"/>
              </p>
              <p>
                <label for="province">Province</label>
                <input type="text" name="province" id="province" 
                placeholder="Province"  value="<?= clean('province')?>"/>
              </p>
              <p>
                <label>Country</label>
                <input type="text" name="country" id="country" 
                placeholder="Country"  value="<?= clean('country')?>"/>
              </p>
               <p>
                <label for="phone">Phone</label>
                <input type="tel" name="phone" id="phone"  
                value="<?= clean('phone')?>" placeholder="phone"/>
              </p>
               <p>
                <label for="email_address">Email</label>
                <input type="text" name="email_address" 
                id="email_address" placeholder="email" 
                value="<?= clean('email_address')?>"/>
              </p>
               <p>
                <label for="pass">Password</label>
                <input type="password" name="pass" 
                id="pass" placeholder="password"/>
              </p>
              <p>
                <label for="pass">Confirm Password</label>
                <input type="password" name="confirm_pass" 
                id="confirm_pass" placeholder="Confirm Password"/>
              </p>
            <p id="buttons">
              <input type="submit"  class="btn1" value="Submit"/>
              <input class="btn1" type="reset" value="Clear" /> &nbsp;
            </p>
          </form>
        </div>

       
    </div>
     <?php require '../inc/footer.inc.php'; ?>
  </body>
</html>