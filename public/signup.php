<?php 

/**
 * SignUp Page 
 * last_update: 2019-08-03
 * Author: Narayana Madabhushi, mlnarayana95@gmail.com
 */

    $heading ="Funflix - Canada Registration Form";
    $title = "Funflix Canada - Sign Up";
    require '../inc/head.inc.php'; 
?>
    <body>   
      <div id="container">
        <?php require '../inc/header.inc.php'; ?>
         <h1><?=$heading?></h1>
        
        <main>

        <div id="wrapper"> <!-- 960px width to wrap a page -->
           <form id="sign_up" name="sign_up" method="post" action="#" autocomplete="on" novalidate>
              <h2>Let us know you better</h2>
              <p >    
                <label for="first_name">First Name</label>
                <input type="text" name="first_name" id="first_name" required placeholder="First name" />
              </p>
              <p>
                <label for="last_name">Last Name</label>
                <input type="text" name="last_name" id="last_name" placeholder="Last name" />
              </p>
              <p>
                <label for="street">Street</label>
                <input type="text" id="street" name="street" maxlength="40" size="25"  required placeholder="Street"/>
              </p>
              <p>
                <label for="city">City</label>
                <input type="text" name="city" id="city" required placeholder="City"/>
              </p>
              <p>
                <label for="postalcode">Postal Code</label>
                <input type="tel" name="postalcode" id="postalcode" placeholder="Postal Code"/>
              </p>
              <p>
                <label for="province">Province</label>
                <input type="text" name="province" id="province" placeholder="Province"/>
              </p>
              <p>
                <label>Country</label>
                <input type="text" name="country" id="country" placeholder="Country" />
              </p>
               <p>
                <label for="phone">Phone</label>
                <input type="tel" name="phone" id="phone" placeholder="phone"/>
              </p>
               <p>
                <label for="email_address">Email</label>
                <input type="email" name="email_address" id="email_address" placeholder="email"/>
              </p>
               <p>
                <label for="pass">Password</label>
                <input type="password" name="pass" id="pass" placeholder="password"/>
              </p>
            <p id="buttons">
              <input type="button" style="padding-top: 9px;
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