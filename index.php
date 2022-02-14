<!--=====================================
PHP Start
=======================================-->
<?php
//Include connection file
include "connection.php";
//error reporting
error_reporting(0);
//--------------------------------------
//PHP SignUp file
//--------------------------------------
require_once('signUp.php');
//----------------------------
//PHP SignIn file
//---------------------------
require_once('signIn.php')
?>
<!--=============================
PHP Ends 
======= =======================-->
<!DOCTYPE html>
<html lang="en">

<head>
  <!--Title-->
  <title>login</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="author" content="Gideon Kiplangat"/>
  <!--  Description  -->
  <meta name="description" content="signin-signup form"/>
  <!-- Keywords  -->
  <meta name="keywords" content="Signin, SignUp, Panel">
  <!-- Font-awesome Link -->
  <link rel="stylesheet" href="css/all.min.css">
  <!--CSS link -->
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <!--Container start-->
  <div class="container">
    <!--form-container start-->
    <div class="forms-container">
      <div class="signin-signup">
        <form action="" method="post"  class="sign-in-form">
          <h2 class="title">Sign in</h2>
          <div class="input-field">
            <i class="fas fa-envelope"></i>
            <input type="email" placeholder="Email Address" name="email" value="<?php echo $_POST['email'];?>" requred/>
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" name="password" required/>
          </div>
          <input type="submit" value="Login" name="signin" class="btn solid" />
          <p class="social-text">Or Sign in with social platforms</p>
          <div class="social-media">
            <a href="#" class="social-icon">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-google"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div>
        </form>
        <form action="#" class="sign-up-form" method="post">
          <h2 class="title">Sign up</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Enter Your Full Name" name="signup_full_name" required />
          </div>
          <div class="input-field">
            <i class="fas fa-envelope"></i>
            <input type="email" placeholder="Email Address" name="signup_email" required />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" name="signup_password" required />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Confirm Password" name="signup_cpassword" required />
          </div>
          <input type="submit" class="btn" name="signup" value="Sign up" />
          <p class="social-text">Or Sign up with social platforms</p>
          <div class="social-media">
            <a href="#" class="social-icon">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-google"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div>
        </form>
      </div>
    </div>
    <!--form-container ends-->
    <!--panels- container start-->
    <div class="panels-container">
      <!--left-panel start-->
      <div class="panel left-panel">
        <div class="content">
          <h3>New in this Page</h3>
          <p>
            Please Register by Clicking the Sign Up button Below.
          </p>
          <button class="btn transparent" id="sign-up-btn">
            Sign up
          </button>
        </div>
        <img src="img/login.png" class="image" alt="" />
      </div>
      <!--left-panel end-->
      <!--right-panel start-->
      <div class="panel right-panel">
        <div class="content">
          <h3>Already Have an Account with Us ?</h3>
          <p>
            Just login here, click on the Sign In button Below.
          </p>
          <button class="btn transparent" id="sign-in-btn">
            Sign in
          </button>
        </div>
        <img src="img/regester.png" class="image" alt="" />
      </div>
       <!--right-panel end-->
    </div>
    <!--panels - container ends-->
  </div>
  <!--Container End-->
  <!--Javascript-->
  <script src="script.js"></script>
</body>

</html>