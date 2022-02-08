<!--=====================================
PHP Start
=======================================-->
<?php
//Include PHP files
include "config.php";
//session
session_start();
//if(!isset($_SESSION["user_id"])){
 // header("Location: welcome.php");
//}
error_reporting(0);
//--------------------------------------
//Signup Form
//--------------------------------------
if (isset($_POST["signup"])) {
  $full_name = mysqli_real_escape_string($conn, $_POST["signup_full_name"]);
  $email = mysqli_real_escape_string($conn, $_POST["signup_email"]);
  $password = mysqli_real_escape_string($conn, md5($_POST["signup_password"]));
  $cpassword = mysqli_real_escape_string($conn, md5($_POST["signup_cpassword"]));

  //Check if the Email Already Exist in the Database
  $check_email = mysqli_num_rows(mysqli_query($conn, "SELECT email FROM users WHERE email='$email'"));

  //Check if the password Match
  if ($password !== $cpassword) {
    echo "<script>alert('Password did not match.');</script>";
  } elseif ($check_email > 0) {
    echo "<script>alert('Email already taken.');</script>";
  }else{
    //Insert user information into the database
    $sql = "INSERT INTO users (full_name, email, password)VALUES('$full_name','$email','$password')";
    $result= mysqli_query($conn, $sql);
    //Notification on whether Registration was successfully or not
    if($result){
      echo "<script>alert('User Registration Succesfully.');</script>";
    }else{
      echo "<script>alert('User Registration Failed.');</script>";
    }
  }
}
//----------------------------
//Signin Form
//---------------------------
if (isset($_POST["signin"])) {
  $email = mysqli_real_escape_string($conn, $_POST["email"]);
  $password = mysqli_real_escape_string($conn, md5($_POST["password"]));

  $check_email = mysqli_query($conn, "SELECT id FROM users WHERE email='$email' AND password='$password'");

  if (mysqli_num_rows($check_email) > 0) {
    $row = mysqli_fetch_assoc($check_email);
    $_SESSION["user_id"] = $row['id'];
    header("Location: welcome.php");
  } else {
    echo "<script>alert('The Email or password you entered is incorrect. Please try again.');</script>";
  }
}
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
  <div class="container">
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

    <div class="panels-container">
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
    </div>
  </div>

  <script src="script.js"></script>
</body>

</html>