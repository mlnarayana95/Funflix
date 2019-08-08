<?php 

/**
 * SignUp Page 
 * last_update: 2019-08-03
 * Author: Narayana Madabhushi, mlnarayana95@gmail.com
 */

    $heading ="Funflix - Canada Registration Form";
    $title = "Funflix Canada - Sign Up";
    require 'include/head.inc.php'; 
?>
    <body>   
      <div id="container">
        <?php require 'include/header.inc.php'; ?>
         <h1><?=$heading?></h1>
        
        <main>

        <div id="wrapper"> <!-- 960px width to wrap a page -->
           <form id="sign_up" name="sign_up" method="post" action="http://www.scott-media.com/test/form_display.php" autocomplete="on" >
            <fieldset> 
              <legend>Personal Info</legend>
              <p>    
                <label for="first_name">First Name</label>
                <input type="text" name="first_name" id="first_name" maxlength="40" size="25" required placeholder="Type your first name" />
              </p>
              <p>
                <label for="last_name">Last Name</label>
                <input type="text" name="last_name" id="last_name" maxlength="40" size="25" placeholder="Type your last name" />
              </p>
              <p>
                <label for="username">User Name</label>
                <input type="text" id="username" name="username" maxlength="16" title="Username cannot be more than 16 characters" size="16" placeholder="User name" required />
              </p>
              <p>
                <label for="pass">Password</label>
                <input style="" type="password" id="pass" name="pass" maxlength="40" size="25"  required />
              </p>
              <p>
                <label for="email_address">Email</label>
                <input type="email" name="email_address" id="email_address" required />
              </p>
              <p>
                <label for="phone">Phone Number</label>
                <input type="tel" name="phone" id="phone" />
              </p>
              <p>
                <label for="birthday">Birthday</label>
                <input type="date" name="birthday" id="birthday" />
              </p>
              <p>
                <label>Country</label>
                <input list="country" name="country" placeholder="Country" />
                <datalist id="country">
                  <option value="Canada"></option>
                  <option value="USA"></option>
                  <option value="India"></option>
                  <option value="Moldova"></option>
                  <option value="Columbia"></option>
                  <option value="Brazil"></option>
                  <option value="Other"></option>
                </datalist>
              </p>
            </fieldset>
            <p id="buttons">
              <a href="home.php" class="btn1">Sign Up</a>
              <input style="padding-top: 9px;
              width: 100px;                 border-radius: 8px;
              " class="btn1" type="reset" value="Clear" /> &nbsp;
            </p>
          </form>
        </div>
        </main>
        <?php require 'include/footer.inc.php'; ?>
    </div>
  </body>
</html>