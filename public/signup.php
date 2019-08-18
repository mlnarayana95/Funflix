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
    $v->Validation();

    }

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
              <input type="submit" style="padding-top: 9px;
              margin-right: 15px;
              width: 100px;border-radius: 8px;" class="btn1" value="Submit"></input>
              <input type="button" style="padding-top: 9px;
              width: 100px; border-radius: 8px;
              " class="btn1" type="reset" value="Clear" /> &nbsp;
            </p>
          </form>
        </div>
        </main>
        <?php require '../inc/footer.inc.php'; ?>
    </div>
  </body>
</html>