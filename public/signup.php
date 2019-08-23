<?php 

  /**
   * SignUp Page 
   * last_update: 2019-08-09
   * Author: Narayana Madabhushi, mlnarayana95@gmail.com
   */
    require '../app/config.php';
    
    $heading ="Funflix - Canada Registration Form";
    $title = "Funflix Canada - Sign Up";
    $errors = [];

    // Check if the request method of the submitted method is equal to POST 
    if('POST' == $_SERVER['REQUEST_METHOD']) {

    // Call to a single validate function that in turns calls all the validations
    // Keeping all the Validation code in Validator Method
    $errors = $v->Validation();

    $hashed_password = password_hash($_POST['pass'], PASSWORD_DEFAULT);

    if (empty($errors)){
                $query = "INSERT INTO
                    users
                        (first_name,
                        last_name,
                        street,
                        city,
                        postal_code,
                        province,
                        country,
                        phone,
                        email,
                        password)
                        VALUES
                        (:first_name, 
                        :last_name, 
                        :street, 
                        :city, 
                        :postal_code,
                        :province,
                        :country,
                        :phone,
                        :email,
                        :password)";
            
            // Preparing the query
            $stmt = $dbh->prepare($query);
            
            // Adding parameters to be passed to the query
            $params = array(
                ':first_name' => $_POST['first_name'],
                ':last_name'=> $_POST['last_name'],
                ':street'=> $_POST['street'],
                ':city'=> $_POST['city'],
                ':postal_code'=> $_POST['postal_code'],
                ':province' => $_POST['province'],
                ':country'=> $_POST['country'],
                ':phone'=> $_POST['phone'],
                ':email'=> $_POST['email_address'],
                ':password'=> $hashed_password );

            // Execute the query
            $stmt->execute($params);

            // Fetch the last inserted id value
            $user_id = $dbh->lastInsertId();
                  // Redirect to the show_user page
                  if($user_id) {
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
        <h1><?=$heading?></h1>
        <?php require '../inc/errors.inc.php'; ?> 
        <main>
        <div id="wrapper"> <!-- 960px width to wrap a page -->
           <form id="sign_up" name="sign_up" method="post" action="<?=esc_attr($_SERVER['PHP_SELF'])?>" autocomplete="on" novalidate>
                <h2 style="font-weight: 700;font-family: Tahoma;padding-bottom: 35px;"
                >Let us know you better</h2>
              <p >    
                <label for="first_name">First Name</label>
                <input type="text" name="first_name" id="first_name" required placeholder="First name" value="<?= clean('first_name')?>"/>
              </p>
              <p>
                <label for="last_name">Last Name</label>
                <input type="text" name="last_name" id="last_name" placeholder="Last name" value="<?= clean('last_name')?>" />
              </p>
              <p>
                <label for="street">Street</label>
                <input type="text" id="street" name="street" maxlength="40" size="25"  required placeholder="Street" value="<?= clean('street')?>"/>
              </p>
              <p>
                <label for="city">City</label>
                <input type="text" name="city" id="city" required placeholder="City" value="<?= clean('city')?>"/>
              </p>
              <p>
                <label for="postalcode">Postal Code</label>
                <input type="text" name="postal_code" id="postal_code" placeholder="Postal Code" value="<?= clean('postal_code')?>"/>
              </p>
              <p>
                <label for="province">Province</label>
                <input type="text" name="province" id="province" placeholder="Province"  value="<?= clean('province')?>"/>
              </p>
              <p>
                <label>Country</label>
                <input type="text" name="country" id="country" placeholder="Country"  value="<?= clean('country')?>"/>
              </p>
               <p>
                <label for="phone">Phone</label>
                <input type="tel" name="phone" id="phone"  value="<?= clean('phone')?>" placeholder="phone"/>
              </p>
               <p>
                <label for="email_address">Email</label>
                <input type="text" name="email_address" id="email_address" placeholder="email" value="<?= clean('email_address')?>"/>
              </p>
               <p>
                <label for="pass">Password</label>
                <input type="password" name="pass" id="pass" placeholder="password"/>
              </p>
              <p>
                <label for="pass">Confirm Password</label>
                <input type="password" name="confirm_pass" id="confirm_pass" placeholder="Confirm Password"/>
              </p>
            <p id="buttons">
              <input type="submit"  class="btn1" value="Submit"></input>
              <input type="button" class="btn1" type="reset" value="Clear" /> &nbsp;
            </p>
          </form>
        </div>
        </main>
        <?php require '../inc/footer.inc.php'; ?>
    </div>
  </body>
</html>