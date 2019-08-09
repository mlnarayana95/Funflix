<?php 

/**
 * SignUp Page 
 * last_update: 2019-08-03
 * Author: Narayana Madabhushi, mlnarayana95@gmail.com
 */
    require '../app/config.php';
    
    $heading ="Funflix - Canada Registration Form";
    $title = "Funflix Canada - Sign Up";
    $errors = [];

if('POST' == $_SERVER['REQUEST_METHOD']) {

    if(empty($_POST['first_name'])) {
        $errors['first_name'] = 'First Name is a required field';
    } elseif((strlen($_POST['first_name']) < 3) && (strlen($_POST['first_name']) > 20)) {
        $errors['make'] = 'First name must have at least 3 characters and maximum of 20 character';
    }

    if(empty($_POST['last_name'])) {
        $errors['last_name'] = 'Last Name is a required field';
    }elseif((strlen($_POST['last_name']) < 3) && (strlen($_POST['last_name']) > 20)){
        $errors['last_name'] = 'Last Name must have at least 3 characters and maximum of 20 characters';
    }

     if(empty($_POST['street'])) {
        $errors['street'] = 'Street is a required field';
    }elseif((strlen($_POST['street']) < 3) && (strlen($_POST['street']) > 200)) {
        $errors['street'] = 'Street must have at least 3 characters and maximum of 200 characters';
    }

     if(empty($_POST['city'])) {
        $errors['city'] = 'City is a required field';
    }elseif((strlen($_POST['city']) < 3) && (strlen($_POST['city']) > 20)){
        $errors['city'] = 'City must have at least 3 characters and maximum of 20 characters';
    }

     if(empty($_POST['postal_code'])) {
        $errors['postal_code'] = 'Postal Code is a required field';
    }elseif(strlen($_POST['postal_code']) != 6) {
        $errors['postal_code'] = 'Postal Code must be 6 characters long ';
    }

     if(empty($_POST['province'])) {
        $errors['province'] = 'Province is a required field';
    }elseif((strlen($_POST['province']) < 3) && (strlen($_POST['province']) > 20))  {
        $errors['province'] = 'Province must have at least 3 characters and maximum of 20 characters';
    }

     if(empty($_POST['country'])) {
        $errors['country'] = 'Country is a required field';
    }elseif((strlen($_POST['country']) < 3) && (strlen($_POST['country']) > 20)) {
        $errors['country'] = 'Country must have at least 3 characters and maximum of 20 characters';
    }

     if(empty($_POST['phone'])) {
        $errors['phone'] = 'Phone is a required field';
    } elseif(strlen($_POST['phone']) != 10) {
       $errors['phone'] = 'Phone must be of 10 characters';
    }


     if(empty($_POST['email_address'])) {
        $errors['email_address'] = 'Email is a required field';
    } elseif( (!filter_var($_POST['email_address'], FILTER_VALIDATE_EMAIL)) || (strlen($_POST['email_address']) > 100)) {
       $errors['email_address'] = 'Please enter a valid email address and maximum of 100 characters';
    }


    if(empty($_POST['pass'])) {
        $errors['pass'] = 'Password is a required field';
    }elseif((strlen($_POST['pass']) < 3) && (strlen($_POST['pass']) > 20)) {
        $errors['pass'] = 'Password must be a minimum of 6 characters and maximum of 20 characters';
    }

    if(empty($_POST['confirm_pass'])) {
        $errors['confirm_pass'] = 'Confirm password is a required field';
    }elseif($_POST['confirm_pass'] != $_POST['pass']){
        $errors['confirm_pass']  = 'Password does not match with confirm password';
    }
 
 
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
  $stmt = $dbh->prepare($query);
  
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
      ':password'=> $_POST['pass']
  );

  $stmt->execute($params);

  $user_id = $dbh->lastInsertId();
    
        if($user_id) {
            // redirect to another page (PRG) with the last insert id
              header('Location: show_user.php?user_id='.$user_id);
            die;
        } else {
        // else 
            // add a message to the error array
            $errors[] = 'There was a problem creating a new user';
        } // end if insert worked
    } // end if no errors
} // end of post request

    require '../inc/head.inc.php'; 


?>
    <body>   
      <?php require '../inc/header.inc.php'; ?>
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
                <input type="tel" name="postal_code" id="postal_code" placeholder="Postal Code" value="<?= clean('postal_code')?>"/>
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
                <input type="text" name="email_address" id="email_address" placeholder="email"/>
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
              <input type="submit" style="padding-top: 9px;
              margin-right: 15px;
              width: 100px;border-radius: 8px;" class="btn1" value="Submit"></input>
              <input type="button" style="padding-top: 9px;
              width: 100px;                 border-radius: 8px;
              " class="btn1" type="reset" value="Clear" /> &nbsp;
            </p>
          </form>
        </div>
        </main>
        <?php require '../inc/footer.inc.php'; ?>
    </div>
  </body>
</html>